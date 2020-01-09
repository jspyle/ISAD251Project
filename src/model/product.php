<?php

class Product
{
    private $id;
    private $product_Name;
    private $product_Desc;
    private $food_drink;
    private $price;
    private $stock;
    private $dietary;

    public function __construct($id, $product_Name, $product_Desc, $food_drink, $price, $stock, $dietary)
    {
        $this->id = $id;
        $this->product_Name = $product_Name;
        $this->product_Desc = $product_Desc;
        $this->food_drink = $food_drink;
        $this->price = $price;
        $this->stock = $stock;
        $this->dietary = $dietary;

    }

    public function getId()
    {
        return $this->id;
    }
    public function getProductName()
    {
        return $this->product_Name;
    }
    public function getProductDesc()
    {
        return  $this->product_Desc;
    }
    public function getFoodDrink()
    {
        return $this->food_drink;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function getDietary()
    {
        return $this->dietary;
    }

}

