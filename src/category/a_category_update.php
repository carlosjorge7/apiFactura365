<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    $json = file_get_contents('php://input');
    $params = json_decode($json);
    
    include '../../../../../deployments/connect/connection_invoice.php'; 

    sqlsrv_query($conn, "EXEC p_category_update '$params->CategoryID', '$params->OrganizationID', '$params->CategoryName', '$params->CategoryID_Parent';");
    
    class Result {}

    $response = new Result();
    $response->resultado = 'OK';
    $response->mensaje = 'categoria modificada';
    
    echo json_encode($response);  
?>
