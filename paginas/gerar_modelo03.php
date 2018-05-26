<?php
session_start();
if (! isset($_SESSION['user_logged_in'])) {
    header('location:../index_login.php');
    exit();
}

require_once ('func_image03.php');
// if form not submitted, show it and bail
if (! isset($_GET['title_text']) && ! isset($_GET['description_text'])) {
    ?>


<html>
<head>
<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
<meta charset="UTF-8">
<meta http-equiv="cache-control"
	content="no-store, no-cache, must-revalidate, Post-Check=0, Pre-Check=0">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
<!-- link para bootstrap CSS -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- CSS -->
<style type="text/css">
body {
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
	width: 252px;
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
	padding: 0px;
	margin: 0px;
	background-color: #1482b0;
	list-style: none;
}

#menu-opcoes ul li {
	display: inline;
}

#menu-opcoes ul li a {
	padding: 6px 15px;
	display: inline-block;
	font-size: 20px;
	/* visual do link */
	background-color: #1482b0;
	color: white;
	text-decoration: none;
	border-bottom: 3px solid #1482b0;
	height: 40px;
}

#menu-opcoes ul li a:hover {
	background-color: #1d9bcf;
	color: white;
	border-bottom: 3px solid white;
}

.header-black {
	padding-top: 10px;
}

#parte00 {
	width: 43%;
	/*background-color: green;*/
	position: relative;
	top: 50px;
	left: 50px;
}

#parte01 {
	float: left;
	width: 43%;
	/*background-color: green;*/
	position: relative;
	top: 50px;
	left: 50px;
}

#parte02 {
	float: left;
	width: 33%;
	/*background-color: black;*/
	position: relative;
	top: 50px;
	left: 180px;
}

h4 {
	background-color: #9a9595;
	width: 200%;
	padding: 5px;
}

.container {
	margin: 0 auto;
	width: 940px;
}

input[type=text]:hover, textarea:hover {
	background: #ffffff;
	border: 1px solid #990000;
}

input[type=submit] {
	background: #006699;
	color: #ffffff;
}
</style>
</head>
<body>

	<!-- Cabeçalho -->
	<header>

		<div class="header-black">
			<div class="container">
				<!-- container é do bootstrap -->
				<div class="pull-right">
					<!-- alinha informação para direita, até limites do container -->
                		<?php
    echo "Olá, " . $_SESSION['user_login'] . " | <a href='logout.php'>Encerrar Sessão</a>";
    ?>
                	</div>
			</div>
		</div>

		<div class="container">
			<!-- container é do bootstrap -->

			<div class="row">
				<nav id="menu-opcoes" class="pull-right">
					<ul>
						<li><a href="principal_adm.php">Página Inicial</a></li>
						<li><a href="modelos.php">Criar avisos</a></li>
						<li><a href="galeria.php">Galeria</a></li>
						<li><a href="ajuda.php">Ajuda</a></li>
					</ul>
				</nav>

			</div>

		</div>

		<div class="container">
			<!-- logo -->
			<img id="logotipo" src="../imagens/logo.png" alt="logotipo">
		</div>

	</header>

	<!-- Conteúdo do cabeçalho -->

	<div id="main" class="container">
		<!-- Conteúdo principal -->

		<div id="parte00">
			<h4>Passo 01 - Enviar imagem do painel</h4>
			<form action="./gerar_image_03/enviar03.php" method="POST"
				enctype="multipart/form-data">
				Imagem JPG: <input type="file" name="fileUpload1"><input
					type="hidden" name="nomeImg1" value="imagem"><br> <input
					type="submit" style="width: 150; height: 30" id="send"
					value="Enviar">
			</form>
		</div>
		<br>
		<br>
		<form>
			<div id="parte01">
				<h4>Passo 02 - Configurar Imagem</h4>


				<select name="category_text">
					<option>DIREÇÃO GERAL/DIRAP</option>
					<option>DIREN</option>
					<option>ENSINO</option>
					<option>ESTÁGIO</option>
					<option>EXTENSÃO</option>
					<option>PESQUISA</option>
				</select> <select name="sub_category_text">
					<option>Auxílios</option>
					<option>Avisos</option>
					<option>Calendário Acadêmico</option>
					<option>Cardápio</option>
					<option>Cursos</option>
					<option>Informações Acadêmicas</option>
					<option>Editais Internos</option>
					<option>Editais Externos</option>
					<option>Eixo/ Meio Ambiente</option>
					<option>Eixo/ Indústria</option>
					<option>Eixo/ Computação</option>
					<option>Esporte</option>
					<option>Eventos</option>
					<option>Feriados</option>
					<option>Imprensa</option>
					<option>Infraestrutura</option>
					<option>Jardineira</option>
					<option>Mestrado</option>
					<option>Monitoria</option>
					<option>Pagamento de bolsas/auxílios</option>
					<option>Pedagogia</option>
					<option>Pesquisa</option>
					<option>Programas</option>
					<option>Projetos</option>
					<option>Pontos Facultativos</option>
					<option>Recesso Escolar</option>
					<option>Restaurante Acadêmico</option>
					<option>Saúde</option>
					<option>Site</option>
					<option>Superior</option>
					<option>Técnico</option>
					<option>Outros</option>
				</select>

				<!--<p>Título da Vaga:<br /><input name="sub_category_text" /></p>-->
				<p>
					Título:<br />
					<textarea wrap="hard" rows="1" cols="35" maxlength="34"
						name="title_text" /></textarea>
				</p>
				<p>
					Descrição:<br />
					<textarea wrap="hard" rows="3" cols="50" maxlength="155"
						name="description_text" /></textarea>
				</p>
				<p>
					<input type="submit" style="width: 150; height: 30"
						value="Gerar Imagem" />
				</p>

			</div>
		</form>


		<div id="parte02">
			<br>
			<br>
			<br>Imagem de plano de fundo:<br>
			<br> <img width="400" height="250" src="imagens/fundos.png" />
		</div>

	</div>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<footer id="footer">

		<center>
			<span class="fonte_menus">© Copyright 2017 DEPPI - Departamento de
				Extensão, Pesquisa, Pós-graduação e Inovação</span>
		</center>
		</div>
	</footer>
</body>
</html>

<?php
    die();
}

// get form submission (or defaults)
$category_text = isset($_GET['category_text']) ? $_GET['category_text'] : 'IFCE - Maracanau';
$sub_category_text = isset($_GET['sub_category_text']) ? $_GET['sub_category_text'] : 'IFCE - Maracanau';
$title_text = isset($_GET['title_text']) ? $_GET['title_text'] : 'IFCE - Maracanau';
$description_text = isset($_GET['description_text']) ? $_GET['description_text'] : 'IFCE - Maracanau';
// $filename = memegen_sanitize( $description_text ? $description_text : $title_text );

$args = array(
    'category_text' => $category_text,
    'sub_category_text' => $sub_category_text,
    'title_text' => $title_text,
    'description_text' => $description_text,
    'filename' => $filename,
    'font' => dirname(__FILE__) . '/font/OpenSans-ExtraBold.ttf',
    'font_sub' => dirname(__FILE__) . '/font/OpenSans-Light.ttf', // '/sans.ttf',
    'imagebase' => dirname(__FILE__) . '/font/imagem_gerada.jpg',
    'sub_category_textsize' => 24,
    'title_textsize' => 55,
    'descrition_textsize' => 38,
    'textfit' => true,
    'padding' => 70,
    'margin' => 10
);

// create and output image 
generate_image( $args );

?>
	