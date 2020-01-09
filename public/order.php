<?php
include_once 'header.php';
include_once '../src/model/dbContext.php';
include_once '../src/model/product.php';

function getQuantityNo()
{
    $quantityList = null;
    $i = 0;
    while ($i <= 10) {
        $quantityList .= "<option>" . $i . "</option>";
        $i++;
    }
    echo $quantityList;
}

    if(!isset($db)) {
        $db = new dbContext();
    }
    if(isset($_POST['submit_Request'])){
        $request = new request($_POST['orderId'], $_POST['customerId'], $_POST['tableNo'], $_POST['time'], $_POST['ageRestriction']);
        $success = $db->Enter_Request($request);
    }
?>

<html>
<body>

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



<div class="card-body">
        <div class="form-group">
            <label for="food">Food</label>
            <br>
            <select id="foodTable" class="form-control">
                <option>--Select Food--</option>
                <?php
                $optionString = "";
                $foods = $db->getItemTypes("Food");

                if ($foods) {
                    foreach ($foods as $food)
                    {
                        $listFood.="<option>".$food->getProductName()." -  £". $food->getPrice()."</option>";
                    }
                }
                echo $listFood;


                ?>
            </select>
            <label style="padding-left:3em " for="quantity1" >Quantity:</label>
            <select id="foodQuantity1" >
                <?php
                getQuantityNo();
                ?>
            </select>


            <br>
            <select id="foodTable2" class="form-control">
                <option>--Select Food--</option>
                <?php
                $optionString = "";
                $foods2 = $db->getItemTypes("Food");

                if ($foods2) {
                    foreach ($foods2 as $food2)
                    {
                        $listFood2.="<option>".$food2->getProductName()." -  £". $food2->getPrice()."</option>";
                    }
                }
                echo $listFood2;


                ?>
            </select>
            <label style="padding-left:3em " for="quantity1" >Quantity:</label>
            <select id="foodQuantity2">

                <?php
                getQuantityNo();
                ?>
            </select>

            <br>
            <br>
            <label for="drink">Drinks</label>
            <br>
            <select id="drinkTable" class="form-control">


                    <option>--Select Drink--</option>
                    <?php
                    $optionString = "";
                    $drinks = $db->getItemTypes("Drink");

                    if ($drinks) {
                        foreach ($drinks as $drink)
                        {
                            $listDrinks.="<option id='foodList'>".$drink->getProductName()." -  £". $drink->getPrice()."</option>";
                        }
                    }
                    echo $listDrinks;


                    ?>

    </select>
            <label style="padding-left:3em " for="quantity1" >Quantity:</label>
            <select id="drinkQuantity1">
                <?php
                getQuantityNo();
                ?>
            </select>

            <br>
            <select id="drinkTable2" class="form-control">


                <option>--Select Drink--</option>
                <?php
                $optionString = "";
                $drinks = $db->getItemTypes("Drink");

                if ($drinks) {
                    foreach ($drinks as $drink)
                    {
                        $listDrinks.="<option id='foodList'>".$drink->getProductName()." -  £". $drink->getPrice()."</option>";
                    }
                }
                echo $listDrinks;


                ?>

            </select>
            <label style="padding-left:3em " for="quantity1" >Quantity:</label>
            <select id="drinkQuantity2">
                <?php
                getQuantityNo();
                ?>
            </select>
</div>

        <div>

            <div class="w3-xlarge">
                <p><button onclick="document.getElementById('menu').style.display='block'; currentSelection()" class="w3-button w3-black">Submit Order</button></p>
        </div>


        <div id="menu" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom">
            <div class="w3-container w3-black w3-display-container">
                <span onclick="document.getElementById('menu').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                <h1>Just one more thing</h1>



                <div id="yourSelection">
                    <p></p>
                </div>
                <div id="yourSelection2">
                    <p></p>
                </div>
                <div id="yourSelection3">
                    <p></p>
                </div>
                <div id="yourSelection4">
                    <p></p>
                </div>

                <form>
                    Table Number: <input type="text" name="tableNo">
                    Name: <input type="text" name="name">
                    Email: <input type="text" name="email">
                    <input id="submitRequest" onclick="" type="submit" value="Place Order">

                </form>
            </div>
        </div>
            <?php
            $resultString = "<div class=\"row\"><div class=\col-sm-12\"><div class=\"card border-success nm-3\">
                           <div class=\"card-header bg-success text-white\">Request Success</div><div></div></div>"



            ?>


        </div>


        </body>
</html>
