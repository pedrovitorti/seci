<?php 

if (! @($conexao = pg_connect("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    
    
    
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);
    $admin = $_POST['tipo'];
    
    
    
    if($admin == 'administrador'){
        // pegando usuarios do banco de dados
        $sql1 = pg_query("INSERT INTO usuarios(nome,usuario,senha,admin) values('$nome','$usuario','$senha',true);") or die("Erro no comando SQL");
        
    }else{
        // pegando usuarios do banco de dados
        $sql1 = pg_query("INSERT INTO usuarios(nome,usuario,senha,admin) values('$nome','$usuario','$senha',false);") or die("Erro no comando SQL");
        
    }
    
    header("Location:./usuarios.php");
   
    
    
  
}
?>