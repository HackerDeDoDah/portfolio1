<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/yesiamrocks/cssanimation.io@1.0.3/cssanimation.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dbHost = $_ENV['DB_HOST'] ?? 'localhost';
$dbUser = $_ENV['DB_USER'] ?? 'root';
$dbPass = $_ENV['DB_PASS'] ?? '';
?>

    <?php
    include 'header.php';
    ?>
        <div class="container-inner" id="panel">
        <header id="top">
            
            <div class="hero-container">
                <div class="hero">
                    <canvas id='canv'>
                        <div class="text-container click ">
                            <h1>Christopher Day</h1>
                            <div class="cssanimation typing">Web Designer/Developer</div>
                        </div>
                    </canvas>
                </div>
            </div>
        </header>
        
        <main>
            
            <div class="main-container">
                <div class="main-grid">
                    <div class="card" id="folio">
                        <img src="assets/Screenshot 2024-12-18 085121.png" alt="">
                        <h2>Project 1</h2>
                        <p>The Netmatters home page clone for the Scion Program assignment.</p>
                        <a href="http://netmatters.christopher-day.netmatters-scs.co.uk/" target="_blank">View here <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                    <div class="card">
                        <img src="assets/Screenshot 2025-01-15 105926.png" alt="">
                        <h2>Project 2</h2>
                        <p>A Random picture generator for the Scion Program assignment.</p>
                        <a href="http://js-array.christopher-day.netmatters-scs.co.uk/" target="_blank">View here.<i class="fa-solid fa-caret-right"></i></a>
                    </div>
                    <div class="card">
                        <img src="https://placehold.co/600x400.png" alt="">
                        <h2>Project 3</h2>
                        <a href="#">View here <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                    <div class="card">
                        <img src="https://placehold.co/600x400.png" alt="">
                        <h2>Project 4</h2>
                        <a href="#">View here <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                    <div class="card">
                        <img src="https://placehold.co/600x400.png" alt="">
                        <h2>Project 5</h2>
                        <a href="#">View here <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                    <div class="card">
                        <img src="https://placehold.co/600x400.png" alt="">
                        <h2>Project 6</h2>
                        <a href="#">View here <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            
            <section class="form-container">
                <section class="contact-info">
                    <div class="get">
                        <h2>Get In Touch</h2>
                        <p>Please fill out the form and give a short message about your project. We will get back to you as soon as possible.</p>
                    </div>
                    <div class="number">
                        <h2>Or call us</h2>
                        <p>Call us: <a href="tel:+447394942864">07394 942864</a></p>
                        <p>Monday - Friday: 8am - 5pm</p>
                        <p>To arrange a consultation or to discuss ongoing projects, don't hesitate to contact us.</p>
                    </div>
                </section>

                <?php
                include 'contact.php';
                ?>

            </section>
        </main>
        
<?php
include 'footer.php';
?>