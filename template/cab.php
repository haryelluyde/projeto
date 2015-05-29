<!DOCTYPE HTML>
<?php session_start();?>
<html>
	<head>
		<meta charset = 'UTF-8'>
		<link rel = 'stylesheet' type = 'text/css' media = 'screen and (min-width:0px)' href = 'css/little.css'>
		<link rel = 'stylesheet' type = 'text/css' media = 'screen and (min-width:550px)' href = 'css/smart.css'>
		<link rel = 'stylesheet' type = 'text/css' media = 'screen and (min-width:618px)' href = 'css/mobile.css'>
		<link rel = 'stylesheet' type = 'text/css' media = 'screen and (min-width:1000px)' href = 'css/desktop.css'>
	</head>
	
	<body>
		<div id = 'wrapper'>
			
			<div id = 'header'>
				<a href = 'index.html'><img src = 'imagens/logo.png' class = 'logo'></a>
				<div id = 'carrinho'>
					<img src = 'imagens/carrinho.png' alt = 'carrinho' class = 'carrinho'/>
					<p class = 'meucarrinho'><a href = '#'>MEU CARRINHO</a></p>
					<?php
						
						if(empty($_SESSION['logado'])){
							$_SESSION['logado'] = "";
							$_SESSION['username'] = "";
							$_SESSION['senha'] = "";
						}elseif($_SESSION['logado'] == 'admin'){
							$_SESSION['logado'] = 'admin';
						}elseif($_SESSION['logado'] == 'usuario'){
							$_SESSION['logado'] = 'usuario';
						}else{
							
						}
						if(empty($_SESSION['username'])){
							echo "<p class = 'login'><a href = 'login.php'>Login</a> | <a href = 'cadastro_1.php'>Cadastrar-se</a></p>";
						}else{
							$sql = "select * from usuario where username = "."'".$_SESSION['username']."'";
							$rs = mysql_query($sql, $con);
							
							if($rs){
								while($valor = mysql_fetch_array($rs)){
									echo "<p class = 'login'><a href = 'altera_perfil.php?cd_usuario=".$valor['cd_usuario']."'>".$_SESSION['username']."</a> | <a href = 'logout.php'>Sair</a></p>";
								}
							}else{
								echo mysql_error();
							}
						}
					?>
				</div>
			</div>