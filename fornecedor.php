<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){?>
<div id = 'dicas'>
	<div id = 'escurecer'>
		<h1 class = 'titulo'>Cadastrar fornecedor</h1>
	</div>
</div>
<form name = "fornecedor" action = "confirma_fornecedor.php" method = 'POST' enctype = 'multipart/form-data'>
	Fornecedor: <input type = 'text' name = 'nm_fornecedor' placeholder = 'Nome fornecedor...' class = 'form-control'><br>
	Estado:
		<select name = 'uf_fornecedor' class = 'form-control select'>
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
	Número do estabelecimento:<input type = 'text' name = 'num_fornecedor' placeholder = 'Número' class = 'form-control'><br>
	Rua:<input type = 'text' name = 'rua_fornecedor' placeholder = 'Rua' class = 'form-control'><br>
	Bairro:<input type = 'text' name = 'bairro_fornecedor' placeholder = 'Bairro' class = 'form-control'><br>
	Cidade:<input type = 'text' name = 'cidade_fornecedor' placeholder = 'Cidade' class = 'form-control'><br>
	Telefone:<input type = 'text' name = 'telefone_fornecedor' class = 'form-control'><br>
	Horário de funcionamento:<br><br>
	Abertura:<input type = 'time' name = 'hr_abertura' placeholder = '00:00:00' class = 'form-control'><br>
	Fechamento:<input type = 'time' name = 'hr_fechamento' placeholder = '00:00:00' class = 'form-control'><br>
	<center><input type="submit" value="Cadastrar" class = 'botao'></center>
</form>
<?php
include('template/rod.php');}else{
	header('location:home.php');
}
?>