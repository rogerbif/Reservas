<?php		

require_once('config.php');	
require_once(DBAPI);		

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
        $customerId = $_GET['customerId'];
        if ($customerId == ""){
            header('location: index.php');
        } else {
            header("location: ../results/lista_pep.php?customerId=".$customerId);
        } 
    }
}

/**	 *	Atualizacao/Edicao de result	 */
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
    } else {
        header('location: index.php');
    }
}

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
