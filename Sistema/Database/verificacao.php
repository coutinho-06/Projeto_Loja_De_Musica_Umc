<?php
    include "conexao.php";

    if (isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
    } else {
        Header("Location: ../TelaFormularioLogin.php?error=Usuário não encontrado!!");
        die;
    }
    if (isset($_POST['senha']) && !empty($_POST['senha'])){
        $senha = $_POST['senha'];
    } else {
        Header("Location: ../TelaFormularioLogin.php?error=Usuário não encontrado!!");
        die;
    } 

    #Buscar usuário certo no banco
    $sql = "SELECT * FROM cliente WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    #Verificar se existe esse email
    if (mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);
    }else {
        header("Location: ../TelaFormularioLogin.php?error=Usuário não encontrado!!");
        die;
    }


    if ($senha == $usuario['senha']) {
        setcookie("id_cliente", $usuario['id_cliente'], time() + 3600, "/");
        header("Location: ../AreaCliente/AcessoCliente.php");
        exit;
    }else {
        print_r("Senha inválida!");
    }

?>