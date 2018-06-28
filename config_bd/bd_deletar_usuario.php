<?php
include ("../config_bd/conexao.php");
session_start();
$id = $_POST['id'];
$acao = $_POST['acao'];
$_SESSION['user_id_edit'] = $id;

if($acao == "Excluir"){
   $sql1 = pg_query("DELETE FROM usuarios WHERE id='$id';") or die("Erro no comando SQL");
   header("Location:../paginas/usuarios.php");

} else {
  header("Location:../config_bd/../paginas/editar_usuario.php");
  
}



?>