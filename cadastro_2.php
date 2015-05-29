<?php
include('template/topo.php');

$nome = $_POST['nm_usuario'];
$data = $_POST['data_nasc'];
$cpf = $_POST['cpf'];
?>
<div id = 'dicas'>
	<div id = 'escurecer'>
		<h1 class = 'titulo'>Cadastre-se (2 de 3)</h1>
	</div>
</div>
<form name = "cadastrar" action = "cadastro_3.php" method = 'POST' enctype = 'multipart/form-data'>
	<input type = 'hidden' name = 'nm_usuario' value = '<?php echo $nome;?>'>
	<input type = 'hidden' name = 'data_nasc' value = '<?php echo $data;?>'>
	<input type = 'hidden' name = 'cpf' value = '<?php echo $cpf;?>'>
	
	Estado:
		<select name = 'uf_usuario' class = 'form-control select'>
			<option value="">Selecione</option>
			<option value="AC">Acre</option>
			<option value="AL">Alagoas</option>
			<option value="AP">Amapá</option>
			<option value="AM">Amazonas</option>
			<option value="BA">Bahia</option>
			<option value="CE">Ceará</option>
			<option value="DF">Distrito Federal</option>
			<option value="ES">Espirito Santo</option>
			<option value="GO">Goiás</option>
			<option value="MA">Maranhão</option>
			<option value="MS">Mato Grosso do Sul</option>
			<option value="MT">Mato Grosso</option>
			<option value="MG">Minas Gerais</option>
			<option value="PA">Pará</option>
			<option value="PB">Paraíba</option>
			<option value="PR">Paraná</option>
			<option value="PE">Pernambuco</option>
			<option value="PI">Piauí</option>
			<option value="RJ">Rio de Janeiro</option>
			<option value="RN">Rio Grande do Norte</option>
			<option value="RS">Rio Grande do Sul</option>
			<option value="RO">Rondônia</option>
			<option value="RR">Roraima</option>
			<option value="SC">Santa Catarina</option>
			<option value="SP">São Paulo</option>
			<option value="SE">Sergipe</option>
			<option value="TO">Tocantins</option>
		</select><br>
	Número da casa:<input type = 'text' name = 'num_usuario' placeholder = 'Número' class = 'form-control'><br>
	Rua:<input type = 'text' name = 'rua_usuario' placeholder = 'Rua' class = 'form-control'><br>
	Bairro:<input type = 'text' name = 'bairro_usuario' placeholder = 'Bairro' class = 'form-control'><br>
	Cidade:<input type = 'text' name = 'cidade_usuario' placeholder = 'Cidade' class = 'form-control'><br>
	CEP:<input type = 'text' name = 'cep_usuario' placeholder = 'xxxxxxxx' class = 'form-control'><br>
	
	<center><input type="submit" value="Continuar" class = 'botao'></center>
</form>
<?php
include('template/rod.php');
?>