<?php
    include "../Database/conexao.php";

    $categoria = $_POST["categoria"];

    // Verifica se está vazio
    if (empty($categoria)) {
        echo "<script>
                alert('Digite um nome para a categoria!');
                window.location.href = 'Categorias.php';
            </script>";
        exit;
    }

    $sql = "INSERT INTO categoria (categoria) VALUES ('$categoria')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Categoria cadastrada com sucesso!');
                window.location.href = 'Categorias.php';
            </script>";
    } else {
        echo "Erro ao cadastrar categoria: " . mysqli_error($conn);
    }
?>
