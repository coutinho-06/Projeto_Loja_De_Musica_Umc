<?php
    
    include "conexao.php";

    $id_cliente = $_COOKIE["id_cliente"];
    $index = $_POST["endIndex"]; 

    $numero = $_POST["numR"];
    $cep = $_POST["cep"];
    $estado = $_POST["estado"];

    // verifica se existe um endereço na posição escolhida
    $sql = "SELECT id_endereco FROM endereco WHERE id_cliente = $id_cliente ORDER BY id_endereco ASC LIMIT 1 OFFSET $index";
    $res = mysqli_query($conn, $sql);
    $existe = mysqli_fetch_assoc($res);

    // Se existe → ATUALIZA
    if ($existe) {
        $id_endereco = $existe["id_endereco"];
        $sqlUpdate = "
            UPDATE endereco
            SET numero = '$numero', cep = '$cep', estado = '$estado'
            WHERE id_endereco = $id_endereco
        ";

        mysqli_query($conn, $sqlUpdate);
    }
    // Se NÃO existe → CRIA NOVO
    else {
        $sqlInsert = "
            INSERT INTO endereco (id_cliente, numero, cep, estado)
            VALUES ($id_cliente, '$numero', '$cep', '$estado')
        ";

        mysqli_query($conn, $sqlInsert);
    }

    header("Location: ../AreaCliente/AcessoCliente.php");
    exit;

?>
