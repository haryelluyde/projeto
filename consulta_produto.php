<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){?>
<center><h2>Consultar produtos</h2></center>
<?php
include('template/menu_consulta.php');
?>
<br><br>
<center>
<table border = '1' width='80%' cellspacing = '1' cellpadding = '5' style = "background:white">
	<tr>
		<th>CD_produto</th>
		<th>Foto produto</th>
		<th>Nome</th>
		<th>Tipo</th>
		<th>Preço</th>
		<th>Decrição</th>
		<th>Alterar</th>
		<th>Excluir</th>
	</tr>
	
	<?php
		$sql = "select * from produto";
		$rs = mysql_query($sql, $con);
		
		while($valor = mysql_fetch_array($rs)){
		if(strlen($valor['descricao']) > 30){
			$descricao = substr($valor['descricao'], 0, 30)."...";
		}else{
			$descricao = $valor['descricao'];
		}
	?>
		<tr>
			<td width = '150px'><?php echo $valor['cd_produto']?></td>
			<td width = '150px'><img src = 'imagens/produtos/<?php echo $valor['foto_produto']?>' height = '100px'></td>
			<td width = '150px'><?php echo $valor['nm_produto']?></td>
			<td width = '150px'><?php echo $valor['tipo_produto']?></td>
			<td width = '150px'><?php echo $valor['preco_produto'] ?></td>
			<td width = '250px'><?php echo $descricao?></td>
			
			<?php
			echo "<td width = '150px'><a href = 'altera_produto.php?cd_produto=".$valor['cd_produto']."'><button class = 'botoes'>Alterar</button></a></td>";
			echo "<td width = '150px'><a href = 'delete_produto.php?cd_produto=".$valor['cd_produto']."'><button class = 'botoes'>Excluir</button></a></td>";
			?>

		</tr>
	<?php	
		}
	?>
</table>
</center>
<?php
include('template/rod.php');}else{
	header('location:home.php');
}
?>