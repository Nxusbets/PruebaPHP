<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type');

require 'vendor/autoload.php';

$uri = "mongodb+srv://nxus:nxusbets@cluster0.zgmij.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";

try {
    $client = new MongoDB\Client($uri);
    $collection = $client->demo_db->usuarios;

    $data = json_decode(file_get_contents("php://input"));

    $deleteOneResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($data->id)]);

    echo json_encode(['success' => $deleteOneResult->getDeletedCount() > 0]);
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>