<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Repositories\ProductRepository;

$database = new Database();

$repository = new ProductRepository(
    $database->getConnection()
);

$products = $repository->findAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Produtos</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >
</head>

<body>

    <div class="container">

        <div class="header">

            <h1>Produtos</h1>

            <a
                href="create.php"
                class="btn"
            >
                + Novo produto
            </a>

        </div>

        <div class="table-container">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($products as $product): ?>

                        <tr>

                            <td>
                                <?= $product['id'] ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($product['name']) ?>
                            </td>

                            <td>
                                R$
                                <?= number_format(
                                    $product['price'],
                                    2,
                                    ',',
                                    '.'
                                ) ?>
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="edit.php?id=<?= $product['id'] ?>"
                                        class="btn btn-edit"
                                    >
                                        Editar
                                    </a>

                                    <a
                                        href="delete.php?id=<?= $product['id'] ?>"
                                        class="btn btn-delete"
                                    >
                                        Excluir
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>