<?php
include_once 'product.php';

class dbContext
{
    private  $db_server = 'Proj-mysql.uopnet.plymouth.ac.uk';
    private  $db_User = 'ISAD251_JPyle';
    private $db_Password = 'ISAD_22213523';
    private $db_Database = 'ISAD251_Jpyle';
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

    public function Products()
    {
        $sql = "SELECT * FROM `product`";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $products = [];
        if($resultSet)
        {
            foreach($resultSet as $row)
            {
                $product =  new product($row['id'], $row['product_Name'], $row['product_Desc', $row['food_Drink'], $row['price'], $row['stock'],$row['dietary']]);
                $products = $product;
            }
        }
        return $products;
    }

    }

