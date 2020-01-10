<?php

class orderDetails
{
    private $orderId;
    private $customerId;
    private $tableNo;
    private $time;

    public function __construct($orderId, $customerId, $tableNo, $time)
    {
        $this->orderId = $orderId;
        $this->customerId = $customerId;
        $this->tableNo =$tableNo;
        $this->time = $time;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function getTableNo()
    {
        return $this->tableNo;
    }
    public function setTableNo($tableNo)
    {
        $this->tableNo = $tableNo;
    }

    public function getTime()
    {
        return $this->time;
    }
    public function setTime($time)
    {
        $this->time = $time;
    }



}

class itemDetails{

    private $itemId;
    private $orderId;
    private $productId;
    private $quantity;

    public function __construct($itemId,$orderId, $productId, $quantity)
    {
        $this->itemId = $itemId;
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity =$quantity;

    }

    public function getItemId()
    {
        return $this->itemId;
    }
    public function setItemId($itemId)
    {
        $this->orderId = $itemId;
    }
    public function getOrderId()
    {
        return $this->orderId;
    }
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function getProductId()
    {
        return $this->productId;
    }
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

}

class customer {

    private $customerId;
    private $name;
    private $email;

    public function __construct($customerId, $name, $email)
    {
        $this->customerId = $customerId;
        $this->name = $name;
        $this->email =$email;

    }

    public function getCustomerId()
    {
        return $this->customerId;
    }
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}

class amendOrder{

    private $itemId;
    private $productId;
    private $product_Name;
    private $price;
    private $quantity;

    public function __construct($itemId, $productId, $product_Name, $price, $quantity)
    {
        $this->itemId = $itemId;
        $this->productId = $productId;
        $this->product_Name = $product_Name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getItemId()
    {
        return $this->itemId;
    }
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    public function getProductId()
    {
        return  $this->productId;
    }
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getProduct_Name()
    {
        return  $this->product_Name;
    }
    public function setProduct_Name($product_Name)
    {
        $this->product_Name = $product_Name;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }




}

