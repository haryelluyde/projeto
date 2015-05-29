<?php
include('template/topo.php');
?>
<div id = 'dicas'>
	<div id = 'escurecer'>
		<h1 class = 'titulo'>Cadastre-se (1 de 3)</h1>
	</div>
</div>
<form name = "cadastrar" action = "cadastro_2.php" method = 'POST' enctype = 'multipart/form-data'>
	Nome: <input type = 'text' name = 'nm_usuario' placeholder = 'Seu nome...' class = 'form-control'><br>
	Data de nascimento: <input type = 'date' name = 'data_nasc' placeholder = 'aaaa-mm-dd' class = 'form-control'><br>
	CPF: <input type = 'text' name = 'cpf' placeholder = 'xxxxxxxxxxx' class = 'form-control'><br>

	<center><input type="submit" value="Continuar" class = 'botao'></center>
</form>
<?php
include('template/rod.php');
?>