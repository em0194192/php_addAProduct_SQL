<?php

    //create some variables to hold
    $dsn = "mysql:host=localhost;dbname=my_guitar_shop2";
    $username = "root";
    $password = "";

    //Connect to the database (try catch gives error or confirmation)
    //Note that PDO (php data object) is a class (with methods/properties)
    try {
        $db = new PDO($dsn, $username, $password);
        //echo("Connected to database");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo("Error connecting to database: $error_message");
        exit();
    }

    function getProducts()
    {
        //decalre global to have access to $db
        global $db;
        //string variable for the query
        $qry = "Select * from products";
        $pdoStatement = $db->query($qry);
        //use fetchall method of the pdostatement
        $products = $pdoStatement->fetchAll();

        // print_r($products);
        return $products;
    }
    

    function getProduct($id)
    {
        //to allow access to that variable
        global $db;
        //make a query
        $query = "SELECT * FROM `products` WHERE products.productID = $id; ";
        $obj = $db->query($query);
        //fetch returns just next line, fetchall gets all
        return $obj->fetch();

    }

    function addProducts($id, $name, $price)
    {
        if ($id === null || $name === null || $price === null) {
            // If any parameter is null, return false
            return false;
        }

        $query = "INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `description`, `listPrice`, `discountPercent`, `dateAdded`) VALUES (NULL, '1', '$id', '$name', 'The coolest guitar on the planet', '$price', '0.00', '2024-10-21 16:39:50.000000'); ";
        echo($query);

        global $db;
        $db->query($query);
        return true; 
        
        
    }

    
?>