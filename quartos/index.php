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
   
	<title>Sistema de Reservas - Seleção de Quartos</title>
</head>
<body>

<div class="container">
  <h3>Sistema de Reservas - Seleção de Quartos</h3>
  <hr class="my-4">
</div>
<br />
<!--    ID int NOT NULL AUTO_INCREMENT,
		Numero int NOT NULL,
		Situacao BOOLEAN NOT NULL,
		ValorDiaria DECIMAL(5,2),
		PRIMARY KEY (ID) 	-->
<div class="container"><a class="btn btn-primary btn-lg btn-sm" href="add.php" role="button">Adicionar</a></div><br />
<div class="container">
<table id="bootstrap-table" class="table table-hover">
	<thead class="text-center">
		<th class="col-sm-1">Index			<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">IdQuarto		<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">Numero			<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">Situação		<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">Valor Diaria	<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-1">Opções</th>
	</thead>
	<tbody>
		<?php
			//fetch data from json
			$data = file_get_contents('quartos.json');
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
				<td> <?php echo $calup->IdQuarto; ?> </td>
				<td> <?php echo $calup->Numero; ?> </td>
				<td> <?php echo $calup->Situacao; ?> </td>
				<td> <?php echo $calup->ValorDiaria; ?> </td>
				<td style="text-align: center;">
				<div class="btn-group btn-group-sm" role="group">
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
