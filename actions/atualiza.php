<?php 

require_once 'conexao/conexao.php';
echo '<pre>';
var_dump($_POST);
echo '</pre>';

 if(isset($_POST['btn-att'])){
	
	$nome = mysqli_escape_string($conexao, $_POST['_nome']);
	
	$valor = mysqli_escape_string($conexao, $_POST['valor']);
	
	$quanti = mysqli_escape_string($conexao, $_POST['_quantidade']);
	
	$codigo = mysqli_escape_string($conexao, $_POST['codigo']);
	
	$tipoEquip = mysqli_escape_string($conexao, $_POST['tipo_equipamento']);
	
	$attId = $_POST['id'];

	if(!empty($nome) and !empty($codigo) and !empty($quanti) and 
		!empty($valor) and !empty($tipoEquip)){

					
			$upd = "UPDATE estoque SET nome_produto = '".$nome."', quantidade = $quanti, valor = $valor, codigo = '".$codigo."', id_produto = $tipoEquip WHERE id = $attId";
			if(mysqli_query($conexao, $upd)){
				mysqli_close($conexao);
				header('Location: ../atualizacao.php?att=true');
			}else{
				mysqli_close($conexao);
				header('Location: ../atualizacao.php?att=false');
			}
		
	}
 }
