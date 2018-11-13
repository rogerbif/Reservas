<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    
	<title>Sistema de Reservas - Seleção de Quartos</title>
</head>
<body>
<br/>
<div class="container">
	<form method="POST">
		<p><a class="btn btn-primary btn-lg btn-sm" href="index.php">Inicio</a></p>
		<div class="row">
			<div class="form-group col-md-7">
				<label for="IdQuarto">IdQuarto</label>
				<input type="text" class="form-control" id="IdQuarto" name="IdQuarto"> </div>
			<div class="form-group col-md-7">
				<label for="Numero">Numero</label>
				<input type="text" class="form-control" id="Numero" name="Numero"> </div>
			<div class="form-group col-md-3">
				<label for="Situacao">Situação</label>
				<input type="text" class="form-control" id="Situacao" name="Situacao"> </div>
			<div class="form-group col-md-2">
				<label for="ValorDiaria">Valor Diaria</label>
				<input type="text" class="form-control" id="ValorDiaria" name="ValorDiaria"> </div>
		</div>
		<input class="btn btn-primary btn-lg btn-sm" type="submit" name="save" value="Adicionar">
	</form>
</div>
<?php
	if(isset($_POST['save'])){
		//Abre o arquivo JSON
		$data = file_get_contents('quartos.json');
		$data = json_decode($data);
		//Adicona dados do POST
		$input = array(
			'IdQuarto' => $_POST['IdQuarto'],
			'Numero' => $_POST['Numero'],
			'Situacao' => $_POST['Situacao'],
			'ValorDiaria' => $_POST['ValorDiaria'],
		);
		//Adiciona os dados ao array
		$data[] = $input;
		//Codifica para JSON novamente
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('quartos.json', $data);
		//redireciona para inicio
		header('location: index.php');
	}
?>
</body>
</html>