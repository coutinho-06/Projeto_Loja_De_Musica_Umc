<?php

    include "conexao.php";

    if (!isset($_COOKIE['id_cliente'])) {
        echo json_encode([]);
        exit;
    }

    $id = $_COOKIE['id_cliente'];

    // pega NO MÁXIMO 3 endereços do cliente
    $sql = "SELECT id_endereco, numero, cep, estado 
            FROM endereco 
            WHERE id_cliente = $id 
            ORDER BY id_endereco ASC
            LIMIT 3";

    $result = mysqli_query($conn, $sql);

    $enderecos = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $enderecos[] = $row;
    }

    // devolve em JSON pro JavaScript
    echo json_encode($enderecos);
?>

