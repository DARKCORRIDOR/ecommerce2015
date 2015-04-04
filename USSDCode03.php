
<?php
$request= $_GET["request"];
$obj = json_decode($request);
dump_var($obj);
echo $obj[0]->{"Mobile"};
/*$Mobile= $obj ->{"Mobile"};
$SessionId=$obj ->SessionId;
$ServiceCode=$obj ->{"ServiceCode"};
$Type=$obj ->{"Type"};
$Message=$obj ->{"Message"};
$Operator=$obj ->{"Operator"};
$Sequence=$obj ->{"Sequence"};*/

/*if ($Type  == "Initialization") {
//$response = "WELCOME!Press 1 for Orderstatus, 2 for Order Details";
}*//* else if ($food == "hamburger") {
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
$array = array("Response" => "Hi there!"/*$response*/); 
echo json_encode($array);
?>