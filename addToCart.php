
<html><title>HoodMate Online</title>

    <link href="style.css" rel="stylesheet">
    <head></head>
    <body>
    
                            <?php
							
							if (isset($_REQUEST["item"])) {
    $item = $_REQUEST["item"];
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
                            
							$dataset = mysql_query("INSERT INTO `orderdetails`(`orderID`, `productId`, `quantity`, `price`, `total`) VALUES ('EOR00001','$item',1,0.00,0.00)");
                            if (!$dataset) {
                                echo "Error";
                                echo mysql_error();
                                exit();
                            }


                            
                            ?>
                 


</body>
</html>



