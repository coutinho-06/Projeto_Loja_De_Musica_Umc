<?php
include "../Database/conexao.php";

if (!isset($_COOKIE['id_cliente'])) {
    echo json_encode([]);
    exit;
}

$id = $_COOKIE['id_cliente'];

$sql = "
    SELECT 
        c.id_compra,
        c.forma_pagamento,
        c.data_compra,
        c.status_compra,
        i.nome_instrumento,
        i.valor,
        ic.quantidade,
        ic.valor_unitario
    FROM compra c
    INNER JOIN item_compra ic ON ic.id_compra = c.id_compra
    INNER JOIN instrumento i ON i.id_instrumento = ic.id_instrumento
    WHERE c.id_cliente = $id
    ORDER BY c.id_compra DESC
";

$result = mysqli_query($conn, $sql);

$pedidos = [];

while ($row = mysqli_fetch_assoc($result)) {
    $pedidos[] = $row;
}

header("Content-Type: application/json");
echo json_encode($pedidos);
