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
<?php include(HEADER_TEMPLATE); ?>	
<body>
<div class="container">
	<hr class="my-4">
  <h3>Sistema de Reservas - Seleção de Quartos</h3>
  <hr class="my-4">
</div>
<!--    ID int NOT NULL AUTO_INCREMENT,
		Numero int NOT NULL,
		Situacao BOOLEAN NOT NULL,
		ValorDiaria DECIMAL(5,2),
		PRIMARY KEY (ID) 	-->
<!--<div class="container"><a class="btn btn-primary btn-lg btn-sm" href="add.php" role="button">Adicionar</a></div><br />-->
<div class="container">
      <?php $i = 0; if ($results): ?>    
	  <?php foreach ($results as $result): ?>  
	  	<?php if($i == 0 ){?> <div class="row"> <?php } ?>    
		  	<div class="col-sm-4">
				<div class="card" style="width: 18rem;">
					<div class="card-header">Quarto <?php echo $result['Numero']; ?></div>
					<img class="card-img-top" src="../quartos/imagens/quarto<?php echo $result['Numero']; ?>.jpg" alt="Card image">
					<div class="card-body">
						<h6 class="card-title"><?php echo utf8_encode($result['titulo']); ?></h6>
						<p class="card-text"><?php echo utf8_encode($result['descricao']); ?></p>
						<p class="card-text">Valor Diaria: <?php echo $result['ValorDiaria']; ?></p>
						<p class="card-text">Ocupado: <?php echo $result['Situacao']; ?></p>
						<div class="btn-group btn-group-sm" role="group">
							<?php if($result['Situacao'])
							{ ?> 
								<button class="btn btn-primary btn-sm" href="#" disabled role="button">Check-In</button>
							<?php } else { ?>
								<a class="btn btn-primary btn-sm" href="../reserva/index.php?IdCliente=<?php echo $_GET['IdCliente']; ?>&IdQuarto=<?php echo $result['IdQuarto']; ?>&reserva=1&checkout=" role="button">Check-In</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php $i++; if($i == 3 ){?> </div><br> <?php $i = 0; } ?>
			<?php //echo $result['IdQuarto']; ?>
      <?php endforeach; ?>    
	  <?php else: ?>        
			 <p colspan="6">Nenhum registro encontrado.</p>
      <?php endif; ?>
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
<?php include(FOOTER_TEMPLATE); ?>
