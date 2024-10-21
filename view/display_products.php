<?php
    //  include "models/product_db.php";
    
    $aryProducts = getProducts();
    // print_r($aryProducts);
    foreach($aryProducts as $aryProd)
    {
        echo "<a href='?id=$aryProd[productID]'>$aryProd[productCode]</a>  $aryProd[productName]<br>";
    }
?>