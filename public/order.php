<?php
include_once 'header.php';
include_once '../src/model/request.php';
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
        if (isset($_POST['submit_Request'])) {

            $orderId = $db->getNextOrderId();
            $customerId = $db->getNextCustomerId();
            $date = "".date("h:i")."";

            $submitRequest = new orderDetails($orderId, $customerId, $_POST['tableNo'],$date);
            $submitCustomer = new customer($customerId,$_POST['name'], $_POST['email']);

            $success = $db->enterCustomerRequest($submitCustomer);
            $success = $db->enterOrderRequest($submitRequest);

            //if($_POST['foodQuantity1'] != 0):
                $submitFoodItem1 = new itemDetails($orderId."1", $orderId,$_POST['foodTable'], $_POST['foodQuantity1']);
                $db->enterItemRequest($submitFoodItem1);
          //  endif;
           // if($_POST['foodQuantity2'] != 0) :
                $submitFoodItem2 = new itemDetails($orderId."2",$orderId, $_POST['foodTable2'], $_POST['foodQuantity2']);
                $db->enterItemRequest($submitFoodItem2);
            //endif;
            //if($_POST['drinkQuantity1'] != 0) :
                $submitDrinkItem1 = new itemDetails($orderId."3",$orderId,$_POST['drinkTable'], $_POST['drinkQuantity1']);
                $db->enterItemRequest($submitDrinkItem1);
            //endif;
            //if($_POST['drinkQuantity2'] != 0) :
                $submitDrinkItem2 = new itemDetails($orderId."4",$orderId,$_POST['drinkTable2'], $_POST['drinkQuantity2']);
                $db->enterItemRequest($submitDrinkItem2);
           // endif;
            //$success = $db->enter_Request($request);










    }









?>

<html>
<body>

<div class="card-body">
        <div class="form-group">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <label for="food">Food</label>
            <br>
            <select id="foodTable" class="form-control" name="foodTable">
                <option>--Select Food--</option>
                <?php
                $optionString = "";
                $foods = $db->getItemTypes("Food");

                if ($foods) {
                    foreach ($foods as $food)
                    {
                        $listFood.= "<option value=".$food->getId().">".$food->getProductName()." - £". $food->getPrice()."</option>";
                    }
                }
                echo $listFood;


                ?>
            </select>
            <label style="padding-left:3em " for="quantity1" >Quantity:</label>
            <select id="foodQuantity1" class="form-control" name="foodQuantity1">
                <?php
                getQuantityNo();
                ?>
            </select>




            <br>
            <select id="foodTable2" class="form-control" name="foodTable2">
                <option>--Select Food--</option>
                <?php
                $optionString = "";
                $foods2 = $db->getItemTypes("Food");

                if ($foods2) {
                    foreach ($foods2 as $food2)
                    {
                        $listFood2.="<option value=".$food2->getId().">".$food2->getProductName()." - £". $food2->getPrice()."</option>";
                    }
                }
                echo $listFood2;


                ?>
            </select>
            <label style="padding-left:3em " for="quantity1" >Quantity:</label>
            <select id="foodQuantity2" name="foodQuantity2">

                <?php
                getQuantityNo();
                ?>
            </select>

            <br>
            <br>
            <label for="drink">Drinks</label>
            <br>
            <select id="drinkTable" class="form-control" name="drinkTable">


                    <option>--Select Drink--</option>
                    <?php
                    $optionString = "";
                    $drinks = $db->getItemTypes("Drink");

                    if ($drinks) {
                        foreach ($drinks as $drink)
                        {
                            $listDrinks.="<option value=".$drink->getId().">".$drink->getProductName()." -  £". $drink->getPrice()."</option>";
                        }
                    }
                    echo $listDrinks;


                    ?>

    </select>
            <label style="padding-left:3em " for="quantity1" >Quantity:</label>
            <select id="drinkQuantity1" name="drinkQuantity1">
                <?php
                getQuantityNo();
                ?>
            </select>

            <br>
            <select id="drinkTable2" class="form-control" name="drinkTable2">


                <option>--Select Drink--</option>
                <?php
                $drinks2 = $db->getItemTypes("Drink");

                if ($drinks2) {
                    foreach ($drinks2 as $drink2)
                    {
                        $listDrinks2.="<option value=".$drink2->getId().">".$drink2->getProductName()." -  £". $drink2->getPrice()."</option>";
                    }
                }
                echo $listDrinks2;


                ?>

            </select>
            <label style="padding-left:3em " for="quantity1" >Quantity:</label>
            <select id="drinkQuantity2" name="drinkQuantity2">
                <?php
                getQuantityNo();
                ?>
            </select>

</div>

        <div>

            <div class="w3-xlarge">
                <p><button onclick="document.getElementById('menu').style.display='block'; currentSelection()" class="w3-button w3-black">Submit Order</button></p>


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


                Table Number: <input type="text" name="tableNo">
                Name: <input type="text" name="name">
                Email: <input type="text" name="email">
                <input name="submit_Request" id="submitRequest" onclick="" type="submit" value="Place Order">

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



                </form>
            </div>
        </div>
        <?php
        $resultString = "<div class=\"row\"><div class=\col-sm-12\"><div class=\"card border-success nm-3\">
                        <div class=\"card-header bg-success text-white\">Request Success</div><div></div></div>";
            if($success > 0) {


                echo $resultString;
                alert($submitRequest);
            }





            ?>


        </div>


        </body>
</html>
