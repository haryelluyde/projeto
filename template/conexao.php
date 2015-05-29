<?php
	$con = mysql_connect('localhost','root','') or die("ERRO DE CONEXÃO.");
	$db = mysql_select_db('forlovers',$con) or die("ERRO DE BANCO.");
?>