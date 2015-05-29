<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){?>
<center><h2>Consultar usuários</h2></center>
<?php
include('template/menu_consulta.php');
?>
<br><br>
<center>
<table border = '1' width='80%' cellspacing = '1' cellpadding = '5' style = "background:white">
	<tr>
		<th>CD_usuário</th>
		<th>Nome</th>
		<th>Foto</th>
		<th>UF</th>
		<th>CEP</th>
		<th>CPF</th>
		<th>Excluir</th>
	</tr>
	
	<?php
		$sql = "select * from usuario";
		$rs = mysql_query($sql, $con);
		
		while($valor = mysql_fetch_array($rs)){
	?>
		<tr>
			<td width = '150px'><?php echo $valor['cd_usuario']?></td>
			<td width = '150px'><?php echo $valor['nm_usuario'] ?></td>
			<td width = '150px'><img src = 'imagens/usuarios/<?php echo $valor['foto_usuario']?>' height = '100px'></td>
			<td width = '150px'><?php echo $valor['uf_usuario']?></td>
			<td width = '150px'><?php echo $valor['cep_usuario']?></td>
			<td width = '150px'><?php echo $valor['cpf']?></td>
			
			<?php
			echo "<td width = '150px'><a href = 'delete_usuario.php?cd_usuario=".$valor['cd_usuario']."'><button class = 'botoes'>Excluir</button></a></td>";
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