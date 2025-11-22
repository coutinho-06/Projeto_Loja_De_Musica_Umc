<?php
include "../Database/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    if (!empty($id)) {
        // Pegar caminho da imagem
        $sqlImg = "SELECT imagem_instrumento FROM instrumento WHERE id_instrumento=?";
        $stmtImg = $conn->prepare($sqlImg);
        $stmtImg->bind_param("i", $id);
        $stmtImg->execute();
        $result = $stmtImg->get_result();
        $produto = $result->fetch_assoc();

        if ($produto && !empty($produto['imagem_instrumento']) && file_exists("../".$produto['imagem_instrumento'])) {
            unlink("../".$produto['imagem_instrumento']);
        }

        // Deletar do banco
        $sql = "DELETE FROM instrumento WHERE id_instrumento=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: CadastroProdutos.php?status=excluido");
            exit;
        } else {
            echo "Erro ao excluir produto!";
        }
    } else {
        echo "ID inválido!";
    }
}
?>
