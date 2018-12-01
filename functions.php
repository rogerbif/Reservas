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

// function InClient() {			
	// InsertClient();
// }