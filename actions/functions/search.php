<?php 

function search() {
	require_once "actions/conexao/conexao.php"; 

	if(isset($_GET['q']) and !empty($_GET['q'])){
		
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
	
<?php } } }
?>