<html><title>HoodMate Online</title>

    <link href="style.css" rel="stylesheet">
	<script src="jquery-1.11.0.js"></script>
		<script src="gen.js"></script>
    <head><script>
	function syncAjax(u){
				var obj=$.ajax(
					{url:u,
					 async:false
					 }
				);
				return $.parseJSON(obj.responseText);}
	function showForm(){
				var y=event.clientY;
				var x=event.clientX/2;
				$("#orderForm").css("top",y);
				$("#orderForm").css("left",x);
				//display the form
				$("#orderForm").fadeIn(1000);}
				
				
	function addOrderToCart(){
		var o=document.getElementById("order_id").value;
		var p=document.getElementById("p_id").value;
		var p=document.getElementById("price").value;
		var q=document.getElementById("quantity").value;
		var u="actions.php?cmd=1&oID="+o+"&pID="+p+"&p="+p+"&q="+q;
		return syncAjax(u);

	
	}
							

	
	
	</script></head>
    <body>
<?php
	/*
		Place code to connect to your DB here.
	*/
	// include your code to connect to DB.
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


                           /* if (!$dataset) {
                                echo "Error";
                                echo mysql_error();
                                exit();
                            }
							*/

							
							


	$tbl_name="product";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "home2.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select * from product LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}
?>
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
                                        </form></td><td> <a href ="viewOrder.php">Cart</a></td></tr></table></div><div>



                           

	<?php
	echo "<table>";
                            $counter = 1;
		while($row = mysql_fetch_array($result))
		{
								$id=$row['productId'];
                                $image = $row['productImage'];
                                if ($counter % 5 == 1) {
                                    echo "<tr><td><div><img  src='$image' alt='' width='120' height='120'><font color='darkslategrey' ></div><div>" . $row['productName'] . "</div><div>GHS " . $row['price'] . "</div><div><form action='addToCart.php' method='post'<input type='hidden' value='<?php $id?>'name='item'><input type='submit' value='Add To Cart' onclick='showForm()' </form></div></font></td>";
                                } else if ($counter % 5 == 0) {
                                    echo "<td><div><img  src='$image' alt='' width='120' height='120'><font color='darkslategrey' ></div><div>" . $row['productName'] . "</div><div>GHS " . $row['price'] . "</div><div><form action='addToCart.php' method='post'<input type='hidden' value='<?php $id?>'name='item'><input type='submit' value='Add To Cart'onclick='showForm()' </form></div></td></font</tr>";
                                } else {
                                    echo "<td><div><img  src='$image' alt='' width='120' height='120'><font color='darkslategrey' ></div><div>" . $row['productName'] . "</div><div>GHS " . $row['price'] . "</div><div><form action='addToCart.php' method='post'<input type='hidden' value='<?php $id?>' name='item'><input type='submit' value='Add To Cart' onclick='showForm()' </form></div></font</td>";
                                }

                                $counter++;
                            }
							 echo "</table>";

                            ?>
                      </div></td>
			<td><div><table></table>
			<table>
			<tr><td>
<a href="" target="_blank"><img src="images/StanChart.jpg" alt="BANNER1_ALT" width='150' height='120'title="BANNER1_TITLE"></a></div></td></tr><tr><td>
<div><a href="" target="_blank"><img src="images/TikiHouse1.jpg" alt="BANNER2_ALT" width='150' height='120' title="BANNER2_TITLE"></a></div></td></tr><tr><td>
<div><a href="" target="_blank"><img src="images/Salon.jpg" alt="BANNER3_ALT"  width='150' height='120' title="BANNER3_TITLE"></a></div></td></tr></table>

 </div></td></tr>            </table>

        </div></center>
		

<div><center>

<?=$pagination?>
</center></div>
<div id="orderForm" class="popupForm">
		<table class="tableForm" >
		             <tr>
						<td class="label">Order Details</td>
					</tr>
					<tr>
						<td><input type="hidden" value="<?php $oid='EOR00001'; ?>"id="order_id"></td>
						<td><input type="hidden" value="<?php $id=$row['productId']?>"id="p_id"></td>
						<td><input type="hidden" value="<?php $id=$row['price']?>"id="price"></td>

					</tr>
						<tr>
						<td class="label">Quantity:</td>
						<td class="field"><input type="textbox" id="quantity"></td>

						</tr><tr><input type="button" value="Add" onclick="addOrderToCart()" >
						</td>
					</tr>
			</table>
				
	</div>


	
	
	
</body>
</html>	