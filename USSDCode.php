<?php

if (isset($_REQUEST["mobile"])) {
    $mobile = $_REQUEST["mobile"];
	//if isset
    $sessionID = $_REQUEST["sessionID"];  
	$serviceCode = $_REQUEST["serviceCode"];
    $type= $_REQUEST["type"];
    $message= $_REQUEST["message"];
    $operator= $_REQUEST["operator"];
    $sequence= $_REQUEST["sequence"];


}

switch ($type) {
    case "initialize":
        initialize();
        break;
    /*case 2:
        respond();

        break;*/
		}


function initialize(){
//show the menu by sending back json format
echo "It works!The USSD...";


}
function respond(){
echo "Select a menu";

}









?>