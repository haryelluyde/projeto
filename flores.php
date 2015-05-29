<?php
include('template/topo.php');
header('Content-Type: text/html; charset=utf-8');
?>
<div id = 'todos'>
<?php
	$sql = "select * from produto order by tipo_produto and nm_produto";
	$rs = mysql_query($sql, $con);
	while($valor = mysql_fetch_array($rs)){
	$nm_produto = $valor['nm_produto'];
	$foto_produto = $valor["foto_produto"];
	$fk_cd_fornecedor = $valor["fk_cd_fornecedor"];
	
	if(strlen($valor['descricao']) > 60){
		$descricao = substr($valor['descricao'], 0, 60)."...";
	}else{
		$descricao = $valor['descricao'];
	}
	echo "
		<div id = 'produtos'>
			<div id = 'produto'>
				<h4><center>$nm_produto</center></h4><br>
				<center><img src = 'imagens/produtos/$foto_produto' height = '160px'></center>
				<p><center>$descricao</center></p>
			</div>
			<center><input type = 'submit' value='+ Detalhes' class = 'botao'></center>
		</div>
	";
	$descricaoB = "";
	}
?>
</div>
<?php
include('template/rod.php');
?>