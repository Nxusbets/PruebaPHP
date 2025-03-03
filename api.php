<?php
header('Content-Type: application/json');

require 'vendor/autoload.php';

$uri = "mongodb+srv://nxus:nxusbets@cluster0.zgmij.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0"; // Reemplaza

try {
    $client = new MongoDB\Client($uri);
    $collection = $client->demo_db->usuarios;
    $usuarios = $collection->find()->toArray();
    echo json_encode($usuarios);
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>