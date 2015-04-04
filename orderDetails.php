<?php
if (isset($_REQUEST["cus_ID"])) {
    $customer = $_REQUEST["cus_ID"];
}

//check connection to your database
$database = "ecommerce"; //this database has to exist. 
$username = "root";   //the main admin user of mysql
$password = ""; //use root password of mysql
$server = "localhost"; //name of the server

$link = mysql_connect($server, $username, $password);
//if result is false, the connection did not open
if (!$link) {
    echo "Failed to connect to mysql.";
    //display error message from mysql
    echo mysql_error();
    exit();  //end script
}
//select the database to work with using the open connection 
if (!mysql_select_db($database, $link)) {
    echo "Failed to select database.";
    //display error message from mysql
    echo mysql_error();
    exit();
}

//start runing query
$dataset = mysql_query("SELECT  productName from OrderDetails,customerOrder,product,customer
         where (orderDetails.orderID=customerOrder.orderID )and
        (orderDetails.productId=product.productID) 
        and customer.customerID='$customer'");
if (!$dataset) {
    echo "Error";
    echo mysql_error();
    exit();
}

while ($row = mysql_fetch_assoc($dataset)) {
    echo $row['productName'];
    
}
?>
		


