<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){?>
<div id = 'dicas'>
	<div id = 'escurecer'>
		<h1 class = 'titulo'>Inserção de produtos</h1>
	</div>
</div>
<form name = "produto" action = "confirma_produto.php" method = 'POST' enctype = 'multipart/form-data'>
	Nome do produto: <input type="text" name="nm_produto" maxlength = "50" class = 'form-control'><br>
	Tipo da flor: 
	<select name = 'tipo_produto' class = 'form-control select'>
		<option value="">Selecione</option>
		<option value = 'N'>Normal</option>
		<option value = 'C'>Conservada</option>
	</select>
	<br>
	Fornecedor: 
	<select name = 'fornecedor' class = 'form-control select'>
			<option value="">Selecione</option>
			<?php
				$sql = "select * from fornecedor";
				$rs = mysql_query($sql);
				while($valor = mysql_fetch_array($rs)){
				$cd_fornecedor = $valor['cd_fornecedor'];
				echo "<option value='$cd_fornecedor'>".$valor['nm_fornecedor']."</option>";
				}
			?>
		</select><br>
	Descrição:<textarea type='text' name='descricao' class = 'form-control' rows = '4'></textarea><br>
	Preço:<input type='text' name='preco_produto' class = 'form-control'><br>
	Foto:<input type = 'file' name = 'foto_produto' class = 'form-control'><br><br>
	<center><input type="submit" value="Enviar" class = 'botao'></center>
</form>
<?php
include('template/rod.php');}else{
	header('location:home.php');
}
?>