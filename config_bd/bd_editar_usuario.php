<?php


include ("../config_bd/conexao.php");
session_start();
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$admin = $_POST['tipo'];
$id=$_SESSION['user_id_edit'];

if ($admin == 'administrador') {
  $sql1 = pg_query("update usuarios set nome='$nome', usuario='$usuario', senha='$senha', admin=true  where id='$id';") or die("Erro no comando SQL");
}else {
    $sql1 = pg_query("update usuarios set nome='$nome', usuario='$usuario', senha='$senha', admin=false  where id='$id';") or die("Erro no comando SQL");
 
}
 
header("Location:../paginas/usuarios.php");




?>