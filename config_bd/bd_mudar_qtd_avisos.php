<?php
include ("../config_bd/conexao.php");

$qtd = $_POST['qtd'];

$sql1 = pg_query("UPDATE qtd_avisos SET quantidade ='$qtd';") or die("Erro no comando SQL");


// inicio mqtt

sleep(10); // ??? Para ter certeza que deu tempo as novas imagens subirem para o servidor

/*
require("phpMQTT.php");

$server = "ifce.sanusb.org";     // change if necessary
$port = 1883;                     // change if necessary
$username = "";                   // set your username
$password = "";                   // set your password
$client_id = "mudar-MQTTx"; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
    $mqtt->publish("/seci", "atualizar", 0);
    $mqtt->close();
}
*/
// fim mqtt
// alterando arquivo.txt


$f = fopen("../../site_principal/arquivo.txt", "r+"); // Abre para leitura e gravação; coloca o ponteiro no começo do arquivo.
$text = 'b';
fwrite($f, $text);
fclose($f);

sleep(10); // Espera 10 segundos para dá tempo o raspberry atualizar os avisos, tempo muito pegueno pode não atualizar
           
// alterando arquivo.txt
$f = fopen("../../site_principal/arquivo.txt", "r+");
$text = 'a';
fwrite($f, $text);
fclose($f);

header("Location:../paginas/numero_avisos.php");

?>
