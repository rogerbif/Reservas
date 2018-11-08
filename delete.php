<?php
	//pega o indice
	$index = $_GET['index'];
	//Lê os dados do JSON
	$data = file_get_contents('lista.json');
	$data_array = json_decode($data);
	//Deleta o registro pelo indice
	unset($data_array[$index]);
	//reordena o array
	$data_array = array_values($data_array);
	//codifica novamente para JSON
	$data = json_encode($data_array, JSON_PRETTY_PRINT);
	file_put_contents('lista.json', $data);
	//redireciona para index
	header('location: index.php');
?>