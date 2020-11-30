<?php 

require_once 'conexao/conexao.php';

 if(isset($_POST['btn-att'])){
 	$attNome = mysqli_escape_string($conexao, $_POST['_nome']);
	$attTombo = mysqli_escape_string($conexao, $_POST['_tombo']);
	$attQuanti = mysqli_escape_string($conexao, $_POST['_quantidade']);
	$attOrgao = mysqli_escape_string($conexao, $_POST['orgao_tombo']);
	$attTipoEquip = mysqli_escape_string($conexao, $_POST['tipo_equipamento']);
	$attId = $_POST['id'];


	if(!empty($attNome) and !empty($attTombo) and !empty($attQuanti) and !empty($attOrgao) and !empty($attTipoEquip)){

		$verifTombo = "SELECT id, tombo_produto FROM estoque WHERE tombo_produto = '".$attTombo."' and id != $attId";
		$query = mysqli_query($conexao, $verifTombo);

		if(mysqli_num_rows($query) >= 1){
			header('location: ../atualizacao.php?tombo=conflit');
		}else{
			
			$upd = "UPDATE estoque SET nome_produto = '".$attNome."', quantidade = $attQuanti, tombo_produto = '".$attTombo."', orgao = '".$attOrgao."', id_produto = $attTipoEquip WHERE id = $attId";

			if(mysqli_query($conexao, $upd)){
				mysqli_close($conexao);
				header('Location: ../atualizacao.php?att=true');
			}else{
				mysqli_close($conexao);
				header('Location: ../atualizacao.php?att=false');
			}
		}
	}
 }
