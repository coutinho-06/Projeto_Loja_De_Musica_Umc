<?php
include "../Database/conexao.php";

// Recebendo dados do formulário
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$valor = $_POST["valor"];

// Pegando a imagem enviada
$imagem = $_FILES["imagem"]; // <-- CORREÇÃO AQUI !!

// Pasta onde a imagem será salva
$pasta = "../IMG/Produtos/";

// Pegando o nome original do arquivo
$nomeArquivo = basename($imagem["name"]);

// Caminho final que será salvo no banco
$caminhoBanco = "IMG/Produtos/" . $nomeArquivo;

// Caminho real para salvar no servidor (com ../)
$caminhoServidor = $pasta . $nomeArquivo;

// Movendo arquivo enviado para a pasta IMG
if (move_uploaded_file($imagem["tmp_name"], $caminhoServidor)) {

    // Inserindo no banco
    $sql = "INSERT INTO instrumento (nome_instrumento, valor, id_categoria, imagem_instrumento)
            VALUES ('$nome', '$valor', '$categoria', '$caminhoBanco')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Produto cadastrado com sucesso!');
                window.location.href = '../AreaAdm/CadastroProdutos.php';
              </script>";
    } else {
        echo "Erro no banco: " . mysqli_error($conn);
    }

} else {
    echo "Erro ao enviar a imagem!";
}

?>
