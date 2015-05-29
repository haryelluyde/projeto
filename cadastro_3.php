<?php
include('template/topo.php');

$nome = $_POST['nm_usuario'];
$data = $_POST['data_nasc'];
$cpf = $_POST['cpf'];

$uf_usuario = $_POST['uf_usuario'];
$num_usuario = $_POST['num_usuario'];
$rua_usuario = $_POST['rua_usuario'];
$bairro_usuario = $_POST['bairro_usuario'];
$cidade_usuario = $_POST['cidade_usuario'];
$cep_usuario = $_POST['cep_usuario'];
?>
<div id = 'dicas'>
	<div id = 'escurecer'>
		<h1 class = 'titulo'>Cadastre-se (3 de 3)</h1>
	</div>
</div>
<form name = "cadastrar" action = "confirma_cadastro.php" method = 'POST' enctype = 'multipart/form-data'>
	<input type = 'hidden' name = 'nm_usuario' value = '<?php echo $nome;?>'>
	<input type = 'hidden' name = 'data_nasc' value = '<?php echo $data;?>'>
	<input type = 'hidden' name = 'cpf' value = '<?php echo $cpf;?>'>
	
	<input type = 'hidden' name = 'uf_usuario' value = '<?php echo $uf_usuario;?>'>
	<input type = 'hidden' name = 'num_usuario' value = '<?php echo $num_usuario;?>'>
	<input type = 'hidden' name = 'rua_usuario' value = '<?php echo $rua_usuario;?>'>
	<input type = 'hidden' name = 'bairro_usuario' value = '<?php echo $bairro_usuario;?>'>
	<input type = 'hidden' name = 'cidade_usuario' value = '<?php echo $cidade_usuario;?>'>
	<input type = 'hidden' name = 'cep_usuario' value = '<?php echo $cep_usuario;?>'>
	
	Username:<input type = 'text' name = 'username' placeholder = 'Nome que quer ser chamado' class = 'form-control'><br>
	Foto:<input type = 'file' name = 'foto_usuario' id = 'foto_usuario' class = 'form-control'><br>
	Senha:<input type = 'password' name = 'senha' placeholder = 'Sua senha' class = 'form-control'><br>
	Confirmar senha:<input type = 'password' name = 'confirmar_senha' placeholder = 'Repita a senha' class = 'form-control'><br>
	<center><input type="submit" value="Enviar" class = 'botao'></center>
</form>
<?php
include('template/rod.php');
?>