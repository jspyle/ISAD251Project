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


    public function enter_Request($request)
    {
        $sql = "CALL EnterRequest(:Order_Id, :Customer_Id, :Table_No, :Time :Age_Restriction)";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam('Order_Id', $request->getOrderId(), PDO::PARAM_STR);
        $statement->bindParam('Customer_Id', $request->getCustomerId(), PDO::PARAM_STR);
        $statement->bindParam('Table_No', $request->getTableNo(), PDO::PARAM_STR);
        $statement->bindParam('Time', $request->getTime(), PDO::PARAM_STR);
        $statement->bindParam('Age_Restriction', $request->getModuleId(), PDO::PARAM_STR);
        $return = $statement->execute();

    }




}

