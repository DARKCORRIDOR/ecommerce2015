<?php
$order = $_GET["order"];
$obj = json_decode($order);
$name = $obj -> {"name"};
$food = $obj -> {"food"};
$quty = $obj -> {"quantity"};
if ($food == "pizza") {
$price = 4.99;
} else if ($food == "hamburger") {
$price = 3.33;
} else {
$price = 0;
}
$price = $price * $quty;
if ($price == 0) {
$status = "not-accepted";
} else {
$status = "accepted";
}
$array = array("name" => $name, "food" => $food, "quantity" => $quty, "price" => $price, "status" => $status);
echo json_encode($array);
?>