<?php

namespace App\Repositories;

use PDO;

class ProductRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findAll(): array
    {
        $statement = $this->connection->query(
            'SELECT * FROM products ORDER BY id DESC'
        );

        return $statement->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM products WHERE id = :id'
        );

        $statement->execute([
            'id' => $id
        ]);

        $product = $statement->fetch();

        return $product ?: null;
    }

    public function create(
        string $name,
        float $price
    ): void {
        $statement = $this->connection->prepare(
            'INSERT INTO products (name, price)
             VALUES (:name, :price)'
        );

        $statement->execute([
            'name' => $name,
            'price' => $price
        ]);
    }

    public function update(
        int $id,
        string $name,
        float $price
    ): void {
        $statement = $this->connection->prepare(
            'UPDATE products
             SET name = :name,
                 price = :price
             WHERE id = :id'
        );

        $statement->execute([
            'id' => $id,
            'name' => $name,
            'price' => $price
        ]);
    }

    public function delete(int $id): void
    {
        $statement = $this->connection->prepare(
            'DELETE FROM products WHERE id = :id'
        );

        $statement->execute([
            'id' => $id
        ]);
    }
}