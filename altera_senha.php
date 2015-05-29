<?php
include('template/topo.php');

if($con){
	$sql = "select * from usuario where cd_usuario = ".$_GET['cd_usuario'];
	$rs = mysql_query($sql, $con);
	
	if($rs){
		if($valor = mysql_fetch_array($rs)){
		?>
			<center><h2>Alterar senha</h2></center>
			<div id = 'alterar'>
				<center><p>Clique aqui para alterar seu perfil:</p><br><br>
				<a href = 'altera_perfil.php?cd_usuario=<?php echo $valor['cd_usuario']?>' class = 'alterar_senha'>Alterar Perfil</a></center>
			</div>
			<form action = "update_senha.php" method = 'POST' enctype = 'multipart/form-data'>
				<input type = 'hidden' name = 'cd_usuario' value = "<?php echo $valor['cd_usuario']?>"><br>
				
				<input type = 'hidden' name = 'senha_antiga' value = "<?php echo $valor['senha']?>"><br>
				Senha antiga:<input type = 'password' name = 'senha' class = 'form-control'><br>
				Nova senha:<input type = 'password' name = 'nova_senha' class = 'form-control'><br>
				Confirmar nova senha:<input type = 'password' name = 'confirmar_nova_senha' class = 'form-control'><br>
				
				<center><input type="submit" value="Alterar" class = 'botao'></center>
			</form>
			<?php
		}
	}
}?>
<?php
include('template/rod.php');
?>