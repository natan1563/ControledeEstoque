<?php 
	
	
 function page($page){
 	require_once "actions/conexao/conexao.php"; ?>
 
 	<!-- paginação -->
<?php
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


	if($page == 'index'){ 
		//Produtos - Itens index
		while ($dados = mysqli_fetch_array($limite)){ ?> 

			<div class="mt-3 w-75 p-3 contain table-conf">
				<p class="line text-white">Produto: <span style="color: #B0E0E6;"> <?= $dados["nome_produto"];?> </span></p>	
				<p class="line text-white">Tombamento: <span style="color: #B0E0E6;"> <?= 'R$ '.number_format($dados["valor"], 2, ',', '.');?> </span></p>
				<p class="line text-white">Rastreio: <span style="color: #B0E0E6;"> <?= $dados["codigo"];?> </span></p>	
				<p class="line text-white">Quantidade: <span style="color: #B0E0E6;"> <?= $dados["quantidade"];?> </span></p>	
			</div>

		 <?php } 
		
	} if($page == 'att'){
		 		//Atualização

			$limite = mysqli_query($conexao, 
							"SELECT 
		 				 estoque.id,
		 				 estoque.nome_produto,
		 				 estoque.quantidade, 
		 				 estoque.valor, 
		 				 estoque.codigo,
		 				 estoque.id_produto,
		 				 equipamentos.nome_equipamento 
		 				 FROM estoque AS estoque 
		 				 LEFT JOIN equipamentos AS equipamentos ON
		 				 estoque.id_produto = 
		 				 equipamentos.id_equipamento 
		 				 ORDER BY estoque.id DESC LIMIT 
		 				 $init, $total_registros");
		 
			while ($dados = mysqli_fetch_array($limite)) {  ?>
				
				<form class="mt-5 w-75 p-3 table-conf contain" action="actions/atualiza.php" method="POST">
					
					<!--Produto -->
					<input type="text" name="_nome" class="row form-control mt-4 mx-auto" value="<?=$dados["nome_produto"];?>">
					
					<!-- Tombo -->
					<input type="number" name="valor" class="row form-control mt-5 mx-auto" placeholder="Valor: ex: 5,50" maxlength="12" value="<?=number_format($dados["valor"], 2, '.', ',');?>" step=0.01>
					
					<!-- Codigo -->
					<input type="text" name="codigo" class="row form-control mt-5 mx-auto" placeholder="Codigo: BA123456789TR" value="<?=$dados["codigo"];?>"maxlength="12">
					
					<!-- Quantidade -->
					<input type="text" name="_quantidade" class="row form-control mt-5 mx-auto" value="<?=$dados["quantidade"]; ?>">

					<!-- Disabled -->
					<input value="Tipo de Equipamento" class="btn btn-secondary mt-1" disabled>
					
					<!-- Tipo -->
					<select name="tipo_equipamento" class="btn btn-light pb-2 mt-1">
						<option value="<?=$dados["id_produto"];?>" fixed>Atual <?=$dados["nome_equipamento"];?></option>
						<?php require_once 'actions/equipamentos.php';?>
					</select>
					
					<!-- Id -->
					<input type="hidden" name="id" value="<?=$dados["id"]; ?>">

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