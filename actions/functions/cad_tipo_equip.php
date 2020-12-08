<?php 
require_once "../conexao/conexao.php";
if(isset($_POST['btn-cadastro-tipo'])){

	$tipoEquip = mysqli_escape_string($conexao, $_POST['_equipamento']);

	if(!empty($tipoEquip)){
		
		$equipt = "SELECT nome_equipamento FROM equipamentos WHERE nome_equipamento = '$tipoEquip'";

		$equipQuery = mysqli_query($conexao, $equipt);
		
		if(mysqli_num_rows($equipQuery) >= 1){
	
			header('location: ../../tipo_equipamento.php?cadastro=exist');
	
		}else{

			$sql = "INSERT INTO equipamentos(nome_equipamento) VALUES ('$tipoEquip')";
	
			$query = mysqli_query($conexao, $sql);

			if($query){
	
				header('location: ../../tipo_equipamento.php?cadastro=true');

			}else{
	
				header('location: ../../tipo_equipamento.php?cadastro=false');

			}
		}	
			
	}else{
		header('location: ../../tipo_equipamento.php?cadastro=empty');
	}

}