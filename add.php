<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    
	<title>Sistema de Reservas</title>
</head>
<body>
<br/>
<div class="container">
	<form method="POST">
		<p><a class="btn btn-primary btn-lg btn-sm" href="index.php">Inicio</a></p>
		<div class="row">
			<div class="form-group col-md-7">
				<label for="Nome">Nome</label>
				<input type="text" class="form-control" id="Nome" name="Nome"> </div>
			<div class="form-group col-md-3">
				<label for="Cpf">Cpf</label>
				<input type="text" class="form-control" id="Cpf" name="Cpf"> </div>
			<div class="form-group col-md-2">
				<label for="DataCadastro">DataCadastro</label>
				<input type="text" class="form-control" id="DataCadastro" name="DataCadastro"> </div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-7">
				<label for="Endereco">Endereco</label>
				<input type="text" class="form-control" id="Endereco" name="Endereco"> </div>
			<div class="form-group col-md-3">
				<label for="Telefone">Telefone</label>
				<input type="text" class="form-control" id="Telefone" name="Telefone"> </div>
			<div class="form-group col-md-2">
				<label for="DataAtualizado">DataAtualizado</label>
				<input type="text" class="form-control" id="DataAtualizado" name="DataAtualizado"> </div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-2">
				<label for="IdCliente">IdCliente</label>
				<input type="text" class="form-control" id="IdCliente" name="IdCliente"> </div>
			<div class="form-group col-md-6">
				<label for=""></label></div>
			<div class="form-group col-md-2">
				<label for="SituacaoCliente">SituacaoCliente</label>
				<input type="text" class="form-control" id="SituacaoCliente" name="SituacaoCliente"> </div>
			<div class="form-group col-md-2">
				<label for="EmDebito">EmDebito</label>
				<input type="text" class="form-control" id="EmDebito" name="EmDebito"> </div>
		</div>
	
		<input class="btn btn-primary btn-lg btn-sm" type="submit" name="save" value="Adicionar">
	</form>
</div>
<?php
	if(isset($_POST['save'])){
		//Abre o arquivo JSON
		$data = file_get_contents('clientes.json');
		$data = json_decode($data);
		//Adicona dados do POST
		$input = array(
			'IdCliente' => $_POST['IdCliente'],
			'Nome' => $_POST['Nome'],
			'Cpf' => $_POST['Cpf'],
			'Endereco' => $_POST['Endereco'],
			'Telefone' => $_POST['Telefone'],
			'SituacaoCliente' => $_POST['SituacaoCliente'],
			'DataCadastro' => $_POST['DataCadastro'],
			'DataAtualizado' => $_POST['DataAtualizado'],
			'EmDebito' => $_POST['EmDebito']
		);
		//Adiciona os dados ao array
		$data[] = $input;
		//Codifica para JSON novamente
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('clientes.json', $data);
		//redireciona para inicio
		header('location: index.php');
	}
?>
</body>
</html>