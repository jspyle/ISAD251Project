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

    private $orderId;
    private $productId;
    private $quantity;

    public function __construct($orderId, $productId, $quantity)
    {
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity =$quantity;

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



