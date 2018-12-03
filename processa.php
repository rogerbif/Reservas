<?php
	$table = 'cliente';
	require_once('functions.php');
	require_once('config.php');	
	require_once(DBAPI);
    
	$database = open_database();
	$database -> query("DELETE FROM `cliente`");
	$query = '';
	//$filename = "clientes.json";
	$filename = $_FILES['arquivo']['tmp_name'];
	$data = file_get_contents($filename); //Read the JSON file in PHP
	$array = json_decode($data, true); //Convert JSON String into PHP Array
	foreach($array as $row) //Extract the Array Values by using Foreach Loop
	{
		if( $row["SituacaoCliente"] == 'ativo')
		{
			$row["SituacaoCliente"] = 1;
		}
		
		if( $row["EmDebito"] == 'N' || $row["EmDebito"] == 'n')
		{
			$row["EmDebito"] = 0;
		}
		else if($row["EmDebito"] == 'S' || $row["EmDebito"] == 's')
		{
			$row["EmDebito"] = 1;
		}
		
		$query .= "INSERT INTO cliente (IdCliente, Nome, Cpf, Endereco, Telefone, SituacaoCliente, DataCadastro, DataAtualizado, EmDebito) VALUES 
				('".$row["IdCliente"]."', '".$row["Nome"]."','".$row["Cpf"]."', '".$row["Endereco"]."', '".$row["Telefone"]."', '".$row["SituacaoCliente"]."', '".$row["DataCadastro"]."', '".$row["DataAtualizado"]."','".$row["EmDebito"]."'); ";  // Make Multiple Insert Query 
	}
	//var_dump ($query);
	mysqli_multi_query($database, $query);//Run Mutliple Insert Query
	//$database -> query($query);
    close_database($database);

	$_SESSION['msg'] = "<p style='color: green;'>Carregado os dados com sucesso!</p>";
	sleep(1);
	header("Location: index.php");
