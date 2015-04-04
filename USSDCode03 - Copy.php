
<?php
$request= $_GET["request"];
$obj = json_decode($request);
$type = $obj ->{"Type"};

if ($type  == "Initialization") {
$response = "WELCOME!Press 1 for Orderstatus, 2 for Order Details";
}/* else if ($food == "hamburger") {
$price = 3.33;
} else {
$price = 0;
}
$price = $price * $quty;
if ($price == 0) {
$status = "not-accepted";
} else {
$status = "accepted";
}*/
$array = array("Response" => $response); 
echo json_encode($array);
?>