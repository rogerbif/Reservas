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
<?php include(HEADER_TEMPLATE); ?>	
<body>
<div class="container">
  <hr class="my-4">
  <h3>Sistema de Reservas</h3>
  <hr class="my-4">
</div>
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
			<?php 
				$msg = "";
				$temp = "";
				$alert = 0;
				$v = new validacao;
				$msg = $v->validarCampo("Nome", $result['Nome'], "255", "2");
				$msg .= $v->validarCampo("Cpf", $result['Cpf'], "255", "2");
				$msg .= $v->validarCampo("Endereco", $result['Telefone'], "255", "2");
				$msg .= $v->validarSituacao($result['SituacaoCliente']);
				$msg .= $v->validarEmdebito($result['EmDebito']);		
				if($msg != "")
				{
					$temp = $msg;
					$msg = "Favor verifique o cadastro do Cliente ".$result['Nome']." ID: ".$result['IdCliente']."<br/>";
					$msg .= $temp;
					}
				
			?>

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
				<?php
				  if ($msg == "") 
				  {
				?>
					<div class="btn-group btn-group-sm" role="group">
						<a class="btn btn-primary btn-sm" href="quartos/index.php?IdCliente=<?php echo $result['IdCliente']; ?>" role="button" >Reservar</a>
					</div>
				<?php
				  } 
				  else 
				  {
				?>
					<div class="btn-group btn-group-sm" role="group">
						<a id="btnReserva" class="btn btn-primary btn-sm" href="index.php?btnReserva=true" role="button" >Reservar</a>
					</div>
				<?php
					if (isset($_GET['btnReserva'])) {
						$alert=1;
					} else {
						$alert=0;
					}
				  }
				?>
			</td>
			<?php 
				if($alert == 1)
				{
					//var_dump($msg);
					?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong><?php echo $msg; ?></strong> 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php
				} else 
				{

				}
			?>
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