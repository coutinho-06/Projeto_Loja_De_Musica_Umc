<?php
    include "conexao.php";
    include "Classes/Pedido.php";

    $id_cliente = $_COOKIE["id_cliente"];
    $id_instrumento = $_POST["produto_id"];
    $quantidade = $_POST["quantidade"];
    $pagamento = $_POST["pagamento"];
    $id_endereco = $_POST["endereco"];
    $data = date("Y-m-d H:i:s");

    $pedido = new Pedido($id_instrumento, $quantidade, $pagamento, $id_endereco);

    $id_instrumento = $pedido->getIdInstrumento();
    $quantidade = $pedido->getQuantidade();
    $pagamento = $pedido->getFormaPagamento();
    $id_endereco = $pedido->getIdEndereco();


    // 1 — PEGAR VALOR DO PRODUTO
    $sqlValor = "SELECT valor FROM instrumento WHERE id_instrumento = $id_instrumento";
    $buscaValor = mysqli_query($conn, $sqlValor);
    $produto = mysqli_fetch_assoc($buscaValor);
    $valor_unitario = $produto["valor"];

    // 2 — INSERIR NA TABELA COMPRA
    $sqlCompra = "
        INSERT INTO compra (forma_pagamento, data_compra, id_instrumento, id_cliente, id_endereco)
        VALUES ('$pagamento', '$data', $id_instrumento, $id_cliente, $id_endereco)
    ";

    mysqli_query($conn, $sqlCompra);

    // pegar o último id gerado
    $id_compra = mysqli_insert_id($conn);

    // 3 — INSERIR NA TABELA ITEM_COMPRA
    $sqlItem = "
        INSERT INTO item_compra (quantidade, valor_unitario, id_compra, id_instrumento)
        VALUES ($quantidade, '$valor_unitario', $id_compra, $id_instrumento)
    ";

    mysqli_query($conn, $sqlItem);

    // redirecionar
    header("Location: ../index.php?pedido=sucesso");
    exit;

?>
