<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset=" UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table of Dreams</title>
    <style>
        table, th, td {
            border:1px solid;
        }
    </style>
</head>

<?php

    $people = [

        [
            "id" => 1,
            "name" => "Rafael Santos Fernandes",
            "email" => "Rafaelsf013@gmail.com",
            "age" => 27,
            "occupation" => "Programador",
        ],

        [

            "id" => 2,
            "name" => "Beatriz da Silva Carvalho",
            "email" => "Beatriz@teste.com",
            "age" => "26",
            "occupation" => "Professora",

        ],

        [
        
            "id" => 3,
            "name" => "Fernando Santos",
            "email" => "Fernandinho13@gmail.com",
            "age" => 36,
            "occupation" => "Entregador"

        ],
    ];
    

?>

<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Idade</th>
                <th>Profissão</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($people as $person){ ?>
                <tr>
                    <td><?= $person["id"] ?></td>
                    <td><?= $person["name"] ?></td>
                    <td><?= $person["email"] ?></td>
                    <td><?= $person["age"] ?></td>
                    <td><?= $person["occupation"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>