<?php
    include "../Database/conexao.php";

    #Verificando o ID do cliente
    if (!isset($_COOKIE['id_cliente']) || empty($_COOKIE['id_cliente'])) {
        die("Erro de segurança: usuário não autenticado.");
    }
    $id = $_COOKIE['id_cliente'];

    #Array que vai armazenar os campos que serão atualizados
    $campos = [];

    #Para cada campo, só adiciona no array se estiver preenchido, usando arrays associativos
    if (!empty($_POST['nome'])) {
        $nome = $_POST['nome'];
        $campos[] = "primeiro_nome = '$nome'";
    }

    if (!empty($_POST['Sobrenome'])) {
        $sobrenome = $_POST['Sobrenome'];
        $campos[] = "segundo_nome = '$sobrenome'";
    }

    if (!empty($_POST['telefone'])) {
        $telefone = $_POST['telefone'];
        $campos[] = "telefone = '$telefone'";
    }

    if (!empty($_POST['cpf'])) {
        $cpf = $_POST['cpf'];
        $campos[] = "cpf = '$cpf'";
    }

    if (!empty($_POST['Nasc'])) {
        $nasc = $_POST['Nasc'];
        $campos[] = "data_nascimento = '$nasc'";
    }

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        $campos[] = "email = '$email'";
    }

    #Validação de senha
    $senha = $_POST['senha'] ?? "";
    $confSenha = $_POST['confirSenha'] ?? "";

    if (!empty($senha) || !empty($confSenha)) {

        # Se um dos dois está vazio: erro
        if (empty($senha) || empty($confSenha)) {
            die("Preencha senha e confirmação.");
        }

        # Se são diferentes
        if ($senha !== $confSenha) {
            die("Senhas não coincidem.");
        }

        $campos[] = "senha = '$senha'";
    }

    #Verificando se algum campo foi alterado
    if (count($campos) == 0) {
        die("Nenhum campo foi alterado.");
    }

    #Preparando os dados pra enviar pro SQL
    $set = implode(", ", $campos);

    #Update Dinâmico
    $sql = "UPDATE cliente SET $set WHERE id_cliente = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Alteração realizada com sucesso!');
            window.location.href = 'AcessoCliente.php';
        </script>";
    } else {
        die("Erro ao atualizar: " . mysqli_error($conn));
    }
?>