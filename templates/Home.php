<?php
session_start();
$auth=1;
if(isset($_SESSION['auth']) && $_SESSION['auth']=='auth'){
    $auth="Logined";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Video Recommendation System</title>
    <link rel="stylesheet" href="css/All.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/h.css">
</head>
<body>

<!--NAV Section-->
<div class="nav">
    <div class="container">
        <div class="nav__wrapper">
            <a href="./Home.php" class="logo">
                <img src="../Images/skin.png" alt="Makeup class">
                 </a>
                 <nav>
                    <div class="nav__icon">
                    <svg
                     xmlns="http://www.w3.org/2000/svg"
                     width="24"
                     height="24"
                     viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
>
                 <line x1="3" y1="12" x2="21" y2="12" />
                 <line x1="3" y1="6" x2="21" y2="6" />
                 <line x1="3" y1="18" x2="21" y2="18" />
</svg>
</div>
<div class="nav__bgOverlay"></div>
<ul class="nav__list">
    <div class="nav__close">
    <svg
   xmlns="http://www.w3.org/2000/svg"
   width="24"
  height="24"
  viewBox="0 0 24 24"
  fill="none"
  stroke="currentColor"
  stroke-width="2"
  stroke-linecap="round"
  stroke-linejoin="round"
>
  <line x1="18" y1="6" x2="6" y2="18" />
  <line x1="6" y1="6" x2="18" y2="18" />
</svg>
</div>
<div class="nav__list__wrapper">
    <li><a href="Home.php" class="nav__link">Home</a></li>
    <li> <a href="About.php" class="nav__link">About Us</a></li>
    <li><a href="Contact.php" class="nav__link">Contact</a></li>
    <?php
    if($auth=="Logined")
    {
        echo"<li><a href='userpage.php' class='nav__link'>Profile</a></li>";
        echo"<li><a href='logout.php' class='nav__link'>Logout</a></li>";
    }
    else{

   echo "<li></li><a href='Login.php' class='nav__link'>Login</a></li>";
    }
    ?>
</div>
</ul>
</nav>
</div>
</div>
</div>
<!-- End of nav section -->
<!--Start-->
<section id="hero">
    <div class="container">
        <div class="hero__wrapper">
        <div class="hero__left">
            <div class="hero__left__wrapper">
                <h1 class="hero__heading">Our purpose is to recommend makeup cources as the user prefer to watch</h1>
                <p class="hero__info">Our intention is to optimize your time allocation, allowing you to allocate valuable moments towards.
                    </p>
                <div class="button__wrapper">
                    <a href="services.php" class="btn primary_btn">Recommend Me</a>
                    
                </div>
            </div>
        </div>
        <div class="hero__right">
            <div class="hero__imWrapper">
                 <img src="../Images/salon.jpg" alt="facilities" style="height: 40%;">
            </div>
        </div>
       </div>
      </div>

                    
        </div>
    </div>

</section>

    

            
        <div class="ourSpecials__right">
      <h2 class="ourSpecials__title">Our Speciality </h2>
        <p class="ourSpecials__text">
        All these makeup and hair videos are provided to you for learning and creating same looks without getting any trouble while searching those kind of makeup vidos.     
   </p>

     </div>
    </div>
    </div>

            <div class="serviceGrid__item__img">
                <img src="../Images/newcreative.jpg" alt="service">
            </div>
            <div class="serviceGrid__item__info">
                <h3 class="serviceGrid__item__title">Creative Makeup
                </h3>
                
                    
                </div>
            
            <div class="serviceGrid__item" onclick="window.location.href='bookings.php?service=Facials and Skincare Treatment'">
                <div class="serviceGrid__item__img">
                    <img src="../Images/Austhetic.jpg" alt="service">
                </div>
                <div class="serviceGrid__item__info">
                    <h3 class="serviceGrid__item__title">Austhetic makeup looks
                    </h3>Creating aesthetic makeup looks involves a combination of creativity, color coordination, and skill. The term "aesthetic" can be quite subjective and can encompass various styles, from natural and subtle to bold and avant-garde
                    Some of the Popular Austhetic makeup looks are
                    Natural and Dewy:

                    Start with a clean, well-moisturized face.
                    Use a lightweight foundation or tinted moisturizer for a natural base.
                    Apply a cream or liquid highlighter to the high points of your face (cheekbones, brow bone, nose bridge) for a dewy glow.
                    Opt for neutral eyeshadows, minimal eyeliner, and mascara.
                    Choose a nude or subtle lip color.
                    Finish with a setting spray for a fresh, dewy finish.
                    Soft and Romantic:

                    Apply a soft, rosy blush on the apples of your cheeks.
                    Use warm-toned eyeshadows in soft pinks, mauves, or peachy tones.
                    Create a subtle winged eyeliner or use brown eyeliner for a softer look.
                    Apply mascara to enhance your lashes.
                    Opt for a soft, pink or nude lip color with a touch of gloss.
                    Vintage Glam:

                    Achieve a flawless base with a full-coverage foundation.
                    Create a bold, winged eyeliner with liquid or gel eyeliner.
                    Use matte eyeshadows in rich, classic shades like reds, browns, or golds.
                    Apply false lashes for added drama.
                    Choose a bold, classic red lipstick with a matte finish.
                    Edgy and Bold:
                    Experiment with vibrant eyeshadow colors like neon, metallics, or dark smoky hues.
                    Go for dramatic winged eyeliner or graphic liner designs.
                    Use bold, dramatic false eyelashes or colored mascara.
                    Pair with a unique lip color, like deep plum, black, or metallic shades.
                    Bohemian and Ethereal:

                    Apply earthy tones and pastel eyeshadows with a hint of shimmer.
                    Opt for a natural-looking lip color or a subtle lip stain.
                    Accessorize with faux freckles for a whimsical touch.
                    Monochromatic:

                      Choose a single color for your eyeshadow, blush, and lips.
                    Blend different shades and textures of the same color to create depth.
                    This look creates a harmonious and visually appealing aesthetic.
                    Remember, makeup is a form of self-expression, and there are no strict rules. Feel free to mix and match these styles or create your own unique aesthetic makeup looks. Experimenting with different colors, techniques, and styles can be a fun way to express your creativity and personal style.                     
                        
                    </div>
                </div>
                

    </div>
    </div>

