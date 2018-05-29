<?php 

if (! @($conexao = pg_connect("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    
    
    
    $nome = $_POST['nome'];
 
    
   
    $sql1 = pg_query("INSERT INTO subcategoria(nome) values('$nome');") or die("Erro no comando SQL");
   
    
    header("Location:./subcategorias.php");
   
    
    
  
}
?>