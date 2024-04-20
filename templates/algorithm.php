<?php
session_start();
require('../templates/connection.php');

function cleanText($text) {
    // Convert text to lowercase
    $text = strtolower($text);

    // Remove punctuation and digits
    $text = preg_replace("/[[:punct:]]+/", " ", $text);
    $text = preg_replace("/\d+/", "", $text);

    // Define stopwords
    $stopwords = ["a", "an", "and", "are", "as", "at", "be", "by", "for", "from", "has", "he", "in", "is", "it", "its", "of", "on", "that", "the", "to", "was", "were", "will", "with"];

    // Remove stopwords
    $tokens = explode(" ", $text);
    $tokens = array_filter($tokens, function($word) use ($stopwords) {
        return !in_array($word, $stopwords);
    });

    // Reconstruct the text
    $text = implode(" ", $tokens);

    return $text;
}

function computeTF($document, $term) {
    $count = 0;
    $words = explode(' ', $document);
    foreach ($words as $word) {
        if ($word == $term) {
            $count++;
        }
    }
    return $count / count($words);
}

function computeIDF($documents, $term) {
    $N = count($documents);
    $docsWithTerm = 0;
    foreach ($documents as $doc) {
        if (!empty($term) && strpos($doc, $term) !== false) {
            $docsWithTerm++;
        }
    }
    if ($docsWithTerm == 0) return 0;
    return log($N / $docsWithTerm);
}

function getEuclideanDistance($docScores, $recentDocScores) {
    $sum = 0;
    foreach ($docScores as $term => $score) {
        $recentScore = $recentDocScores[$term] ?? 0;
        $sum += pow($score - $recentScore, 2);
    }
    return sqrt($sum);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $documents = []; // Initialize an array to store documents.

    // Assuming you have form fields named 'course', 'skintype', 'brandname', 'style', and 'description'.
    $course = $_POST['course'];
    $skinType = $_POST['skintype'];
    $brandName = $_POST['brandname'];
    $style = $_POST['style'];
    $description = $_POST['description'];

    // Create a query to retrieve videos.
    $videoQuery = "SELECT * FROM video";
    $videoResult = mysqli_query($conn, $videoQuery);

    $concatenatedDocument = cleanText($course . $skinType . $brandName . $style . $description);

    $userDetail = explode(' ', $concatenatedDocument);
    $userTfidfScores = [];

    foreach ($userDetail as $word) {
        $tf = computeTF($concatenatedDocument, $word);
        $idf = computeIDF([$concatenatedDocument], $word);
        $userTfidfScores[$word] = $tf * $idf;
    }

    $videoArray = [];

    if ($videoResult) {
        while ($videoRow = mysqli_fetch_array($videoResult)) {
            // Clean and concatenate video-related content.
            $cleaned = cleanText($videoRow['title'] . $videoRow['description'] . $videoRow['category'] . $videoRow['style'] . $videoRow['brand'] . $videoRow['skintype']);
            $videoArray[] = ['id' => $videoRow['videoid'], 'text' => $cleaned];
        }
    } else {
        echo "No recently commented videos found.<br>";
    }

    $videoTFIDFScores = [];

    foreach ($videoArray as $videoItem) {
        $words = explode(' ', $videoItem['text']);
        $videotfidfScores = [];
        foreach ($words as $word) {
            $tf = computeTF($videoItem['text'], $word);
            $idf = computeIDF(array_column($videoArray, 'text'), $word);
            $videotfidfScores[$word] = $tf * $idf;
        }
        $videoTFIDFScores[] = ['id' => $videoItem['id'], 'scores' => $videotfidfScores];
    }

    $userScores = $userTfidfScores;

    $distances = [];

    foreach ($videoTFIDFScores as $videoIndex => $videoScoresItem) {
        $distance = getEuclideanDistance($userScores, $videoScoresItem['scores']);
        $distances[] = ['distance' => $distance, 'id' => $videoScoresItem['id']];
    }

    usort($distances, function ($a, $b) {
        return $a['distance'] <=> $b['distance'];
    });

    $recommendation = [];

    for ($i = 0; $i < min(4, count($distances)); $i++) {
        $recommendation[] = $distances[$i]['id'];
    }

    print_r($recommendation);
}
?>
