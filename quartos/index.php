<?php
$table = 'quarto';
require_once('../functions.php');
require_once('../config.php');	
require_once(DBAPI);
//InClient();
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
<!--<div class="container"><a class="btn btn-primary btn-lg btn-sm" href="add.php" role="button">Adicionar</a></div><br />-->
<div class="container">
<table id="bootstrap-table" class="table table-hover">
	<thead class="text-center">
		<th>IdQuarto		<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th >Numero			<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th >Situação		<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th >Valor Diaria	<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th >Opções</th>
	</thead>
	<tbody class="text-center">
      <?php if ($results): ?>    
	  <?php foreach ($results as $result): ?>        
		  <tr>
			<td><?php echo $result['IdQuarto']; ?></td>
			<td><?php echo $result['Numero']; ?></td>
			<td><?php echo $result['Situacao']; ?></td>
			<td><?php echo $result['ValorDiaria']; ?></td>
			<td style="text-align: center;">
				<div class="btn-group btn-group-sm" role="group">
					<button class="btn btn-primary btn-sm" href="quartos/index.php?IdCliente=<?php echo $result['IdCliente']; ?>" <?php if($result['Situacao']){ ?> disabled <?php }?>  role="button">Check-In</button>
				</div>
			</td>
		  </tr>
      <?php endforeach; ?>    
	  <?php else: ?>        
		  <tr>
			 <td colspan="6">Nenhum registro encontrado.</td>
		  </tr>
      <?php endif; ?>
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
