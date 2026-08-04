<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Repositories\ProductRepository;

$database = new Database();

$repository = new ProductRepository(
    $database->getConnection()
);

$id = (int) ($_GET['id'] ?? 0);

$product = $repository->findById($id);

if (!$product) {
    http_response_code(404);
    exit('Produto não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $price = (float) $_POST['price'];

    $repository->update(
        $id,
        $name,
        $price
    );

    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Editar Produto</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Editar Produto</h1>

        <a
            href="index.php"
            class="btn"
        >
            Voltar
        </a>
    </div>

    <form method="POST">

        <div>
            <label for="name">Nome</label>

            <input
                type="text"
                id="name"
                name="name"
                value="<?= htmlspecialchars($product['name']) ?>"
                required
            >
        </div>

        <br>

        <div>
            <label for="price">Preço</label>

            <input
                type="number"
                id="price"
                name="price"
                value="<?= $product['price'] ?>"
                step="0.01"
                min="0"
                required
            >
        </div>

        <br>

        <button
            type="submit"
            class="btn"
        >
            Salvar alterações
        </button>

    </form>

</div>

</body>

</html>