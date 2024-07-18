<?php
require_once 'Controllers/PplController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    $controller = new PplController();        
    // Retornar los datos en formato JSON
    header('Content-Type: application/json');
    $clientes = $controller->ObtenerData();
    
    echo json_encode($clientes);
    
}
?>
