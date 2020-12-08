<?php 
require_once "actions/conexao/conexao.php";

if(isset($_POST['btn-cadastro'])){

	$nome = mysqli_escape_string($conexao, $_POST['_nome']);
	$tombo = mysqli_escape_string($conexao, $_POST['_tombo']);
	$quanti = mysqli_escape_string($conexao, $_POST['_quantidade']);
	$orgao = mysqli_escape_string($conexao, $_POST['orgao_tombo']);
	$tipoEquip = mysqli_escape_string($conexao, $_POST['tipo_equipamento']);

	if(!empty($nome) and !empty($tombo) and !empty($quanti) and !empty($orgao) and !empty($tipoEquip)){
		
		$tomboSql = "SELECT tombo_produto FROM estoque WHERE tombo_produto = '".$tombo."'";
		$tomboQuery = mysqli_query($conexao, $tomboSql);
		
		if(mysqli_num_rows($tomboQuery) >= 1){
			header('location: cadastro.php?tombo=erro');
		}else{
			$sql = "INSERT INTO estoque(nome_produto, quantidade, tombo_produto, orgao, id_produto) VALUES ('$nome', $quanti, '$tombo', '$orgao', $tipoEquip)";
			$query = mysqli_query($conexao, $sql);

			if($query){
				header('location: cadastro.php?cadastro=true');

			}else{

				header('location: cadastro.php?cadastro=false');

			}
		}	
			
	}else{
		header('location: ?cadastro=empty');
	}

}