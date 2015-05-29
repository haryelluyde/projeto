<?php 
include "template/topo.php";

if($_SESSION['logado'] == 'admin'){
$cd_produto = $_GET['cd_produto'];

if ($con) {
	$sql = "select * from produto where cd_produto = ".$cd_produto;
	$rs = mysql_query($sql, $con);
	if($rs){
		if($valor = mysql_fetch_array($rs)){
			$sql = "delete from produto where cd_produto =  $cd_produto";
			$rs = mysql_query($sql, $con);
			
			if($rs){
				echo "<h2>Produto excluído com sucesso.</h2>";
				if($valor['foto_produto'] != "nouser.png"){
					unlink("imagens/produtos/".$valor['foto_produto']);
					include('template/menu_consulta.php');
				}else{
					echo "<p><center>Sem imagem para excluir.</center></p>";
					include('template/menu_consulta.php');
				}
			}else{
				echo "Erro de exclusão: ".mysql_error();
			}
		}
	}
}else{
	echo "Erro de conexão: ".mysql_error();
}

include "template/rod.php";}else{
	header('location:home.php');
}
?>