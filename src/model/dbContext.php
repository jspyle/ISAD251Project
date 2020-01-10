<?php
include_once 'product.php';

class dbContext
{
    private  $db_server = 'proj-mysql.uopnet.plymouth.ac.uk';
    private  $dbUser = 'ISAD251_JPyle';
    private $dbPassword = 'ISAD251_22213523';
    private $dbDatabase = 'ISAD251_JPyle';
    private  $dataSourceName;
    private $connection;

    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        try {
            if ($this->connection === null) {
                $this->dataSourceName = 'mysql:dbname=' . $this->dbDatabase . ';host=' . $this->db_server;
                $this->connection = new PDO($this->dataSourceName, $this->dbUser, $this->dbPassword);
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }
        }catch (PDOException $err)
        {
            echo 'Connection failed: ', $err->getMessage();
        }
    }


    public function getItemTypes($type)
    {

        $sql = "SELECT * FROM `product` WHERE `Display` = \"1\" AND `Food_Drink` LIKE '".$type."'";


        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $products = [];
        if ($resultSet) {
            foreach ($resultSet as $row) {
                $product = new Product($row['Product_Id'], $row['Product_Name'], $row['Product_Desc'], $row['Food_Drink'], $row['Price'], $row['Stock'], $row['Dietary']);
                $products[] = $product;
            }
        }
        return $products;
    }


    public function enterOrderRequest($orderDetails)
    {
        $sql = "CALL EnterRequest(:Order_Id, :Customer_Id, :Table_No, :Time)";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':Order_Id', $orderDetails->getOrderId(), PDO::PARAM_INT);
        $statement->bindParam(':Customer_Id', $orderDetails->getCustomerId(), PDO::PARAM_INT);
        $statement->bindParam(':Table_No', $orderDetails->getTableNo(), PDO::PARAM_INT);
        $statement->bindParam(':Time', $orderDetails->getTime(), PDO::PARAM_STR);
        $orderDetails = $statement->execute();

        return $orderDetails;

    }

    public function enterCustomerRequest($customer)
    {
        $sql = "CALL EnterCustomer(:Customer_Id, :Name, :Email)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':Customer_Id', $customer->getCustomerId(), PDO::PARAM_INT);
        $statement->bindParam(':Name', $customer->getName(), PDO::PARAM_STR);
        $statement->bindParam(':Email', $customer->getEmail(), PDO::PARAM_INT);

        $customer = $statement->execute();

        return $customer;

    }
    public function getNextCustomerId()
    {
        $sql="SELECT MAX(Customer_Id) FROM customer ORDER BY Customer_Id DESC ";
        $order = $this->connection->prepare($sql);
        $order->execute();
        $resultSet = $order->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultSet as $row){
            $result = $row['MAX(Customer_Id)'];
        }
        return ($result +1);

    }
    public function getNextOrderId()
    {

        $sql="SELECT MAX(Order_Id) FROM order_details ORDER BY Order_Id DESC ";
        $order = $this->connection->prepare($sql);
        $order->execute();
        $resultSet = $order->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultSet as $row){
            $result = $row['MAX(Order_Id)'];
        }
        return ($result +1);

    }
    public function enterItemRequest($itemDetails)
    {
        $sql = "CALL EnterItem(:Item_Id, :Order_Id, :Product_Id, :Quantity)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':Item_Id', $itemDetails->getItemId(), PDO::PARAM_INT);
        $statement->bindParam(':Order_Id', $itemDetails->getOrderId(), PDO::PARAM_INT);
        $statement->bindParam(':Product_Id', $itemDetails->getProductId(), PDO::PARAM_INT);
        $statement->bindParam(':Quantity', $itemDetails->getQuantity(), PDO::PARAM_INT);

        $itemDetails = $statement->execute();

        return $itemDetails;

    }

    public function callCurrentOrder(){
        $sql="SELECT item_details.Item_Id,product.Product_Id, product.Product_Name,product.Price, item_details.Quantity FROM `item_details`, `product` WHERE `Order_Id` = ".getCustomerOrder()." AND product.Product_Id = item_details.Product_Id";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $selectedOrderSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $itemsToAmend = [];
        if ($selectedOrderSet) {
            foreach ($selectedOrderSet as $row) {
                $itemAmend = new amendOrder($row['Item_Id'], $row['Product_Id'], $row['Product_Name'], $row['Price'], $row['Quantity']);
                $itemsToAmend[] = $itemAmend;
            }
        }
        return $itemsToAmend;

    }

}

