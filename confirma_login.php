<?php
session_start();
include('template/conexao.php');
$username = $_POST['username'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);

$rs = mysql_query("select * from usuario where username = '$username' and senha = '$senha_crip'");

if(mysql_num_rows($rs) > 0){
	$_SESSION['username'] = $username;
	$_SESSION['senha'] = $senha;
	if($username == "Haryel" or $username == "haryel"){
		$_SESSION['logado'] = 'admin';
	}else{
		$_SESSION['logado'] = 'usuario';
	}
	header('location:home.php');
}else{
	unset($_SESSION['username']);
	unset($_SESSION['senha']);
	header('location:login.php');
}
mysql_close($con);
?>