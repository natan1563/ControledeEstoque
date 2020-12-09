
			<!-- Cadastro de Equipamentos -->
<form class="mt-5 w-75 p-3 bg-dark contain" action="#" method="POST">
<h1 class="text-light border-bottom border-light text-center">Cadastro de Equipamentos</h1>
	
	<input type="text" name="_nome" class="row form-control mt-4 mx-auto" placeholder="Nome: ex: Computador" maxlength="100">
	
	<input type="number" name="valor" class="row form-control mt-5 mx-auto" placeholder="Valor: ex: 5,50" maxlength="12" step=0.01>

	<input type="text" name="codigo" class="row form-control mt-5 mx-auto" placeholder="Codigo: BA123456789TR" maxlength="12">

	<input type="text" name="_quantidade" class="row form-control mt-5 mx-auto" placeholder="Quantidade: ex: 50" maxlength="11">

	<input value="Tipo de Equipamento" class="btn btn-secondary mt-1" disabled>
	<select name="tipo_equipamento" class="btn btn-light pb-2 mt-1">
		<?php require_once 'actions/equipamentos.php';?>
	</select>
	
	
	<button name="btn-cadastro" class="row mt-4 form-control btn-light mx-auto">Cadastrar</button>
</form>

<div class="mt-5 w-75 p-1 bg-light contain text-center"><p class="mt-3">Não encontrou o tipo de equipamento que você quer cadastrar? <a href="tipo_equipamento.php" class="text-decoration-none">Cadastre um você mesmo!!</a></p></div>