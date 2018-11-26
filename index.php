<?php
$table = 'cliente';
require_once('functions.php');
require_once('config.php');	
require_once(DBAPI);
InClient();
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
		<th>IdCliente<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Nome<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Cpf<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Endereco<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Telefone<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>SituacaoCliente<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>DataCadastro<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>DataAtualizado<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>EmDebito<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Opções</th>
	</thead>
	   <tbody>
      <?php if ($results): ?>    
	  <?php foreach ($results as $result): ?>        
		  <tr>
			<td><?php echo $result['ID']; ?></td>
			<td><?php echo $result['Nome']; ?></td>
			<td><?php echo $result['CPF']; ?></td>
			<td><?php echo $result['Endereco']; ?></td>
			<td><?php echo $result['Telefone']; ?></td>
			<td><?php echo $result['Situacao']; ?></td>
			<td><?php echo $result['DataCadastro']; ?></td>
			<td><?php echo $result['DataAtualizacao']; ?></td>
			<td><?php echo $result['EmDebito']; ?></td>
			<td style="text-align: center;">
				<div class="btn-group btn-group-sm" role="group">
					<a class="btn btn-primary btn-sm" href="quartos/index.php?index=<?php echo $index; ?>" role="button">Reservar</a>
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
	
	
	<!-- Codigo JSON
	<tbody>
		<?php
			//fetch data from json
			//$data = file_get_contents('clientes.json');
			//decode into php array
			//$calup = json_decode($data);		
		?>

		<?php 
		//$index = 0;
		//if(is_array($calup)){
			//foreach ($calup as $calup): 
			?>
			<tr style="display: table-row;">
				<td style="text-align: center;"> <?php //echo $index+1; ?> </td>
				<td> <?php //echo $calup->IdCliente; ?> </td>
				<td> <?php //echo $calup->Nome; ?> </td>
				<td> <?php //echo $calup->Cpf; ?> </td>
				<td> <?php //echo $calup->Endereco; ?> </td>
				<td> <?php //echo $calup->Telefone; ?> </td>
				<td> <?php //echo $calup->SituacaoCliente; ?> </td>
				<td> <?php //echo $calup->DataCadastro; ?> </td>
				<td> <?php //echo $calup->DataAtualizado; ?> </td>
				<td> <?php //echo $calup->EmDebito; ?> </td>
				<td style="text-align: center;">
				<div class="btn-group btn-group-sm" role="group">
				<a class="btn btn-primary btn-sm" href="quartos/index.php?index=<?php //echo $index; ?>" role="button">Reservar</a> 
				<a class="btn btn-primary btn-sm" href="edit.php?index=<?php //echo $index; ?>" role="button">Editar</a> 
				<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $index+1; ?>" role="button"><i class="fa fa-trash"></i> Excluir</a>
				</div>
				</td>
			</tr>
			<?php
			//$index++;
			//endforeach;
		//} 
		?>
	</tbody>-->
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
