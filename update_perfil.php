<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){
$cd_usuario = $_POST['cd_usuario'];
$nm_usuario = $_POST['nm_usuario'];
$data_nasc = $_POST['data_nasc'];
$cpf = $_POST['cpf'];

$uf_usuario = $_POST['uf_usuario'];
$num_usuario = $_POST['num_usuario'];
$rua_usuario = $_POST['rua_usuario'];
$bairro_usuario = $_POST['bairro_usuario'];
$cidade_usuario = $_POST['cidade_usuario'];
$cep_usuario = $_POST['cep_usuario'];

$username = $_POST['username'];
$senha = $_POST['senha'];

$erros = 0;
$erro = "";

if($_FILES["foto_usuario"]["error"] == 0){
	$ext = substr($_FILES["foto_usuario"]["name"],
						strpos(strrev($_FILES["foto_usuario"]["name"]),".")*-1);
	
	$foto_usuario = md5(time().$_FILES["foto_usuario"]["name"]).".".$ext;
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'PNG' or $ext == 'JPG' or $ext == 'JPEG'){
		if($_POST['foto_velha'] != 'nouser.png'){
			unlink('imagens/usuarios/'.$_POST['foto_velha']);	
		}else{}
		move_uploaded_file($_FILES["foto_usuario"]["tmp_name"], "imagens/usuarios/".$foto_usuario);
	}else{
		$foto_usuario =  $_POST['foto_velha'];
	}
}else{
	$foto_usuario =  $_POST['foto_velha'];
}

if(empty($nm_usuario)){
	$erro = "O nome deve ser preenchido!<br><br>";
	$erros++;
}
if(strlen($data_nasc) != 10){
	$erro .= "Preencha sua idade corretamente.<br><br>";
	$erros++;
}
if(strlen($cpf) != 11){
	$erro .= "Preencha seu cpf corretamente.<br><br>";
	$erros++;
}
if(empty($uf_usuario)){
	$erro .= "Selecione seu estado.<br><br>";
	$erros++;
}
if(empty($num_usuario)){
	$erro .= "Digite o número da sua casa.<br><br>";
	$erros++;
}
if(empty($rua_usuario)){
	$erro .= "Digite sua rua.<br><br>";
	$erros++;
}
if(empty($bairro_usuario)){
	$erro .= "Digite seu bairro.<br><br>";
	$erros++;
}
if(empty($cidade_usuario)){
	$erro .= "Digite sua cidade.<br><br>";
	$erros++;
}
if(strlen($cep_usuario) != 8){
	$erro .= "CEP incorreto!<br><br>";
	$erros++;
}
if(empty($username)){
	$erro .= "Digite seu username.<br><br>";
	$erros++;
}

if($erros == 0){
	$sql = "update usuario set
				nm_usuario = '$nm_usuario',
				data_nasc = '$data_nasc',
				cpf = $cpf,
				rua_usuario = '$rua_usuario',
				num_usuario = $num_usuario,
				bairro_usuario = '$bairro_usuario',
				cidade_usuario = '$cidade_usuario',
				uf_usuario = '$uf_usuario',
				cep_usuario = $cep_usuario,
				username = '$username',
				senha = '$senha'".
				($foto_usuario == 'nouser.png'? "" : ", foto_usuario = '$foto_usuario'")."
			where cd_usuario = $cd_usuario";
	$rs = mysql_query($sql, $con);
	if($rs){
		echo "
		<div id = 'dicas'>
			<div id = 'escurecer'>
				<h1 class = 'titulo'>Usuário atualizado com sucesso!</h1>
			</div>
		</div>";
	
		echo "
		<p class = 'paragrafo'>
			<img src = 'imagens/usuarios/$foto_usuario' width = '200px'><br><br>
			Nome: $nm_usuario<br><br>
			Data de nascimento: $data_nasc<br><br>
			CPF: $cpf<br><br>
			Estado: $uf_usuario<br><br>
			Número da casa: $num_usuario<br><br>
			Rua: $rua_usuario<br><br>
			Bairro: $bairro_usuario<br><br>
			Cidade: $cidade_usuario<br><br>
			CEP: $cep_usuario<br><br>
			Username: $username<br><br>
		</p>";
	}else{
		echo "Erro de inclusão: ".mysql_error()."<br>";
	}
}else{
	echo "
	<div id = 'dicas'>
		<div id = 'escurecer'>
			<h1 class = 'titulo'>Usuário não atualizado!</h1>
		</div>
	</div>
	<p class = 'paragrafo'>";
	echo $erro."<br><br>";
	echo "<center><a href = 'altera_perfil.php?cd_usuario=".$cd_usuario."' class = 'botoes'>Refazer alterações</a></center>";
}
?>

<?php
include('template/rod.php');}else{
	header('location:home.php');
}
?>