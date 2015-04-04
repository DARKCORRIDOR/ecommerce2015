<?php
include("gen.php");
$cmd = get_datan("cmd");
switch ($cmd) {
    case 1:
        addToCart();
        break;
    case 2:
        viewCart();
        break;
	case 3:
		getProductDetails();
		break;		
    default:
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "unknown command");
        echo "}";
}
function addToCart(){
include_once("functions.php");

    $orderID = get_data("oID");
    $productID = get_data("pID");
	$quantity=get_datan("q");
	$price=get_datan("p");
	$total=$quantity*$price;
	$v =new functions(); //create an object
    $row = $v->addToCart($orderID,$productID,$quantity,$price,$total); //add order
    //display error message
    if (!$row) {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "Order not Added!");
        echo "}";
        return;
    }

    echo "{";
    echo jsonn("result", 1) . ",";
    echo "}";

}

function getProductDetails(){
include_once("functions.php");
    $pID = get_data("pID");
    $v = new functions();
    $row = $v->getProductDetails($pID) ;
    $row = $v->fetch();
    if (!$row) {
        //display error message
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "Failed to load product details!");
        echo "}";
        return;
    }

    echo "{";
    echo jsonn("result", 1) . ",";
    echo '"Details":{';

    echo jsons("productID", $row['productId']).",";
	echo jsonn("price", $row['price']);

    echo '}';
    echo "}";
}
/*


function getUserDetails() {
    include_once("marketclass.php");

    $username = get_data("username");
    $password = get_data("password");
    $v = new marketclass(); //create an object
    $row = $v->getUser($username, $password); //get all the details in the record
    $row = $v->fetch();
    //display error message
    if (!$row) {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "User Not Found!");
        echo "}";
        return;
    }

    echo "{";
    echo jsonn("result", 1) . ",";
    echo '"Details":{';

    echo jsons("name", $row['username']);

    echo '}';
    echo "}";
}








function getAllUserGoods() {

    include_once("marketclass.php");
    $username = get_data("username");



    $v = new marketclass();
    $row = $v->getGoods($username);
    $row = $v->fetch();
    if (!$row) {
        //display error message
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "Update Failed!");
        echo "}";
        return;
    }

    echo " {
    ";
    echo jsonn("result", 1) . ", ";
    echo '"details":';
    echo "[";
    echo "{";
	echo jsonn("goodNo", $row['goodNo']) . ", ";
    echo jsons("good", $row['good']) . ", ";
    echo jsonn("price", $row['price']);
    echo "}";
    while ($row = $v->fetch()) {
        echo ",";

        echo "{";
		echo jsonn("goodNo", $row['goodNo']) . ", ";
        echo jsons("good", $row['good']) . ", ";
        echo jsonn("price", $row['price']);
        echo "}";
    }
    echo "]";


    echo "
}";
}


function getGoodByNo(){
include_once("marketclass.php");
    $goodNo = get_data("goodNo");
    $v = new marketclass();
    $row = $v->getGoodDetails($goodNo) ;
    $row = $v->fetch();
    if (!$row) {
        //display error message
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "Failed!");
        echo "}";
        return;
    }

    echo "{";
    echo jsonn("result", 1) . ",";
    echo '"Details":{';

    echo jsonn("goodNo", $row['goodNo']).",";
	echo jsons("good", $row['good']).",";
	echo jsonn("price", $row['price']);

    echo '}';
    echo "}";
}
*///last comment
?>