<?php
$table = 'reserva';
require_once('../functions.php');
require_once('../config.php');	
require_once(DBAPI);
if($_GET['reserva']==1){reserva();reservaquarto();}
if($_GET['checkout']==1){checkout();checkoutquarto();}
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
   
	<title>Sistema de Reservas - Gerenciar Reservas</title>
</head>
<?php include(HEADER_TEMPLATE); ?>	
<body>
<div class="container">
	<hr class="my-4">
	<h3>Sistema de Reservas - Gerenciar Reservas</h3>
	<hr class="my-4">
</div>
<div class="container">
<table id="bootstrap-table" class="table table-hover">
	<thead class="text-center">
		<th>ID<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>IDCliente<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>IDQuarto<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>DataReserva<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>DataCheckin<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>DataCheckout<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Situacao<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Opções</th>
	</thead>
	<!--//Reserva `ID`, `IDCliente`, `IDQuarto`, `DataReserva`, `DataCheckin`, `DataCheckout`, `Situacao`-->
	<tbody class="text-center">
      <?php if ($results): ?>    
	  <?php foreach ($results as $result): ?>        
		<tr>
			<td><?php echo $result['ID']; ?></td>
			<td><?php echo $result['IDCliente']; ?></td>
			<td><?php echo $result['IDQuarto']; ?></td>
			<td><?php echo $result['DataReserva']; ?></td>
			<td><?php echo $result['DataCheckin']; ?></td>
			<td><?php echo $result['DataCheckout']; ?></td>
			<td><?php echo $result['Situacao']; ?></td>
			<td style="text-align: center;">
				<?php
				  if ($result['Situacao'] == 1) 
				  {
				?>
					<div class="btn-group btn-group-sm" role="group">
						<a class="btn btn-primary btn-sm" href="index.php?IdReserva=<?php echo $result['ID']; ?>&IdQuarto=<?php echo $result['IDQuarto']; ?>&reserva=&checkout=1" role="button" >Check-Out</a>
					</div>
				<?php
				  } 
				  else 
				  {
				?>
					<div class="btn-group btn-group-sm" role="group">
						<button id="btnReserva" class="btn btn-primary btn-sm" href="../index.php?btnReserva=true" role="button" disabled>Reservar</button>
					</div>
				<?php
				  }
				?>
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
<?php include(FOOTER_TEMPLATE); ?>
