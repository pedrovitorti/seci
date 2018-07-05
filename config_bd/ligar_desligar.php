<?php


// inicio mqtt

//sleep(10); // ??? Para ter certeza que deu tempo as novas imagens subirem para o servidor

require("phpMQTT.php");

$rpi_on_off = $_POST['rpi_on_off'];

if($rpi_on_off == "Desligar"){

    $server = "ifce.sanusb.org";     // change if necessary
    $port = 1883;                    // change if necessary
    $username = "";                  // set your username
    $password = "";                  // set your password
    $client_id = "pedro-MQTTx"; // make sure this is unique for connecting to sever - you could use uniqid()
    
    $mqtt = new phpMQTT($server, $port, $client_id);
    
    if ($mqtt->connect(true, NULL, $username, $password)) {
    	$mqtt->publish("/seci", "desligar", 0);
    	$mqtt->close();
    }
} else {
    $server = "ifce.sanusb.org";     // change if necessary
    $port = 1883;                    // change if necessary
    $username = "";                  // set your username
    $password = "";                  // set your password
    $client_id = "pedro-MQTTx"; // make sure this is unique for connecting to sever - you could use uniqid()
    
    $mqtt = new phpMQTT($server, $port, $client_id);
    
    if ($mqtt->connect(true, NULL, $username, $password)) {
        $mqtt->publish("/seci", "ligar", 0);
        $mqtt->close();
    }
    
}

header("Location:../paginas/gerenciar_monitores.php");

?>