<?php
	//pega o indice
	$index = $_GET['index'];
	//Lê os dados do JSON
	$data = file_get_contents('clientes.json');
	$data_array = json_decode($data);
	//vincula os dados ao indice
	$row = $data_array[$index];
?>
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
<br />
<div class="container">
	<form method="POST">
		<p><a class="btn btn-primary btn-lg btn-sm" href="index.php">Inicio</a></p>
		<div class="row">
			<div class="form-group col-md-7">
				<label for="Nome">Nome</label>
				<input type="text" class="form-control" id="Nome" name="Nome" value="<?php echo $row->Nome; ?>"> </div>
			<div class="form-group col-md-3">
				<label for="Cpf">Cpf</label>
				<input type="text" class="form-control" id="Cpf" name="Cpf" value="<?php echo $row->Cpf; ?>"> </div>
			<div class="form-group col-md-2">
				<label for="DataCadastro">DataCadastro</label>
				<input type="text" class="form-control" id="DataCadastro" name="DataCadastro" value="<?php echo $row->DataCadastro; ?>"> </div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-7">
				<label for="Endereco">Endereco</label>
				<input type="text" class="form-control" id="Endereco" name="Endereco" value="<?php echo $row->Endereco; ?>"> </div>
			<div class="form-group col-md-3">
				<label for="Telefone">Telefone</label>
				<input type="text" class="form-control" id="Telefone" name="Telefone" value="<?php echo $row->Telefone; ?>"> </div>
			<div class="form-group col-md-2">
				<label for="DataAtualizado">DataAtualizado</label>
				<input type="text" class="form-control" id="DataAtualizado" name="DataAtualizado" value="<?php echo $row->DataAtualizado; ?>"> </div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-2">
				<label for="IdCliente">IdCliente</label>
				<input type="text" class="form-control" id="IdCliente" name="IdCliente" value="<?php echo $row->IdCliente; ?>"> </div>
			<div class="form-group col-md-6">
				<label for=""></label></div>
			<div class="form-group col-md-2">
				<label for="SituacaoCliente">SituacaoCliente</label>
				<input type="text" class="form-control" id="SituacaoCliente" name="SituacaoCliente" value="<?php echo $row->SituacaoCliente; ?>"> </div>
			<div class="form-group col-md-2">
				<label for="EmDebito">EmDebito</label>
				<input type="text" class="form-control" id="EmDebito" name="EmDebito" value="<?php echo $row->EmDebito; ?>"> </div>
		</div>
		<input class="btn btn-primary btn-lg btn-sm" type="submit" name="save" value="Atualizar">
	</form>
</div>

<?php
	if(isset($_POST['save'])){
		//altera os dados atualizados
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
		//Atualiza o indice selecionado
		$data_array[$index] = $input;
		//reordena o array
		$data_array = array_values($data_array);
		//codifica novamente para JSON
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('clientes.json', $data);
		//redireciona para index
		header('location: index.php');
	}
?>
</body>
</html>