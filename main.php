
<html><title>HoodMate Online</title>

    <head>
    <link href="style.css" rel="stylesheet">
	<script src="jquery-1.11.0.js"></script>
	<script src="gen.js"></script>
	<script>
	
	function syncAjax(u){
				var obj=$.ajax(
					{url:u,
					 async:false
					 }
				);
				return $.parseJSON(obj.responseText);}
				
	function addToCart(){
	var pID=document.getElementById("item").value;
	var u="actions.php?oID=EOR00001&pID="+pID+"&q=1&p=0.00&t=0.00";//url
	return syncAjax(u);
	
	
	}
	
	
	
	</script></head>
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
	if(!$obj->listGoods()){
		echo "error";
		exit();
	}
	
	//$row=$obj->fetch();
	

                            echo "<table>";
                            $counter = 1;
                            while ($row=$obj->fetch()) {
								$id=$row['productId'];
                                $image = $row['productImage'];
                                if ($counter % 5 == 1) {
                                    echo "<tr><td><div><img  src='$image' alt='' width='120' height='120'><font color='darkslategrey' ></div><div>" . $row['productName'] . "</div><div>GHS " . $row['price'] . "</div><div><form><input type='hidden' value='<?php $id?>'name='item'><input type='submit' value='Add To Cart' onClick='addToCart()'></form></div></font></td>";
                                } else if ($counter % 5 == 0) {
                                    echo "<td><div><img  src='$image' alt='' width='120' height='120'><font color='darkslategrey' ></div><div>" . $row['productName'] . "</div><div>GHS " . $row['price'] . "</div><div><form><input type='hidden' value='<?php $id?>'name='item'><input type='submit' value='Add To Cart' onClick='addToCart()' ></form></div></td></font</tr>";
                                } else {
                                    echo "<td><div><img  src='$image' alt='' width='120' height='120'><font color='darkslategrey' ></div><div>" . $row['productName'] . "</div><div>GHS " . $row['price'] . "</div><div><form><input type='hidden' value='<?php $id?>' name='item'><input type='submit' value='Add To Cart' onClick='addToCart()'></form></div></font</td>";
                                }

                                $counter++;
                            }

                            echo "</table>";
                            ?>
                        </div></td></tr>
            </table>
        </div></center>


</body>
</html>



