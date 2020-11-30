<?php


	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$banco = 'telematica';


	$conexao = mysqli_connect($host, $user, $pass, $banco) or die (header('location: actions/conexao/erro.php'));

?>