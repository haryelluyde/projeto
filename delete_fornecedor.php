<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){
$cd_fornecedor = $_GET['cd_fornecedor'];

if($con){
	$sql = "delete from fornecedor where cd_fornecedor = $cd_fornecedor";
	$rs = mysql_query($sql, $con);
	
	if($rs){
		echo "<h2>Fornecedor excluído com sucesso!</h2>";
		include('template/menu_consulta.php');
	}else{
		echo "<h2>Erro de exclusão: ".mysql_error()."</h2>";
		include('template/menu_consulta.php');
	}
}else{
	echo "<h2>Erro de conexão: ".mysql_error()."</h2>";
	include('template/menu_consulta.php');
}

include('template/rod.php');}else{
	header('location:home.php');
}
?>