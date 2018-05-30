<?php 

if (! @($conexao = pg_connect("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    
    
    
    $qtd= $_POST['qtd'];
    
    
   
    $sql1 = pg_query("UPDATE qtd_avisos SET quantidade ='$qtd';") or die("Erro no comando SQL");
        
  
    
    
   
    
    
    //alterando arquivo.txt
    $f = fopen("arquivo.txt", "r+"); //Abre para leitura e gravação; coloca o ponteiro no começo do arquivo.
    $text = 'b';
    fwrite($f, $text);
    fclose($f);
    
    sleep(10); // Espera 10 segundos para dá tempo o raspberry atualizar os avisos, tempo muito pegueno pode não atualizar
    
    //alterando arquivo.txt
    $f = fopen("arquivo.txt", "r+");
    $text = 'a';
    fwrite($f, $text);
    fclose($f);
    header("Location:./numero_avisos.php");
  
}
?>