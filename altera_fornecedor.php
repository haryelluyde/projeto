<?php
include('template/topo.php');
if($con){
	$sql = "select * from fornecedor where cd_fornecedor = ".$_GET['cd_fornecedor'];
	$rs = mysql_query($sql, $con);
	
	if($rs){
		if($valor = mysql_fetch_array($rs)){
		?>
			<h2>Alterar fornecedor</h2>
			<?php include('template/menu_consulta.php');?>
			<form action = "update_fornecedor.php" method = 'POST'>
				Cd_fornecedor: <input type="text" name="cd_fornecedor" value = "<?php echo $valor['cd_fornecedor']?>" class = 'form-control' readonly><br>
				Nome: <input type="text" name="nm_fornecedor" value = "<?php echo $valor['nm_fornecedor']?>" class = 'form-control'><br>
				Rua: <input type="text" name="rua_fornecedor" value = "<?php echo $valor['rua_fornecedor']?>" class = 'form-control'><br>
				Número do estabelecimento: <input type="text" name="num_fornecedor" value = "<?php echo $valor['num_fornecedor']?>" class = 'form-control'><br>
				Bairro: <input type="text" name="bairro_fornecedor" value = "<?php echo $valor['bairro_fornecedor']?>" class = 'form-control'><br>
				Cidade: <input type="text" name="cidade_fornecedor" value = "<?php echo $valor['cidade_fornecedor']?>" class = 'form-control'><br>
				
				Estado:
				<select name = 'uf_fornecedor' class = 'form-control select' selected = "<?php echo $valor['uf_fornecedor']?>">
					<option value="" <?=($valor['uf_fornecedor'] == "")?'selected':''?>>Selecione</option>
					<option value="AC" <?=($valor['uf_fornecedor'] == "AC")?'selected':''?>>Acre</option>
					<option value="AL" <?=($valor['uf_fornecedor'] == "AL")?'selected':''?>>Alagoas</option>
					<option value="AP" <?=($valor['uf_fornecedor'] == "AP")?'selected':''?>>Amapá</option>
					<option value="AM" <?=($valor['uf_fornecedor'] == "AM")?'selected':''?>>Amazonas</option>
					<option value="BA" <?=($valor['uf_fornecedor'] == "BA")?'selected':''?>>Bahia</option>
					<option value="CE" <?=($valor['uf_fornecedor'] == "CE")?'selected':''?>>Ceará</option>
					<option value="DF" <?=($valor['uf_fornecedor'] == "DF")?'selected':''?>>Distrito Federal</option>
					<option value="ES" <?=($valor['uf_fornecedor'] == "ES")?'selected':''?>>Espirito Santo</option>
					<option value="GO" <?=($valor['uf_fornecedor'] == "GO")?'selected':''?>>Goiás</option>
					<option value="MA" <?=($valor['uf_fornecedor'] == "MA")?'selected':''?>>Maranhão</option>
					<option value="MS" <?=($valor['uf_fornecedor'] == "MS")?'selected':''?>>Mato Grosso do Sul</option>
					<option value="MT" <?=($valor['uf_fornecedor'] == "MT")?'selected':''?>>Mato Grosso</option>
					<option value="MG" <?=($valor['uf_fornecedor'] == "MG")?'selected':''?>>Minas Gerais</option>
					<option value="PA" <?=($valor['uf_fornecedor'] == "PA")?'selected':''?>>Pará</option>
					<option value="PB" <?=($valor['uf_fornecedor'] == "PB")?'selected':''?>>Paraíba</option>
					<option value="PR" <?=($valor['uf_fornecedor'] == "PR")?'selected':''?>>Paraná</option>
					<option value="PE" <?=($valor['uf_fornecedor'] == "PE")?'selected':''?>>Pernambuco</option>
					<option value="PI" <?=($valor['uf_fornecedor'] == "PI")?'selected':''?>>Piauí</option>
					<option value="RJ" <?=($valor['uf_fornecedor'] == "RJ")?'selected':''?>>Rio de Janeiro</option>
					<option value="RN" <?=($valor['uf_fornecedor'] == "RN")?'selected':''?>>Rio Grande do Norte</option>
					<option value="RS" <?=($valor['uf_fornecedor'] == "RS")?'selected':''?>>Rio Grande do Sul</option>
					<option value="RO" <?=($valor['uf_fornecedor'] == "RO")?'selected':''?>>Rondônia</option>
					<option value="RR" <?=($valor['uf_fornecedor'] == "RR")?'selected':''?>>Roraima</option>
					<option value="SC" <?=($valor['uf_fornecedor'] == "SC")?'selected':''?>>Santa Catarina</option>
					<option value="SP" <?=($valor['uf_fornecedor'] == "SP")?'selected':''?>>São Paulo</option>
					<option value="SE" <?=($valor['uf_fornecedor'] == "SE")?'selected':''?>>Sergipe</option>
					<option value="TO" <?=($valor['uf_fornecedor'] == "TO")?'selected':''?>>Tocantins</option>
				</select><br>
				
				Telefone: <input type="text" name="telefone_fornecedor"value = "<?php echo $valor['telefone_fornecedor']?>" class = 'form-control'><br>
				Hora de abertura: <input type="time" name="hr_abertura"value = "<?php echo $valor['hr_abertura']?>" class = 'form-control'><br>
				Hora de fechamento: <input type="time" name="hr_fechamento"value = "<?php echo $valor['hr_fechamento']?>" class = 'form-control'><br>
				
				<center><input type="submit" value="Atualizar" class = 'botao'></center>
			</form>
			<?php
		}
	}
}

include('template/rod.php');
?>