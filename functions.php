
<?php

	include_once("connectClass.php");
	
	class functions extends connectClass{
		
			function functions(){
				connectClass::connectClass();
			}

			//lists all goods in the database
			function listGoods(){
			return $this->query("select * from product");
			}
			
			function search($key){
			return $this->query("SELECT * FROM product where productName like '%$key%'");
			}
			
			function getProductDetails($id){
			return $this->query("SELECT * FROM product where productId='$id'");

			}
			
			function addToCart($orderID,$productID,$quantity,$price,$total){
			return $this->query("INSERT INTO `orderdetails`(`orderID`, `productId`, `quantity`, `price`, `total`)
			VALUES ('$orderID','$productID',$quantity,$price,$total)");
			}
			
			function listCartItems(){
			return $this->query("SELECT  productName,`orderID` , product.productId,  `quantity` , product.price, product.price * quantity AS total FROM orderdetails, product WHERE orderdetails.productId = product.productId");
			}
			
		   }

?>
