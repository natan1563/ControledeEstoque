<?php 
require_once "actions/conexao/conexao.php";

if(isset($_POST['btn-cadastro'])){

	$nome = mysqli_escape_string($conexao, $_POST['_nome']);
	$valor = mysqli_escape_string($conexao, $_POST['valor']);
	$quanti = mysqli_escape_string($conexao, $_POST['_quantidade']);
	$codigo = mysqli_escape_string($conexao, $_POST['codigo']);
	$tipoEquip = mysqli_escape_string($conexao, $_POST['tipo_equipamento']);

	if(!empty($nome) and !empty($codigo) and !empty($quanti) and 
		!empty($valor) and !empty($tipoEquip)){
			
			$sql = "INSERT INTO estoque(nome_produto, quantidade, valor, codigo, id_produto) 
					VALUES 
				('$nome', $quanti, '$valor', '$codigo', $tipoEquip)";

			$query = mysqli_query($conexao, $sql);

			if($query){

				header('location: cadastro.php?cadastro=true');

			}else{

				header('location: cadastro.php?cadastro=false');

			}
			
	}else{
		header('location: ?cadastro=empty');
	}

}