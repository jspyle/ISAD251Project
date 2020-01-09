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

        $sql = "SELECT * FROM `product` WHERE `Food_Drink` LIKE '".$type."'";


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
    public function getNextOrderId()
    {

        $sql="SELECT Order_Id FROM order_details ORDER BY Order_Id DESC ";
        $order = $this->connection->prepare($sql);
        $order->execute();
        return $resultSet = $order->fetchAll(PDO::FETCH_ASSOC);

    }
    public function enterItemRequest($itemDetails)
    {
        $sql = "CALL EnterItem(:Order_Id, :Product_Id, :Quantity)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':Order_Id', $itemDetails->getOrderId(), PDO::PARAM_INT);
        $statement->bindParam(':Product_Id', $itemDetails->getProductId(), PDO::PARAM_INT);
        $statement->bindParam(':Quantity', $itemDetails->getQuantity(), PDO::PARAM_INT);

        $itemDetails = $statement->execute();

        return $itemDetails;

    }

}

