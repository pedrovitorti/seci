<?php 

if (! @($conexao = pg_connect("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    
    
    
    $id = $_POST['id'];
    
    
   
    $sql1 = pg_query("DELETE FROM usuarios WHERE id='$id';") or die("Erro no comando SQL");
        
  
    
    
   
    
    
  
}
?>