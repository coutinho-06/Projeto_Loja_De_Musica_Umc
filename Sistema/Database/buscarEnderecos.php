<?php
    include "conexao.php";

    session_start();
    $id = $_SESSION["id_usuario"];

    $sql = "SELECT * FROM endereco WHERE id_usuario = $id";

    $result = mysqli_query($conn, $sql);

    $enderecos = [];

    while ($e = mysqli_fetch_assoc($result)) {
        $enderecos[] = $e;
    }

    echo json_encode($enderecos);
