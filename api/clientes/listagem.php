<?php

//Como não estou usando framework não usei namespace, optei pelo require
require_once '../../config/database.php';
require_once '../../src/Middleware/AuthMiddleware.php';

$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

$consultaSql = $pdo->prepare("SELECT * FROM clientes LIMIT :limit OFFSET :offset");
$consultaSql->bindParam(':limit', $limit, PDO::PARAM_INT);
$consultaSql->bindParam(':offset', $offset, PDO::PARAM_INT);
$consultaSql->execute();

$clientes = $consultaSql->fetchAll();
echo json_encode($clientes);
?>
