<?php 
	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	header('Content-Type: application/json');

	$json = file_get_contents('php://input');
    $params = json_decode($json);
    
    include '../../../deployments/connect/connection_invoice.php'; 

	sqlsrv_query($conn,"EXEC p_usuario_id '$params->proceso', '$params->UsuarioID', '$params->Email', '$params->UsuarioName', '$params->UsuarioLastName' ;");
	
	class Result {}
	$response = new Result();
	$response->resultado = 'OK';
	$response->mensaje = 'usuario borrado';

	
	echo json_encode($response); 
?>