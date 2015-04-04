<?php 
// Read and parse USSD request data as JSON.
//$ussdRequest = json_decode(@file_get_contents('php://input'));
$order = $_GET["request"];
$obj = json_decode($order);

// Check if no errors occured.
if ($obj.ServiceCode == "712") {
   
header('Content-type: application/json; charset=utf-8');

$ussdResponse = new stdClass;
$ussdResponse->Mobile = "0267773618";
$ussdResponse->SessionId = 01;
$ussdResponse->ServiceCode = "712";
$ussdResponse->Type= "Initiation";
$ussdResponse->Message = "Welcome";
$ussdResponse->Operator = "AirtelGH";
$ussdResponse->Sequence = 1;
echo json_encode($ussdResponse);
}


?>