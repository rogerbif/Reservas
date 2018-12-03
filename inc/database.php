<?php		

mysqli_report(MYSQLI_REPORT_STRICT);		
function open_database() {		
	try {			
				$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);			
				return $conn;		
			} catch (Exception $e) {			
				echo $e->getMessage();			
				return null;		
			}	
		}		
		
function close_database($conn) {		
		try {			
			mysqli_close($conn);		
		} catch (Exception $e) {			
			echo $e->getMessage();		
		}	
	}
	
/**	 *  Pesquisa um Registro pelo ID em uma Tabela	 */	
function find( $table = null, $id = null ) {	  		

	$database = open_database();		
	$found = null;			

	try {		  
		if ($id) {		    
			$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      
				$found = $result->fetch_assoc();		    
			}		    		  
		} else {		    		    
			$sql = "SELECT * FROM " . $table;		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {
				$found = $result->fetch_all(MYSQLI_ASSOC);
			}		  
		}		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		  
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;	
}

/**	 *  Pesquisa um nome em uma Tabela	 */	
function find_name( $table = null, $name = null ) {	  		

	$database = open_database();		
	$found = null;			

	try {		  
		if ($name) {		    
			$sql = "SELECT * FROM " . $table . " WHERE name like '%".$name."%'";		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      
				$found = $result->fetch_assoc();		    
			}		    		  
		} else {		    		    
			$sql = "SELECT * FROM " . $table;		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      
				$found = $result->fetch_all(MYSQLI_ASSOC);
			}		  
		}		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		  
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;	
}

/**	 *  Pesquisa Todos os Registros de uma Tabela	 */	
function find_all( $table ) {	
	$database = open_database();		
	$found = null;			
		  	    		    
	$sql = "SELECT * FROM " . $table;		    
	$result = $database->query($sql);		    		    
	if ($result->num_rows > 0) {
		$found = $result->fetch_all(MYSQLI_ASSOC);
	}		  
	
	close_database($database);		
	return $found;
}

/**	*  Insere um registro no BD	*/
function save($table = null, $data = null) {
    $database = open_database();
    $columns = null;
    $values = null;
    
	//print_r($data);		  
    foreach($data as $key => $value) {
            $columns .= trim($key, "'").
            ",";
            $values .= "'$value',";
        }
    
	// remove a ultima virgula	  
    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');
    $sql = "INSERT INTO ".$table.
    "($columns)".
    " VALUES ".
    "($values);";
    try {
        $database -> query($sql);
        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}

/**	 *  Atualiza um registro em uma tabela, por ID	 */
function update($table = null, $id = 0, $data = null) {
    $database = open_database();
    $items = null;
    foreach($data as $key => $value) {
        $items .= trim($key, "'").
        "='$value',";
    }

    // remove a ultima virgula	 
    $items = rtrim($items, ',');
    $sql = "UPDATE ".$table;
    $sql .= " SET $items";
    $sql .= " WHERE id=".$id.
    ";";
    try {
        $database -> query($sql);
        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}

/**	 *  Remove uma linha de uma tabela pelo ID do registro	 */
function remove($table = null, $id = null) {
    $database = open_database();
    try {
        if ($id) {
            $sql = "DELETE FROM ".$table.
            " WHERE id = ".$id;
            $result = $database -> query($sql);
            if ($result = $database -> query($sql)) {
                $_SESSION['message'] = "Registro Removido com Sucesso.";
                $_SESSION['type'] = 'success';
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e -> GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}

	function situquarto($id = null, $data = null) {
    $database = open_database();
	$database -> query("UPDATE 'quarto' SET 'Situacao'=".$data."WHERE 'IdQuarto'=".$id);
    close_database($database);
	return true;
}

// function InsertClient() {
    // $database = open_database();
	// $database -> query("DELETE FROM `cliente`");
	// $query = '';
	// $filename = "clientes.json";
	// $data = file_get_contents($filename); //Read the JSON file in PHP
	// $array = json_decode($data, true); //Convert JSON String into PHP Array
	// foreach($array as $row) //Extract the Array Values by using Foreach Loop
	// {
		// $query .= "INSERT INTO cliente (IdCliente, Nome, Cpf, Endereco, Telefone, SituacaoCliente, DataCadastro, DataAtualizado, EmDebito) VALUES ('".$row["IdCliente"]."', '".$row["Nome"]."','".$row["Cpf"]."', '".$row["Endereco"]."', '".$row["Telefone"]."', '".$row["SituacaoCliente"]."', '".$row["DataCadastro"]."', '".$row["DataAtualizado"]."','".$row["EmDebito"]."'); ";  // Make Multiple Insert Query 
	// }
	// //var_dump ($query);
	// mysqli_multi_query($database, $query);//Run Mutliple Insert Query
	// //$database -> query($query);
    // close_database($database);
	// return true;
// }


