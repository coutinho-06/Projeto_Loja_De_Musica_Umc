<?php
include "../Database/conexao.php";

// Recebendo dados do formulário
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$valor = $_POST["valor"];

// Pasta onde a imagem será salva
$pasta = "../IMG/Instrumentos/";

// Pegando o nome original do arquivo
$nomeArquivo = basename($_FILES["imagem"]["name"]);

// Caminho final que será salvo no banco (sem o ../)
$caminhoBanco = "IMG/Instrumentos/" . $nomeArquivo;

// Caminho real para salvar no servidor
$caminhoServidor = $pasta . $nomeArquivo;

// Movendo arquivo enviado para a pasta IMG
if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoServidor)) {

    // Inserindo no banco
    $sql = "INSERT INTO instrumento (nome_instrumento, valor, id_categoria, imagem_instrumento) 
            VALUES ('$nome', '$valor', '$categoria', '$caminhoBanco')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Produto cadastrado com sucesso!');
                window.location.href = 'CadastroProdutos.php';
              </script>";
    } else {
        echo "Erro no banco: " . mysqli_error($conn);
    }

} else {
    echo "Erro ao enviar a imagem!";
}

?>
