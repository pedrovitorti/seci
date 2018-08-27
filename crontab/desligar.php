#!/usr/bin/php
<?php
require("phpMQTT.php");

$server = "ifce.sanusb.org";     // change if necessary
$port = 1883;                     // change if necessary
$username = "";                   // set your username
$password = "";                   // set your password
$client_id = "pedro-MQTTx"; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
    $mqtt->publish("/seci", "desligar", 0);
    $mqtt->close();
}
?>
