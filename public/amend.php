<?php

include_once 'header.php';
include_once '../src/model/request.php';
include_once '../src/model/dbContext.php';
include_once '../src/model/product.php';

    function getCustomerOrder()
    {
        $customerOrder = $_POST['orderIdEnter'];

        return $customerOrder;
    }
if(!isset($db)) {
    $db = new dbContext();
}

if (isset($_POST['submitRequest'])) {
    getCustomerOrder();
}

?>



<html>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <div>
    Email: <input type="text" name="orderIdEnter">
    <input name="submitRequest2" id="submitRequest2" onclick="" type="submit" value="Place Order">
    </div>

</form>


<?php
$selectedOrder = $db->callCurrentOrder();
$className = 1;

if($selectedOrder)
{
    foreach($selectedOrder as $order)
    {
        $listOrder.="<div class=item".$className.">".
            "<h5 id=price>"."£".$order->getPrice()."</h5>".
            "<h1 class='font-weight-bold'>".$order->getProduct_Name()." x ".$order->getQuantity()."</h1>".
            "</h4>"."</div>";
        $className += 1;
    }
}
echo $listOrder;
?>

</html>
