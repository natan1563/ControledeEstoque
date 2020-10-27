<?php 
	
	
 function page($page){
 	require_once "actions/conexao/conexao.php";

	$query = "SELECT * FROM estoque";
	$total_registros = 5;

	if(!isset($_GET['pagina']) or $_GET['pagina'] == 1){
		$numPage = 1;
		$init = $numPage -1;
		$pagina = 1;
	}else{

		$pagina = $_GET['pagina'];
		$numPage = $pagina;
		$num_registros = ($total_registros * $_GET['pagina']);
		$init = $num_registros / 2;
		
		if(!is_int($init)){
			$count = mysqli_num_rows(mysqli_query($conexao, $query));
			$init = $count - $count % 10;
		}
		
	}

	$limite = mysqli_query($conexao, "SELECT * FROM estoque ORDER BY id DESC LIMIT $init, $total_registros");
	
	$todos = mysqli_query($conexao, "$query");

	$count = mysqli_num_rows($todos);

	$totalPag = ceil($count / $total_registros);


	while ($dados = mysqli_fetch_array($limite)){ 
		if($page == 'index'){ ?>

			<div class="mt-3 w-75 p-3 contain table-conf">
				<p class="line text-white">Produto: <span style="color: #B0E0E6;"> <?= $dados["nome_produto"];?> </span></p>	
				<p class="line text-white">Tombamento: <span style="color: #B0E0E6;"> <?= $dados["tombo_produto"];?> </span></p>
				<p class="line text-white">Orgão: <span style="color: #B0E0E6;"> <?= $dados["orgao"];?> </span></p>	
				<p class="line text-white">Quantidade: <span style="color: #B0E0E6;"> <?= $dados["quantidade"];?> </span></p>	
			</div>

		 <? }else if($page == 'att'){

				$produto = $dados[5];

				switch ($produto) {
					case 1:
						$produto = 'Computador';
						break;
					case 2:
						$produto = 'Monitor';
						break;
					case 3:
						$produto = 'Teclado';
						break;
					case 4:
						$produto = 'Mouse';
						break;
					case 5:
						$produto = 'Modem';
						break;
					case 6:
						$produto = 'Ferramenta';
						break;				
				} ?>


			
				<form class="mt-5 w-75 p-3 table-conf contain" action="actions/atualiza.php" method="POST">
					
					<!--Produto -->
					<input type="text" name="_nome" class="row form-control mt-4 mx-auto" value="<?=$dados[1];?>">
					
					<!-- Tombo -->
					<input type="text" name="_tombo" class="row form-control mt-5 mx-auto" value="<?=$dados[3] ?>">
					
					<!-- Orgão -->
					<input value="Orgão Pertencente" class="btn btn-secondary mt-1" disabled>
						<select name="orgao_tombo" class="btn btn-light pb-2 mt-1">
							<option disabled>Atual: <?=$dados[4] ?></option>
							<option>PMBA</option>
							<option>SEFAZ</option>
							<option>SSP</option>
						</select>
					
					<!-- Quantidade -->
					<input type="text" name="_quantidade" class="row form-control mt-5 mx-auto" value="<?=$dados[2]; ?>">

					<!-- Disabled -->
					<input value="Tipo de Equipamento" class="btn btn-secondary mt-1" disabled>
					
					<!-- Tipo -->
					<select name="tipo_equipamento" class="btn btn-light pb-2 mt-1">
						<option disabled>Atual: <?=$produto?></option>
						<option value="1">Computador</option>
						<option value="2">Monitor</option>
						<option value="3">Teclado</option>
						<option value="4">Mouse</option>
						<option value="5">Modem</option>
						<option value="6">Ferramenta</option>
					</select>
					
					<!-- Id -->
					<input type="hidden" name="id" value="<?=$dados[0]; ?>">

					<button name="btn-att" class="row mt-4 form-control btn-light mx-auto">Atualizar</button>

				</form>

	<?php }
		
	}

	$anterior = $numPage - 1;
	$proximo = $numPage + 1;

	echo "<div class='row d-flex justify-content-center'>";
	if ($numPage > 1) {
		echo " <a href='?pagina=$anterior' class='btn btn-light mb-4 p-2 w-25' style='margin: 30px ;'>Anterior</a> ";
	}

	
	if ($numPage < $totalPag) {
		echo " <a href='?pagina=$proximo' class='btn btn-light mb-4 p-2 w-25' style='margin: 30px ;'>Próxima</a>";
	}
	echo "</div>";
	echo '<span class="row d-flex justify-content-center mb-2 font-weight-bold">Página '.$pagina.' de '.$totalPag.' </span>';

 }
?>