<?php
include "../Database/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $categoria = $_POST['categoria'];

    if (!empty($id) && !empty($nome) && !empty($valor) && !empty($categoria)) {

        // Verifica se uma nova imagem foi enviada
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $imagem = $_FILES['imagem'];
            $pasta = "../IMG/Produtos/";
            $nomeArquivo = time() . "_" . preg_replace("/\s+/", "_", basename($imagem['name']));
            $caminhoBanco = "IMG/Produtos/" . $nomeArquivo; // o que vai pro banco
            $caminhoServidor = "../" . $caminhoBanco; // o caminho real no servidor

            if (move_uploaded_file($imagem['tmp_name'], $caminhoServidor)) {
                // Deleta imagem antiga
                $sqlOld = "SELECT imagem_instrumento FROM instrumento WHERE id_instrumento = ?";
                $stmtOld = $conn->prepare($sqlOld);
                $stmtOld->bind_param("i", $id);
                $stmtOld->execute();
                $result = $stmtOld->get_result();
                $produto = $result->fetch_assoc();
                if ($produto && file_exists("../".$produto['imagem_instrumento'])) {
                    unlink("../".$produto['imagem_instrumento']);
                }

                $sql = "UPDATE instrumento SET nome_instrumento=?, valor=?, id_categoria=?, imagem_instrumento=? WHERE id_instrumento=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sdisi", $nome, $valor, $categoria, $caminhoBanco, $id);
            }
        } else {
            $sql = "UPDATE instrumento SET nome_instrumento=?, valor=?, id_categoria=? WHERE id_instrumento=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sdii", $nome, $valor, $categoria, $id);
        }

        if ($stmt->execute()) {
            header("Location: CadastroProdutos.php?status=editado");
            exit;
        } else {
            echo "Erro ao editar produto!";
        }
    } else {
        echo "Todos os campos devem ser preenchidos!";
    }
}
?>
