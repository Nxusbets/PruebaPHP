<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Permite solicitudes desde cualquier origen (para pruebas)
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require 'vendor/autoload.php';

$uri = "mongodb+srv://nxus:nxusbets@cluster0.zgmij.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";

try {
    $client = new MongoDB\Client($uri);
    $collection = $client->demo_db->usuarios;

    $data = json_decode(file_get_contents("php://input"));

    $insertOneResult = $collection->insertOne([
        'nombre' => $data->nombre,
        'email' => $data->email
    ]);

    echo json_encode(['success' => $insertOneResult->getInsertedCount() > 0]);
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>