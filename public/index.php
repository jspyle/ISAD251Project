<?php

include_once 'header.php';
include_once '../src/model/dbContext.php';

if(!isset($db))
{
    $db = new dbContext();
}

?>

<!DOCTYPE html>

<body>
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-bottomleft w3-padding">
        <span class="w3-tag w3-xlarge">Open from 10am to 12pm</span>
    </div>
    <div class="w3-display-middle w3-center">
        <span class="w3-text-white w3-hide-small" style="font-size:100px">The<br>Chamberlain Inn</span>
        <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>The<br>Chamberlain Inn</b></span>
        <p><a href="#menu" class="w3-button w3-xxlarge w3-black">Let me see the menu</a></p>
    </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
    <div class="w3-content">

        <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">THE MENU</h1>
        <h2 class ="w3-center w3-xxxlarge">Food</h2>
        <?php
        $optionString = "";
        $foods = $db->getItemTypes("Food");
        $className = 1;

        if($foods)
        {
            foreach($foods as $food)
            {
                $listFood.="<div class=item".$className.">"."<h5 id=price>"."£".$food->getPrice()."</h5>"."<h1 class='font-weight-bold'>".$food->getProductName()."</h1>".
                    "<h4 id='description'>"."<i>".$food->getProductDesc()."</i>"."</h4>"."</div>";
                $className += 1;
            }
        }
        echo $listFood;
        ?>
        <h2 class="w3-center w3-xxxlarge" style="margin-bottom:64px">Drinks</h2>

        <?php
        $optionString = "";
        $drinks = $db->getItemTypes("Drink");
        $classDrink = 1;

        if($drinks)
        {
            foreach($drinks as $drink)
            {
                $listDrink.="<div class=item".$className.">"."<h5 id=price>"."£".$drink->getPrice()."</h5>"."<h1 class='font-weight-bold'>".$drink->getProductName()."</h1>".
                    "<h4 id='description'>"."<i>".$drink->getProductDesc()."</i>"."</h4>"."</div>";
                $classDrink += 1;
            }
        }
        echo $listDrink;
        ?>

    </div>
</div>


<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
    <div class="w3-content">
        <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">About</h1>
        <p>The Pizza Restaurant was founded in blabla by Mr. Italiano in lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p><strong>The Chef?</strong> Mr. Italiano himself<img src="/w3images/chef.jpg" style="width:150px" class="w3-circle w3-right" alt="Chef"></p>
        <p>We are proud of our interiors.</p>
        <img src="../resources/img/plymouth1.jpg" style="width:100%" class="w3-margin-top w3-margin-bottom" alt="Restaurant">
        <h1><b>Opening Hours</b></h1>

        <div class="w3-row">
            <div class="w3-col s6">
                <p>Mon & Tue CLOSED</p>
                <p>Wednesday 10.00 - 24.00</p>
                <p>Thursday 10:00 - 24:00</p>
            </div>
            <div class="w3-col s6">
                <p>Friday 10:00 - 12:00</p>
                <p>Saturday 10:00 - 23:00</p>
                <p>Sunday Closed</p>
            </div>
        </div>

    </div>
</div>

<!-- Image of location/map -->
<img src="/w3images/map.jpg" class="w3-image w3-greyscale" style="width:100%;">

<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
    <div class="w3-content">
        <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
        <p>Find us at some address at some place or call us at 05050515-122330</p>
        <p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p>
        <p class="w3-xxlarge"><strong>Reserve</strong> a table, ask for today's special or just send us a message:</p>
        <form action="/action_page.php" target="_blank">
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="People"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
            <p><button class="w3-button w3-light-grey w3-block" type="submit">SEND MESSAGE</button></p>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>



</body>

