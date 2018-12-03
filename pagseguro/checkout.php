<?php
header("access-control-allow-origin: https://pagseguro.uol.com.br");
header("Content-Type: text/html; charset=UTF-8",true);
date_default_timezone_set('America/Sao_Paulo');

require_once('../functions.php');
require_once('../config.php');	
require_once(DBAPI);
$IDReserva = $_GET['ID'];
var_dump($IDReserva);
$reserva = find('reserva', $IDReserva);
var_dump($reserva);
sleep(1);
$cliente = find('cliente', $reserva['IDCliente']);
var_dump($cliente);
sleep(1);
$quarto = find('quarto', $reserva['IDQuarto']);
var_dump($quarto);
sleep(1);

require_once("PagSeguro.class.php");
$PagSeguro = new PagSeguro();
	
//EFETUAR PAGAMENTO	
$venda = array("codigo"=>"".$reserva['ID'],
			   "valor"=>$quarto['ValorDiaria'],
			   "descricao"=>"Pagamento Quarto: ".$quarto['Numero'],
			   "nome"=>"".$cliente['Nome'],
			   "email"=>"teste@teste.com.br",
			   "telefone"=>"(51) 3030-3030",
			   "rua"=>"".$cliente['Endereco'],
			   "numero"=>"123",
			   "bairro"=>"Centro",
			   "cidade"=>"Porto Alegre",
			   "estado"=>"RS", //2 LETRAS MAIÚSCULAS
			   "cep"=>"92.500-000",
			   "codigo_pagseguro"=>"");
			   
$PagSeguro->executeCheckout($venda,"../reserva/index.php?ID=".$reserva['ID']);

//----------------------------------------------------------------------------


//RECEBER RETORNO
if( isset($_GET['transaction_id']) ){
	$pagamento = $PagSeguro->getStatusByReference($reserva['ID']);
	
	$pagamento->codigo_pagseguro = $_GET['transaction_id'];
	if($pagamento->status==3 || $pagamento->status==4){
		//ATUALIZAR DADOS DA VENDA, COMO DATA DO PAGAMENTO E STATUS DO PAGAMENTO
		
	}else{
		//ATUALIZAR NA BASE DE DADOS
	}
}

?>