<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){
$nm_fornecedor = $_POST['nm_fornecedor'];
$uf_fornecedor = $_POST['uf_fornecedor'];
$num_fornecedor = $_POST['num_fornecedor'];
$rua_fornecedor = $_POST['rua_fornecedor'];
$bairro_fornecedor = $_POST['bairro_fornecedor'];
$cidade_fornecedor = $_POST['cidade_fornecedor'];
$telefone_fornecedor = $_POST['telefone_fornecedor'];
$hr_abertura = $_POST['hr_abertura'];
$hr_fechamento = $_POST['hr_fechamento'];

$erros = 0;
$erro = "";

if(empty($nm_fornecedor)){
	$erro .= "Digite o nome do fornecedor.<br><br>";
	$erros++;
}
if(empty($hr_abertura)){
	$erro .= "Digite o horário em que abre o estabelecimento.<br><br>";
	$erros++;
}
if(empty($hr_fechamento)){
	$erro .= "Digite o horário em que fecha o estabelecimento.<br><br>";
	$erros++;
}
if(empty($telefone_fornecedor)){
	$erro .= "Digite seu telefone.<br><br>";
	$erros++;
}

if(empty($uf_fornecedor)){
	$erro .= "Selecione eu estado.<br><br>";
	$erros++;
}

if(empty($num_fornecedor)){
	$erro .= "Digite o número da sua casa.<br><br>";
	$erros++;
}
if(empty($rua_fornecedor)){
	$erro .= "Digite sua rua.<br><br>";
	$erros++;
}
if(empty($bairro_fornecedor)){
	$erro .= "Digite seu bairro.<br><br>";
	$erros++;
}
if(empty($cidade_fornecedor)){
	$erro .= "Digite sua cidade.<br><br>";
	$erros++;
}

if($erros == 0){
	$sql = "insert into fornecedor(nm_fornecedor, rua_fornecedor, num_fornecedor, bairro_fornecedor, cidade_fornecedor, uf_fornecedor, telefone_fornecedor, hr_abertura, hr_fechamento) values('$nm_fornecedor', '$rua_fornecedor', '$num_fornecedor', '$bairro_fornecedor', '$cidade_fornecedor', '$uf_fornecedor', '$telefone_fornecedor', '$hr_abertura', '$hr_fechamento')";
	$rs = mysql_query($sql, $con);
	if($rs){
		echo "
		<div id = 'dicas'>
			<div id = 'escurecer'>
				<h1 class = 'titulo'>Cadastrado realizado com sucesso!</h1>
			</div>
		</div>";
		echo "
		<p class = 'paragrafo'>
			Nome do fornecedor: $nm_fornecedor<br><br>
			Estado: $uf_fornecedor<br><br>
			Número: $num_fornecedor<br><br>
			Rua: $rua_fornecedor<br><br>
			Bairro: $bairro_fornecedor<br><br>
			Cidade: $cidade_fornecedor<br><br>
			Telefone: $telefone_fornecedor<br><br>
			Horário abertura: $hr_abertura<br><br>
			Horário fechamento: $hr_fechamento<br><br>
		</p>";
	}else{
		echo "Erro de inclusão: ".mysql_error()."<br>";
	}
}else{
	echo "
	<div id = 'dicas'>
		<div id = 'escurecer'>
			<h1 class = 'titulo'>Cadastrado não realizado!</h1>
		</div>
	</div>
	<p class = 'paragrafo'>";
	echo $erro."<br><br>";
	echo "<center><a href = 'fornecedor.php' class = 'botoes'>Refazer Cadastro</a></center>";
}
?>

<?php
include('template/rod.php');}else{
	header('location:home.php');
}
?>