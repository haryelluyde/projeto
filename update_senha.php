<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){
$cd_usuario = $_POST['cd_usuario'];

$senha_antiga1 = $_POST['senha_antiga'];
$senha_antiga2 = md5($_POST['senha']);

$nova_senha = $_POST['nova_senha'];
$confirmar_nova_senha = $_POST['confirmar_nova_senha'];

$erros = 0;
$erro = "";


if(empty($senha_antiga2)){
	$erros++;
	$erro .= "Deve-se digitar a senha antiga.<br><br>";
}
if($senha_antiga1 != $senha_antiga2){
	$erros++;
	$erro .= "A senha antiga não confere.<br><br>";
}
if($nova_senha != $confirmar_nova_senha){
	$erros++;
	$erro .= "Os campos nova senha e confimar senha devem conter os mesmos dados.<br><br>";
}

if($erros == 0){
	$nova_senha = md5($confirmar_nova_senha);
	$sql = "update usuario set
				senha = '$nova_senha'
			where cd_usuario = $cd_usuario";
	$rs = mysql_query($sql, $con);
	if($rs){
		echo "
		<div id = 'dicas'>
			<div id = 'escurecer'>
				<h1 class = 'titulo'>Senha alterada com sucesso!</h1>
			</div>
		</div>";
		header("location: login.php");
	}else{
		echo "Erro de inclusão: ".mysql_error()."<br>";
	}
}else{
	echo "
	<div id = 'dicas'>
		<div id = 'escurecer'>
			<h1 class = 'titulo'>Senha não alterada!</h1>
		</div>
	</div>
	<p class = 'paragrafo'>";
	echo $erro."<br><br>";
	echo "<center><a href = 'altera_senha.php' class = 'botoes'>Refazer alterações</a></center>";
}
?>

<?php
include('template/rod.php');}else{
	header('location:home.php');
}
?>