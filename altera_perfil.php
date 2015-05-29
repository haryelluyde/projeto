<?php
include('template/topo.php');

if($con){
	$sql = "select * from usuario where cd_usuario = ".$_GET['cd_usuario'];
	$rs = mysql_query($sql, $con);
	
	if($rs){
		if($valor = mysql_fetch_array($rs)){
		?>
			<center><h2>Alterar perfil</h2></center>
			<div id = 'alterar'>
				<center><p>Clique aqui para alterar sua senha:</p><br><br>
				<a href = 'altera_senha.php?cd_usuario=<?php echo $valor['cd_usuario']?>' class = 'alterar_senha'>Alterar Senha</a></center>
			</div>
			<?php if($_SESSION['username'] == $valor['username']){?>
			<form action = "update_perfil.php" method = 'POST' enctype = 'multipart/form-data'>
				<input type="hidden" name="cd_usuario" value = "<?php echo $valor['cd_usuario']?>">
				Nome do usuario: <input type="text" name="nm_usuario" value = "<?php echo $valor['nm_usuario']?>" class = 'form-control' readonly><br>
				Data de nascimento: <input type = 'date' name = 'data_nasc' value = "<?php echo $valor['data_nasc']?>" class = 'form-control' readonly><br>
				CPF: <input type = 'text' name = 'cpf' value = "<?php echo $valor['cpf']?>" class = 'form-control' readonly><br>
				
				Estado:
				<select name = 'uf_usuario' class = 'form-control select' selected = "<?php echo $valor['uf_usuario']?>">
					<option value="" <?=($valor['uf_usuario'] == "")?'selected':''?>>Selecione</option>
					<option value="AC" <?=($valor['uf_usuario'] == "AC")?'selected':''?>>Acre</option>
					<option value="AL" <?=($valor['uf_usuario'] == "AL")?'selected':''?>>Alagoas</option>
					<option value="AP" <?=($valor['uf_usuario'] == "AP")?'selected':''?>>Amapá</option>
					<option value="AM" <?=($valor['uf_usuario'] == "AM")?'selected':''?>>Amazonas</option>
					<option value="BA" <?=($valor['uf_usuario'] == "BA")?'selected':''?>>Bahia</option>
					<option value="CE" <?=($valor['uf_usuario'] == "CE")?'selected':''?>>Ceará</option>
					<option value="DF" <?=($valor['uf_usuario'] == "DF")?'selected':''?>>Distrito Federal</option>
					<option value="ES" <?=($valor['uf_usuario'] == "ES")?'selected':''?>>Espirito Santo</option>
					<option value="GO" <?=($valor['uf_usuario'] == "GO")?'selected':''?>>Goiás</option>
					<option value="MA" <?=($valor['uf_usuario'] == "MA")?'selected':''?>>Maranhão</option>
					<option value="MS" <?=($valor['uf_usuario'] == "MS")?'selected':''?>>Mato Grosso do Sul</option>
					<option value="MT" <?=($valor['uf_usuario'] == "MT")?'selected':''?>>Mato Grosso</option>
					<option value="MG" <?=($valor['uf_usuario'] == "MG")?'selected':''?>>Minas Gerais</option>
					<option value="PA" <?=($valor['uf_usuario'] == "PA")?'selected':''?>>Pará</option>
					<option value="PB" <?=($valor['uf_usuario'] == "PB")?'selected':''?>>Paraíba</option>
					<option value="PR" <?=($valor['uf_usuario'] == "PR")?'selected':''?>>Paraná</option>
					<option value="PE" <?=($valor['uf_usuario'] == "PE")?'selected':''?>>Pernambuco</option>
					<option value="PI" <?=($valor['uf_usuario'] == "PI")?'selected':''?>>Piauí</option>
					<option value="RJ" <?=($valor['uf_usuario'] == "RJ")?'selected':''?>>Rio de Janeiro</option>
					<option value="RN" <?=($valor['uf_usuario'] == "RN")?'selected':''?>>Rio Grande do Norte</option>
					<option value="RS" <?=($valor['uf_usuario'] == "RS")?'selected':''?>>Rio Grande do Sul</option>
					<option value="RO" <?=($valor['uf_usuario'] == "RO")?'selected':''?>>Rondônia</option>
					<option value="RR" <?=($valor['uf_usuario'] == "RR")?'selected':''?>>Roraima</option>
					<option value="SC" <?=($valor['uf_usuario'] == "SC")?'selected':''?>>Santa Catarina</option>
					<option value="SP" <?=($valor['uf_usuario'] == "SP")?'selected':''?>>São Paulo</option>
					<option value="SE" <?=($valor['uf_usuario'] == "SE")?'selected':''?>>Sergipe</option>
					<option value="TO" <?=($valor['uf_usuario'] == "TO")?'selected':''?>>Tocantins</option>
				</select><br>
				Número da casa:<input type = 'text' name = 'num_usuario' value = "<?php echo $valor['num_usuario']?>" class = 'form-control'><br>
				Rua:<input type = 'text' name = 'rua_usuario' value = "<?php echo $valor['rua_usuario']?>" class = 'form-control'><br>
				Bairro:<input type = 'text' name = 'bairro_usuario' value = "<?php echo $valor['bairro_usuario']?>" class = 'form-control'><br>
				Cidade:<input type = 'text' name = 'cidade_usuario' value = "<?php echo $valor['cidade_usuario']?>" class = 'form-control'><br>
				CEP:<input type = 'text' name = 'cep_usuario' value = "<?php echo $valor['cep_usuario']?>" class = 'form-control'><br>
			
				Username:<input type = 'text' name = 'username' value = "<?php echo $valor['username']?>" class = 'form-control'><br>
				
				<img src = 'imagens/usuarios/<?php echo $valor['foto_usuario']?>' width = '400px'>
				Alterar foto: <input type = 'file' name = 'foto_usuario' id = 'foto_usuario' class = 'form-control'>
				<input type = 'hidden' name = 'foto_velha' value = '<?php echo $valor['foto_usuario']?>'>
				<input type = 'hidden' name = 'senha' value = '<?php echo $valor['senha']?>'>
				
				<center><input type="submit" value="Atualizar" class = 'botao'></center>
			</form>
			<?php
			}else{
				header('location:home.php');
			}
		}
	}
}?>
<?php
include('template/rod.php');
?>