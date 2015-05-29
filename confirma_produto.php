<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){
$nm_produto = $_POST['nm_produto'];
$tipo_produto = $_POST['tipo_produto'];
$descricao = $_POST['descricao'];
$fk_cd_fornecedor = $_POST['fornecedor'];
$preco_produto = $_POST['preco_produto'];

$erros = 0;
$erro = "";

if($_FILES['foto_produto']['error'] == 0){
	$ext = substr($_FILES['foto_produto']['name'],
				strpos(strrev($_FILES['foto_produto']['name']),".")*-1);
				
	$foto_produto = md5(time().$_FILES['foto_produto']['name']).".".$ext;
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'PNG' or $ext == 'JPG' or $ext == 'JPEG'){
		move_uploaded_file($_FILES['foto_produto']['tmp_name'], "imagens/produtos/".$foto_produto);	
	}else{
		$foto_produto =  'nouser.png';
	}
}else{
	$foto_produto =  'nouser.png';
}

if($tipo_produto == 'C' and $fk_cd_fornecedor != '1'){
	$erros++;
	$erro .= "Somente a ForLovers produz flores conservadas.<br><br>";
}
if($tipo_produto == ""){
	$erros++;
	$erro .= "Deve-se selecionar o tipo do produto.<br><br>";
}
if(empty($preco_produto)){
	$erros++;
	$erro .= "Deve-se inserir o preço do produto.<br><br>";
}
if(empty($fk_cd_fornecedor)){
	$erros++;
	$erro .= "Deve-se selecionar o fornecedor.<br><br>";
}
if(empty($nm_produto)){
	$erros++;
	$erro .= "Deve-se colocar o nome do produto.<br><br>";
}
if(empty($descricao)){
	$erros++;
	$erro .= "É necessário uma descrição do produto.<br><br>";
}

if($erros == 0){
	$sql = "insert into produto(nm_produto, descricao, tipo_produto, preco_produto, foto_produto, fk_cd_fornecedor) values('$nm_produto', '$descricao', '$tipo_produto', '$preco_produto', '$foto_produto', '$fk_cd_fornecedor')";
	$rs = mysql_query($sql, $con);
	if($rs){
		echo "
		<div id = 'dicas'>
			<div id = 'escurecer'>
				<h1 class = 'titulo'>Produto adicionado com sucesso!</h1>
			</div>
		</div>";
		
		$sql = "select * from fornecedor";
		$rs = mysql_query($sql, $con);
		$nm_fornecedor = "";
		while($sql = mysql_fetch_array($rs)){
		$nm_fornecedor = $sql["nm_fornecedor"];
		}
				
		echo "
		<p class = 'paragrafo'>
			<img src = 'imagens/produtos/$foto_produto' class = 'foto_produto'><br><br>
			Nome: $nm_produto<br><br>
			Tipo: $tipo_produto<br><br>
			Descrição: $descricao<br><br>
			Fornecedor: $nm_fornecedor<br><br>
		</p>";
	}else{
		echo "Erro de inclusão: ".mysql_error()."<br>";
	}
}else{
	echo "
	<div id = 'dicas'>
		<div id = 'escurecer'>
			<h1 class = 'titulo'>Produto não adicionado!</h1>
		</div>
	</div>
	<p class = 'paragrafo'>";
	echo $erro."<br><br>";
	echo "<center><a href = 'produto.php' class = 'botoes'>Refazer Cadastro</a></center>";
}
?>

<?php
include('template/rod.php');}else{
	header('location:home.php');
}
?>