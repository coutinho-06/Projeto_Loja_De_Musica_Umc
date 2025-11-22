<?php
include "../Database/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $id = $_POST["id"];
    $nome = $_POST["categoria"];

    if (!empty($id) && !empty($nome)) {

        $sql = "UPDATE categoria SET categoria = ? WHERE id_categoria = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $nome, $id);

        if ($stmt->execute()) {
            header("Location: Categorias.php");
            exit;
        } else {
            echo "Erro ao editar categoria!";
        }

    } else {
        echo "Dados inválidos!";
    }
}
?>
