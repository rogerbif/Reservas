<?php
$table = 'registros';
require_once('functions.php');
require_once('config.php');	
require_once(DBAPI);
index($table);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
   <script src="js/jquery.bdt.js"></script>
   <link href="css/jquery.bdt.css" rel="stylesheet">
   <link href="css/font-awesome.min.css" rel="stylesheet">
   <script src="js/jquery.sortelements.js"></script>
   
	<title>Sistema de Reservas</title>
</head>
<body>

<div class="container">
  <h3>Sistema de Reservas</h3>
  <hr class="my-4">
</div>
<br />
<div class="container"><a class="btn btn-primary btn-lg btn-sm" href="add.php" role="button">Adicionar</a></div><br />
<div class="container">
<table id="bootstrap-table" class="table table-hover">
	<thead class="text-center">
		<th class="col-sm-1">Index			<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">IdCliente		<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">Nome			<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">Cpf			<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">Endereco		<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">Telefone		<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">SituacaoCliente<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">DataCadastro	<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">DataAtualizado	<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">EmDebito		<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">Opções</th>
	</thead>
	<tbody>
		<?php
			//fetch data from json
			$data = file_get_contents('clientes.json');
			//decode into php array
			$calup = json_decode($data);		
		?>

		<?php 
		$index = 0;
		if(is_array($calup)){
			foreach ($calup as $calup): 
			?>
			<tr style="display: table-row;">
				<td style="text-align: center;"> <?php echo $index+1; ?> </td>
				<td> <?php echo $calup->IdCliente; ?> </td>
				<td> <?php echo $calup->Nome; ?> </td>
				<td> <?php echo $calup->Cpf; ?> </td>
				<td> <?php echo $calup->Endereco; ?> </td>
				<td> <?php echo $calup->Telefone; ?> </td>
				<td> <?php echo $calup->SituacaoCliente; ?> </td>
				<td> <?php echo $calup->DataCadastro; ?> </td>
				<td> <?php echo $calup->DataAtualizado; ?> </td>
				<td> <?php echo $calup->EmDebito; ?> </td>
				<td style="text-align: center;">
				<div class="btn-group btn-group-sm" role="group">
				<a class="btn btn-primary btn-sm" href="quartos/index.php?index=<?php echo $index; ?>" role="button">Reservar</a> 
				<a class="btn btn-primary btn-sm" href="edit.php?index=<?php echo $index; ?>" role="button">Editar</a> 
				<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $index+1; ?>" role="button"><i class="fa fa-trash"></i> Excluir</a>
				</div>
				</td>
			</tr>
			<?php
			$index++;
		endforeach;
		} 
		?>
	</tbody>
</table>
</div>
    <script type="text/javascript">
    $(document).ready( function () {
       $('#bootstrap-table').bdt({
		    showSearchForm: 1,
            showEntriesPerPageField: 1
	   });
    });
    </script>

<?php include('modal.php'); ?>
</body>
</html>
