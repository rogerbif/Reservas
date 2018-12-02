<?php
$table = 'cliente';
require_once('functions.php');
require_once('config.php');	
require_once("validacao.php");
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
   
	<title>Sistema de Reservas</title>
</head>
<body>
<br />
<hr>
<div class="container">
  <h3>Sistema de Reservas</h3>
  <hr class="my-4">
</div>
<br />
<div class="container">
	<!--<a class="btn btn-primary btn-lg btn-sm" href="add.php" role="button">Adicionar</a>-->
	<form method="POST" action="processa.php" enctype="multipart/form-data">
		<input type="file" name="arquivo">
		<input type="submit" value="Importar">
	</form>
</div>
<br />
<div class="container">
<table id="bootstrap-table" class="table table-hover">
	<thead class="text-center">
		<th>Id<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Nome<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Cpf<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Endereco<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Telefone<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Situacao<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Cadastro<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Atualizado<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>EmDebito<i class="fa fa-sort" aria-hidden="true"></i></th>
		<th>Opções</th>
	</thead>
	<tbody class="text-center">
      <?php if ($results): ?>    
	  <?php foreach ($results as $result): ?>        
		  <tr>
			<td><?php echo $result['IdCliente']; ?></td>
			<td><?php echo $result['Nome']; ?></td>
			<td><?php echo $result['Cpf']; ?></td>
			<td><?php echo $result['Endereco']; ?></td>
			<td><?php echo $result['Telefone']; ?></td>
			<td><?php echo $result['SituacaoCliente']; ?></td>
			<td><?php echo $result['DataCadastro']; ?></td>
			<td><?php echo $result['DataAtualizado']; ?></td>
			<td><?php echo $result['EmDebito']; ?></td>
			<td style="text-align: center;">
				<div class="btn-group btn-group-sm" role="group">
					<?php 
						$msg = "";
						$v = new validacao;
						$msg = $v->validarCampo("Nome", $result['Nome'], "255", "2");
						$msg .= $v->validarCampo("Cpf", $result['Cpf'], "255", "2");
						$msg .= $v->validarCampo("Endereco", $result['Endereco'], "255", "2");
						$msg .= $v->validarCampo("Endereco", $result['Telefone'], "255", "2");
						if($msg != "")
						{
							var_dump($msg);
							?>
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<strong>Holy guacamole!</strong> <?php echo $msg; ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
							<?php
						} else 
						{

						}
					?>
					<a class="btn btn-primary btn-sm" href="quartos/index.php?IdCliente=<?php echo $result['IdCliente']; ?>" role="button">Reservar</a>
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
</body>
</html>
