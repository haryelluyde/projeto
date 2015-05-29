<?php 
include "template/topo.php";

if($_SESSION['logado'] == 'admin'){
$cd_usuario = $_GET['cd_usuario'];

if ($con) {
	$sql = "select * from usuario where cd_usuario = ".$cd_usuario;
	$rs = mysql_query($sql, $con);
	if($rs){
		if($valor = mysql_fetch_array($rs)){
			$sql = "delete from usuario where cd_usuario =  $cd_usuario";
			$rs = mysql_query($sql, $con);
			
			if($rs){
				echo "<h2>Usuário excluído com sucesso.</h2>";
				if($valor['foto_usuario'] != "nouser.png"){
					unlink("imagens/usuarios/".$valor['foto_usuario']);
					include('template/menu_consulta.php');
				}else{
					echo "<p><center>Sem foto para excluir.</center></p>";
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