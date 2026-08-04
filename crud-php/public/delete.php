<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Repositories\ProductRepository;

$database = new Database();

$repository = new ProductRepository(
    $database->getConnection()
);

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$repository->delete($id);

header('Location: index.php');
exit;