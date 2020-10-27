
<form class="mt-5 w-75 p-3 bg-dark contain" action="#" method="POST">
<h1 class="text-light border-bottom border-light text-center">Cadastro de Equipamentos</h1>
	
	<input type="text" name="_nome" class="row form-control mt-4 mx-auto" placeholder="Nome: ex: Computador" maxlength="100">
	
	<input type="text" name="_tombo" class="row form-control mt-5 mx-auto" placeholder="Tombo: ex: 457689" maxlength="12">
	
	<input value="Orgão Pertencente" class="btn btn-secondary mt-1" disabled>
		<select name="orgao_tombo" class="btn btn-light pb-2 mt-1">
			<option>PMBA</option>
			<option>SEFAZ</option>
			<option>SSP</option>
		</select>
	
	<input type="text" name="_quantidade" class="row form-control mt-5 mx-auto" placeholder="Quantidade: ex: 50" maxlength="11">

	<input value="Tipo de Equipamento" class="btn btn-secondary mt-1" disabled>
	<select name="tipo_equipamento" class="btn btn-light pb-2 mt-1">
		<option value="1">Computador</option>
		<option value="2">Monitor</option>
		<option value="3">Teclado</option>
		<option value="4">Mouse</option>
		<option value="5">Modem</option>
		<option value="6">Ferramenta</option>
	</select>
	
	
	<button name="btn-cadastro" class="row mt-4 form-control btn-light mx-auto">Cadastrar</button>
