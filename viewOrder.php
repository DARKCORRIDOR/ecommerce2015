
<html><title>HoodMate Online</title>

    <link href="style.css" rel="stylesheet">
    <head></head>
    <body>
	 
    <center><div>
            <table>
                <tr>
                <h1 style="font-family:jokerman;FONT-SIZE:40PX;color:white" >HOODMATE ONLINE</h1></tr>

                <tr>

                    <td id="mainnav">
                        <table border=1 style="background:white;width:100%"><tr ><td>Categories</td></tr><tr><td>Shoes</td></tr><tr><td ><a href="search.php" style="display:block;">Furniture</a></td></tr><tr><td>Food</td></tr><tr><td>Clothes</td></tr><tr><td>Jewellery</td></tr><tr><td>Real Estate</td></tr></table>




                    </td>
                    <td><div>
                            <table  style="border-top: double;border-bottom: double;
                                    border-right: blank width:50% font-size:30px;color:darkslategrey "><tr>
                                    <td><a href ="home.php">Home</a></td><td><a href ="#">About HoodMate</a></td>

                                    <td><a href ="#">Contact Us</a></td>

                                    <td><a href ="#">Promotions</a></td>
                                    <td>
                                        <form action="search.php" method="post">
                                            <input type="textbox" name="key">
                                            <input type="submit"  value="search">
                                        </form></td><td> <a href ="viewOrder.php">Cart:<?php echo 5?></a></td></tr></table></div><div>



                           
<?php
include("functions.php");
	$obj=new functions();
	//lists all the data in a table form
	if(!$obj->listCartItems()){
		echo "error";
		exit();
	}
	
	

                            echo "<table style='border-top: double;border-bottom: double;
                                    border-right: blank width:50% font-size:30px;color:darkslategrey' >";
							echo "<tr><td>Product</td><td>Price</td><td>Quantity</td><td>Total</td></tr>";

                            $counter = 1;
                            while ($row=$obj->fetch()) {
								echo "<tr><td>".$row['productName']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td><td>".$row['total']."</td></tr>";
                                $counter++;
                            }

                            echo "</table>";
                            ?>
							<input type="submit"value="Check Out" id="checkout_button">
                        </div></td></tr>
            </table>
        </div></center>


</body>
</html>



