<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){?>
<center><h2>Consultar fornecedores</h2></center>
<?php
include('template/menu_consulta.php');
?>
<br><br>
<center>
<table border = '1' width='80%' cellspacing = '1' cellpadding = '5' style = "background:white">
	<tr>
		<th>Cd_fornecedor</th>
		<th>Nome</th>
		<th>UF</th>
		<th>Cidade</th>
		<th>Telefone</th>
		<th>Alterar</th>
		<th>Excluir</th>
	</tr>
	
	<?php
		$sql = "select * from fornecedor";
		$rs = mysql_query($sql, $con);
		
		while($valor = mysql_fetch_array($rs)){
	?>
		<tr>
			<td width = '150px'><?php echo $valor['cd_fornecedor']?></td>
			<td width = '150px'><?php echo $valor['nm_fornecedor'] ?></td>
			<td width = '150px'><?php echo $valor['uf_fornecedor']?></td>
			<td width = '150px'><?php echo $valor['cidade_fornecedor']?></td>
			<td width = '150px'><?php echo $valor['telefone_fornecedor']?></td>
			
			<?php
			echo "<td width = '150px'><a href = 'altera_fornecedor.php?cd_fornecedor=".$valor['cd_fornecedor']."'><button class = 'botoes'>Alterar</button></a></td>";
			echo "<td width = '150px'><a href = 'delete_fornecedor.php?cd_fornecedor=".$valor['cd_fornecedor']."'><button class = 'botoes'>Excluir</button></a></td>";
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