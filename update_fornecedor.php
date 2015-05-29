<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){
$cd_fornecedor = $_POST['cd_fornecedor'];
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
	$erro .= "Selecione seu estado.<br><br>";
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
	$sql = "update fornecedor set
				nm_fornecedor = '$nm_fornecedor',
				rua_fornecedor = '$rua_fornecedor',
				num_fornecedor = $num_fornecedor,
				bairro_fornecedor = '$bairro_fornecedor',
				cidade_fornecedor = '$cidade_fornecedor',
				uf_fornecedor = '$uf_fornecedor',
				telefone_fornecedor = $telefone_fornecedor,
				hr_abertura = '$hr_abertura',
				hr_fechamento = '$hr_fechamento'
			where cd_fornecedor = $cd_fornecedor
		";
	$rs = mysql_query($sql, $con);
	if($rs){
		echo "<h2>Fornecedor atualizado com sucesso!</h2>";
		include('template/menu_consulta.php');

	}else{
		echo "Erro de inclusão: ".mysql_error()."<br>";
		include('template/menu_consulta.php');
	}
}else{
	echo "<h2>Cadastrado não atualizado!</h2>";
	include('template/menu_consulta.php');

	echo "<br><br><p class = 'paragrafo'>".$erro."</p><br><br>";
}
?>

<?php
include('template/rod.php');}else{
	header('location:home.php');
}
?>