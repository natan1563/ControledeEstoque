<?php 

function Mensagens(){

	if(isset($_GET['att'])){

		if($_GET['att'] == 'true'){

			echo '<h1 class="mt-5 p-3 pl-3 bg-success contain text-light text-center" style="width: 56.2%;">Atualização Realizada com Sucesso !!</h1>';

		}else if($_GET['att'] == 'false'){
			echo '<h1 class="mt-5 p-3 bg-danger contain text-light text-center" style="width: 56.2%;">Erro ao Atualizar :/</h1>';
		}

	} else if(isset($_GET['tombo']) and $_GET['tombo'] == 'conflit'){

		echo '<h1 class="mt-5 p-3 contain text-light text-center" style="background-color: #FF4500; width: 56.2%;">Tombamento já cadastrado</h1>';
	
	}

}

function cadMsg(){

	 if(isset($_GET['cadastro'])){
	 	
		if($_GET['cadastro'] == 'true'){

			echo '<h1 class="mt-5 p-3 pl-3 bg-success contain text-light text-center" style="width: 56.2%;">Cadastro Realizado com Sucesso !!</h1>';

		}else if($_GET['cadastro'] == 'false'){

			echo '<h1 class="mt-5 p-3 bg-danger contain text-light text-center" style="width: 56.2%;">Erro ao Cadastrar :/</h1>';

		} else if($_GET['cadastro'] == 'empty'){

			echo '<h1 class="mt-5 p-3 contain text-light text-center" style="background-color: #FF4500; width: 56.2%;">Os campos não podem ficar vazios</h1>';

		}

	} else if(isset($_GET['tombo']) and $_GET['tombo'] == 'erro'){
		echo '<h1 class="mt-5 p-3 contain text-light text-center" style="background-color: #FF4500; width: 56.2%;">Tombo já Cadastrado</h1>';
	}
}


?>