<?php
    //create some variables to hold
    $dsn = "mysql:host=localhost;dbname=my_guitar_shop2";
    $username = "root";
    $password = "";

    //Connect to the database (try catch gives error or confirmation)
    //Note that PDO (php data object) is a class (with methods/properties)
    try {
        $db = new PDO($dsn, $username, $password);
        echo("Connected to database");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo("Error connecting to database: $error_message");
        exit();
    }

    //Create a query
    //save sql statement as a variable
    $qry = "SELECT * FROM `customers`, addresses WHERE customers.customerID = addresses.customerID; ";
    $result = $db->query($qry);
    //print_r($result);

    $aryCustomers = $result->fetchAll();
    //print_r($aryCustomers);

    foreach($aryCustomers as $cust)
    {
        echo ("$cust[firstName] $cust[lastName]");
    }

    //closes connections
    $qry = null;
    $result = null;