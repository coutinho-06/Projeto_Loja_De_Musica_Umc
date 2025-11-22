<?php
include "../Database/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];

    if (!empty($id)) {

        $sql = "DELETE FROM categoria WHERE id_categoria = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: Categorias.php");
            exit;
        } else {
            echo "Erro ao excluir categoria!";
        }

    } else {
        echo "ID inválido!";
    }
}
?>
