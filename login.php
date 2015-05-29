<?php
include('template/topo.php');
?>
<div id = 'dicas'>
	<div id = 'escurecer'>
		<h1 class = 'titulo'>Acesse sua conta</h1>
	</div>
</div>
<form name = "login" action = "confirma_login.php" method = 'POST'>
	Username:<input type = 'text' name = 'username' placeholder = 'Username...' class = 'form-control'><br>
	Senha:<input type = 'password' name = 'senha' placeholder = 'Senha...' class = 'form-control'><br>
	<center><input type="submit" value="Entrar" class = 'botao'></center>
</form>
<?php
include('template/rod.php');
?>