<!DOCTYPE html>
<html>
<head>
	<title>Controle de Estoque</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		}

		#body{
			margin: 0 auto;
			/*border: 2px solid red;*/
		}

		.contain{
			margin: 30px auto;
			border-radius: 15px;
		}
			.menu{
				width: 22%;
			}
			.line{
				border-bottom: 2px solid #111;
				margin-left: 0; 
				margin-top: 10px;
			}
		.table-conf{
			background-image: linear-gradient(to left, #4F4B4B, #252323);
		}
		
		.form-camp{
			margin: 0 auto;
		}
	</style>
<body class="bg-secondary">

	<div id="body" class="w-75">

		<header class="mt-5 w-75 p-3 bg-dark contain">

			<div class="text-center mt-3">
			
			<p class="h1 mb-5 display-5 font-weight-bold text-light">Estoque da Telematica</p>
				
				<ul>
					<a class="text-decoration-none menu mr-5 btn btn-light" href="index.php">Itens</a>
					<a class="text-decoration-none menu mr-5 btn btn-light" href="cadastro.php">Cadastro</a>
					<a class="text-decoration-none menu mr-5 btn btn-light" href="atualizacao.php">Atualização</a>
				</ul>
			
			</div>
		
		</header>