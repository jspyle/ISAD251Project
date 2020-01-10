<?php
include_once '../src/model/dbContext.php';
if(!isset($db))
{
    $db = new dbContext();
}


?>

<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<script src="style.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
    body, html {height: 100%}
    body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
    .menu {display: none}
    .bgimg {
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url(../resources/img/plymouth1.jpg);
        min-height: 90%;
    }
    h5 {
        float:right;
    }
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
    <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
        <a href="index.php" class="w3-bar-item w3-button">HOME</a>
        <a href="index.php#menu" class="w3-bar-item w3-button">MENU</a>
        <a href="index.php#about" class="w3-bar-item w3-button">ABOUT</a>
        <a href="index.php#contact" class="w3-bar-item w3-button">CONTACT</a>

        <a href="order.php" class="w3-bar-item w3-button">PLACE ORDER</a>
        <a href="amend.php" class="w3-bar-item w3-button">Amend Order</a>
    </div>
</div>
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-bottomleft w3-padding">
        <span class="w3-tag w3-xlarge">Open from 10am to 12pm</span>
    </div>
    <div class="w3-display-middle w3-center">
        <span class="w3-text-white w3-hide-small" style="font-size:100px">The<br>Chamberlain Inn</span>
        <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>The<br>Chamberlain Inn</b></span>
    </div>

</header>

