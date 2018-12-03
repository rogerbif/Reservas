<?php		

require_once('config.php');	
require_once(DBAPI);		

$results = null;	
$result = null;	

function index($table = null) {		
	global $results;		
	$results = find_all($table);
}

function add() {
    if (!empty($_POST['result'])) {
        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $result = $_POST['result'];
        $result['modified'] = $result['created'] = $today -> format("Y-m-d H:i:s");
        save('results', $result);

	$pets = null;	
	$pet = null;	}
}

function edit() {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if (isset($_POST['result'])) {
            $result = $_POST['result'];
            $result['modified'] = $now -> format("Y-m-d H:i:s");
            update('results', $id, $result);
            header('location: index.php');
        } else {
            global $result;
            $result = find('results', $id);
		}

        if (isset($_POST['pet'])) {
            $pet = $_POST['pet'];
            $pet['modified'] = $now -> format("Y-m-d H:i:s");
            update('pets', $id, $pet);
            header('location: index.php');
        } else {
            global $pet;
            $pet = find('pets', $id);
		}
	} else {
		header('location: index.php');
	}
}

function view($id = null) {
    global $result;
    $result = find('results', $id);
}

function delete($id = null) {
    global $result;
    $result = remove('results', $id);
    header('location: index.php');
}

function reserva() {
	if (isset($_GET['IdCliente'])) {
	$idcliente = $_GET['IdCliente'];
	$idquarto = $_GET['IdQuarto'];
	//Reserva `ID`, `IDCliente`, `IDQuarto`, `DataReserva`, `DataCheckin`, `DataCheckout`, `Situacao`
	$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
	$result['DataReserva'] = $result['DataCheckin'] = $today -> format("Y-m-d H:i:s");
	$result['IDCliente'] = $idcliente;
	$result['IDQuarto'] = $idquarto;
	$result['Situacao'] = 1;
	save('reserva', $result);
	situquarto($idquarto, 1);
	}
}

function reservaquarto() {
	if (isset($_GET['IdQuarto'])) {
	$IdQuarto = $_GET['IdQuarto'];
	situquarto($IdQuarto, 1);
	// $idcliente = $_GET['IdCliente'];
	// $idquarto = $_GET['IdQuarto'];
	// //`quarto`(`IdQuarto`, `Numero`, `Situacao`, `ValorDiaria`, `titulo`, `descricao`)
	// $result['Situacao'] = 1;
	// //var_dump($result);
	// update('quarto', $idquarto, $result);
	}
}

function checkout() {
	if (isset($_GET['IdReserva'])) {
	$IdQuarto = $_GET['IdQuarto'];
	$IdReserva = $_GET['IdReserva'];
	//Reserva `ID`, `IDCliente`, `IDQuarto`, `DataReserva`, `DataCheckin`, `DataCheckout`, `Situacao`
	$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
	$result['DataCheckout'] = $today -> format("Y-m-d H:i:s");
	$result['Situacao'] = 0;
	//var_dump($result);
	update('reserva', $IdReserva, $result);
	//header('location: ../pagseguro/checkout.php?ID='.$IdReserva);
	situquarto($IdQuarto, 0);
	}
}

function checkoutquarto() {
	if (isset($_GET['IdQuarto'])) {
	$IdQuarto = $_GET['IdQuarto'];
	var_dump($IdQuarto);
	situquarto($IdQuarto, 1);
	// //`quarto`(`IdQuarto`, `Numero`, `Situacao`, `ValorDiaria`, `titulo`, `descricao`)
	// $result['Situacao'] = 0;
	// $result['IdQuarto'] = $IdQuarto;
	// //var_dump($result);
	// update('quarto', $IdQuarto, $result);
	// //header('location: ../pagseguro/checkout.php?ID='.$IdReserva);
	}
}