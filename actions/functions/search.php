<?php 

function search($page) {
	require_once "actions/conexao/conexao.php"; 

	if(isset($_GET['q']) and !empty($_GET['q']) and $page == 'index'){
		
		$num = str_replace('.', '', $_GET['q']);
		$num = str_replace(',', '.', $num);

		$sql = "SELECT nome_produto, valor, codigo, quantidade FROM estoque WHERE 
		nome_produto 
		LIKE '%".$_GET['q']."%'"." OR valor LIKE '%".$num."%'"."OR codigo LIKE '%".$_GET['q']."%'";

		
		$query = mysqli_query($conexao, $sql);
		while ($dados = mysqli_fetch_array($query)) { ?>
	
		<div class="mt-3 w-75 p-3 contain table-conf">
			<p class="line text-white">Produto: <span style="color: #B0E0E6;"> <?= $dados["nome_produto"];?> </span></p>	
			<p class="line text-white">Tombamento: <span style="color: #B0E0E6;"> <?= 'R$ '.number_format($dados["valor"], 2, ',', '.');?> </span></p>
			<p class="line text-white">Rastreio: <span style="color: #B0E0E6;"> <?= $dados["codigo"];?> </span></p>	
			<p class="line text-white">Quantidade: <span style="color: #B0E0E6;"> <?= $dados["quantidade"];?> </span></p>	
		</div>
	
<?php 	} 
	} else if(isset($_GET['q']) and !empty($_GET['q']) and $page == 'att'){

		$num = str_replace('.', '', $_GET['q']);
		$num = str_replace(',', '.', $num);

		$limite = mysqli_query($conexao, 
							"SELECT 
		 				 estoque.id, estoque.nome_produto, estoque.quantidade, 
		 				 estoque.valor, 
		 				 estoque.codigo,
		 				 estoque.id_produto,
		 				 equipamentos.nome_equipamento 
		 				 FROM estoque AS estoque 
		 				 LEFT JOIN equipamentos AS equipamentos ON
		 				 estoque.id_produto = 
		 				 equipamentos.id_equipamento 
		 				 WHERE estoque.nome_produto LIKE '%".$_GET['q']."%'"." OR valor LIKE '%".$num."%'"."OR codigo LIKE '%".$_GET['q']."%'"." ORDER BY estoque.id");

			while ($dados = mysqli_fetch_array($limite)) {  ?>
				
				<form class="mt-5 w-75 p-3 table-conf contain" action="actions/atualiza.php" method="POST">
					
					<!--Produto -->
					<input type="text" name="_nome" class="row form-control mt-4 mx-auto" value="<?=$dados["nome_produto"];?>">
					
					<!-- Tombo -->
					<input type="number" name="valor" class="row form-control mt-5 mx-auto" placeholder="Valor: ex: 5,50" maxlength="12" value="<?=$dados["valor"];?>" step=0.01>
					
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
}
?>