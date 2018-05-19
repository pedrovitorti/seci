<?php
        session_start();
        if (!isset($_SESSION['user_logged_in'])) {
           header('location:../index_login.php');
           exit();
        }
        
        if(!@($conexao=pg_connect ("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
            print "Não foi possível estabelecer uma conexão com o banco de dados.";
        } else {
          
            //Verificando se o usuário está cadastrado no banco
            $sql = pg_query("SELECT quantidade FROM qtd_avisos;")
            or die ("Erro no comando SQL");
            
            //TABELA: quantidades
            if (! $sql) {
                echo "Consulta não foi executada!";
            }
          //  if(pg_num_rows($consulta_quantidades_computacao) == 0) {
          //      echo "Dados do laboratório ainda não foram adicionados.";
          //  }
            
          
            while($row = pg_fetch_array($sql)) {
                
                $_SESSION['qtd_avisos'] = $row[0];
             
            }
                
                pg_close ($conexao);
                
        }
?>

<html>
	<head>
	  	<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
		<meta charset="UTF-8">
		<meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate, Post-Check=0, Pre-Check=0">
		<meta http-equiv="expires" content="0">
		<meta http-equiv="pragma" content="no-cache">
		<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css"><!-- link para bootstrap CSS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		
		<!-- CSS -->
		<style type="text/css">
		
		    body{
		        background-color: white;
		    }
    		
    		header {
            	width: 100%;
            	height: 80px;
            	background-color: #1482b0; /* aplicando transparência no menu */ 
            	z-index: 2; /* colocando na frente da imagem */
            	position: relative;
            }
            
            header #logotipo {
            	position: absolute;
                width:252px;
            	height: 102px;
            	top: 10px;
            	border: 3px solid white;
            }

            header .header-black {
            	background-color: #dcdde1;
            	height: 40px;
            }
            
            /* MENU - INÍCIO */
            #menu-opcoes ul {
                
				padding:0px;
				margin:0px;
				background-color:#1482b0;
				list-style:none;
			}
			
			#menu-opcoes ul li { 
				display: inline; 
				
			}
			
			#menu-opcoes ul li a {
				padding: 6px 15px;
				display: inline-block;
                font-size: 20px;
				/* visual do link */
				background-color:#1482b0;
				color: white;
				text-decoration: none;
				border-bottom:3px solid #1482b0;
				height: 40px;
			}


			#menu-opcoes ul li a:hover {
				background-color:#1d9bcf;
				color: white;
				border-bottom:3px solid white;
			}
            
    	   .header-black{
    	       padding-top:10px;
    	   }
    		
    	   #upload{
    	       background-color: #dcdde1;
    	       padding: 6px 15px;
    	       width: 500px;
    	   }
    	   
    	   h4{
    	       margin: 0 auto;
    	   
    	   }
		</style>
		
		<script type="text/javascript">

		var n=1;
		
		$(document).ready(function() {
			for (i = 0; i < <?php echo $_SESSION['qtd_avisos']?>; i++) { 
		      //var novoItem = $("#item").clone().removeAttr('id'); // para não ter id duplicado
		      //novoItem.children('input').val(''); //limpa o campo quantidade

		      var novoItem = 'Aviso '+n+':<div id="upload"><input type="file" name="fileUpload'+n+'"><input type="hidden" name="nomeImg'+n+'" value="img'+n+'"></div>';
		   
		      
		      $("#item").append(novoItem);
		    	n++;
			}
		  });

		</script>
	</head>
	<body>

		<!-- Cabeçalho -->
		<header>

    		<div class="header-black">
    			<div class="container"> <!-- container é do bootstrap -->
        			<div class="pull-right"> <!-- alinha informação para direita, até limites do container -->
                		<?php
                		  echo "Olá, ".$_SESSION['user_login']." | <a href='logout.php'>Encerrar Sessão</a>"; 
                		?>
                	</div>
      			</div>
			</div>
			
			<div class="container"> <!-- container é do bootstrap -->
				
				<div class="row">
					<nav id="menu-opcoes" class="pull-right">
						<ul>
							<li><a href="#">Página Inicial</a></li>
							<li><a href="#">Criar avisos</a></li>
							<li><a href="#">Galeria</a></li>
							<li><a href="#">Ajuda</a></li>
						</ul>
					</nav>

				</div>

			</div>

			<div class="container"> 
				<!-- logo -->
				<img id="logotipo" src="../imagens/logo.png" alt="logotipo">
			</div>
	
		</header><br><br><br>
		
	
		<div class="container "> 
						
                		
                <h4>Modificar Avisos</h4><br>
                <form id="formulario" action="enviar.php" method="POST" enctype="multipart/form-data">
              
                	
                	<div id="item"  >
					
					</div><br>
					<input type="submit" style="width:150;height:30" id="send" value="Enviar">
					<input type="submit" style="width:150;height:30" id="send" value="Atualizar">	<!--Teste botao atualizar --> 
				</form>
		</div>