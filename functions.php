<?php		

require_once('config.php');	
require_once(DBAPI);		

<<<<<<< HEAD
$results = null;	
$result = null;	

/**	 *  Listagem de results	 */	
function index($table = null) {		
	global $results;		
	$results = find_all($table);
}

/**	 *  Cadastro de results	 */
function add() {
    if (!empty($_POST['result'])) {
        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $result = $_POST['result'];
        $result['modified'] = $result['created'] = $today -> format("Y-m-d H:i:s");
        save('results', $result);
=======
$pets = null;	
$pet = null;	

/**	 *  Listagem de pets	 */	
function index() {		
	global $pets;		
	$pets = find_all('pets');
}

/**	 *  Cadastro de pets	 */
function add() {
    if (!empty($_POST['pet'])) {
        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $pet = $_POST['pet'];
        $pet['modified'] = $pet['created'] = $today -> format("Y-m-d H:i:s");
        save('pets', $pet);
>>>>>>> master
        $customerId = $_GET['customerId'];
        if ($customerId == ""){
            header('location: index.php');
        } else {
<<<<<<< HEAD
            header("location: ../results/lista_pep.php?customerId=".$customerId);
=======
            header("location: ../pets/lista_pep.php?customerId=".$customerId);
>>>>>>> master
        } 
    }
}

<<<<<<< HEAD
/**	 *	Atualizacao/Edicao de result	 */
=======
/**	 *	Atualizacao/Edicao de pet	 */
>>>>>>> master
function edit() {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
<<<<<<< HEAD
        if (isset($_POST['result'])) {
            $result = $_POST['result'];
            $result['modified'] = $now -> format("Y-m-d H:i:s");
            update('results', $id, $result);
            header('location: index.php');
        } else {
            global $result;
            $result = find('results', $id);
=======
        if (isset($_POST['pet'])) {
            $pet = $_POST['pet'];
            $pet['modified'] = $now -> format("Y-m-d H:i:s");
            update('pets', $id, $pet);
            header('location: index.php');
        } else {
            global $pet;
            $pet = find('pets', $id);
>>>>>>> master
        }
    } else {
        header('location: index.php');
    }
}

<<<<<<< HEAD
/**	 *  Visualização de um result	 */
function view($id = null) {
    global $result;
    $result = find('results', $id);
}

/**	 *  Exclusão de um result	 */
function delete($id = null) {
    global $result;
    $result = remove('results', $id);
    header('location: index.php');
}

function InClient() {			
	InsertClient();
}

?>
=======
/**	 *  Visualização de um pet	 */
function view($id = null) {
    global $pet;
    $pet = find('pets', $id);
}

/**	 *  Exclusão de um pet	 */
function delete($id = null) {
    global $pet;
    $pet = remove('pets', $id);
    header('location: index.php');
}

>>>>>>> master
