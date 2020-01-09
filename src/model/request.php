<?php

class request
{
    private $orderId;
    private $customerId;
    private $tableNo;
    private $time;
    private $ageRestriction;

    public function __construct($orderId, $customerId, $tableNo, $time, $ageRestriction)
    {
        $this->orderId = $orderId;
        $this->customerId = $customerId;
        $this->tableNo =$tableNo;
        $this->time = $time;
        $this->ageRestriction = $ageRestriction;
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

    public function getAgeRestriction()
    {
        return $this->ageRestriction;
    }
    public function setAgeRestriction($ageRestriction)
    {
        $this->ageRestriction = $ageRestriction;
    }

}

