<?php

include __DIR__ . "/conexao.php";

if (!isset($_POST['idCliente'])) {
    die("ERRO: Nenhum dado recebido.");
}

$idCliente = intval($_POST['idCliente']);
$estado    = $_POST['estado'] ?? "";
$cep       = $_POST['cep'] ?? "";
$numero    = $_POST['numR'] ?? "";
$index     = intval($_POST['endIndex']);  // 0, 1 ou 2

// Buscar endereços existentes
$sql = "SELECT * FROM endereco WHERE id_cliente = $idCliente ORDER BY id_endereco ASC";
$result = mysqli_query($conn, $sql);

$enderecos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $enderecos[] = $row;
}

// Se índice existe → editar
if (isset($enderecos[$index])) {

    $idEndereco = $enderecos[$index]['id_endereco'];

    $sqlUpdate = "
        UPDATE endereco 
        SET estado = '$estado', cep = '$cep', numero = '$numero'
        WHERE id_endereco = $idEndereco
    ";

    mysqli_query($conn, $sqlUpdate);

    header("Location: ../AreaCliente/AcessoCliente.php?msg=edit_ok");
    exit;

} else {

    // Inserir novo
    $sqlInsert = "
        INSERT INTO endereco (estado, cep, numero, id_cliente)
        VALUES ('$estado', '$cep', '$numero', $idCliente)
    ";

    mysqli_query($conn, $sqlInsert);

    header("Location: ../AreaCliente/AcessoCliente.php?msg=insert_ok");
    exit;
}
?>
