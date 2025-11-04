<?php
    include "conexao.php";


    // fazer validações

    if (isset($_POST['nome']) && !empty($_POST['nome'])){
        $Nome = $_POST['nome'];
    } else {
        echo("Campo 'nome' não preenchido!");
    }
    if (isset($_POST['Sobrenome']) && !empty($_POST['Sobrenome'])){
        $Sobrenome = $_POST['Sobrenome'];
    } else {
        echo("Campo 'Sobrenome' não preenchido!");
    }
    if (isset($_POST['telefone']) && !empty($_POST['telefone'])){
        $Telefone = $_POST['telefone'];
    } else {
        echo("Campo 'Telefone' não preenchido!");
    }
    if (isset($_POST['cpf']) && !empty($_POST['cpf'])){
        $Cpf = $_POST['cpf'];
    } else {
        echo("Campo 'CPF' não preenchido!");
    }
    if (isset($_POST['Nasc']) && !empty($_POST['Nasc'])){
        $Dt_Nasc = $_POST['Nasc'];
    } else {
        echo("Campo 'Data de Nascimento' não preenchido!");
    }
    if (isset($_POST['email']) && !empty($_POST['email'])){
        $Email = $_POST['email'];
    } else {
        echo("Campo 'email' não preenchido!");
    }
    if (isset($_POST['senha']) && !empty($_POST['senha'])){
        $Senha = $_POST['senha'];
    } else {
        echo("Campo 'senha' não preenchido!");
    }
    if (isset($_POST['confirSenha']) && !empty($_POST['confirSenha'])){
        $Confir_Senha = $_POST['confirSenha'];
    } else {
        echo("Campo 'Confirmar Senha' não preenchido!");
    }

    if ($Senha != $Confir_Senha) {
        die("Senhas não coincidentes! " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO cliente(primeiro_nome,segundo_nome,data_nascimento,cpf,email,senha,telefone) VALUES ('$Nome','$Sobrenome','$Dt_Nasc','$Cpf','$Email','$Senha','$Telefone')";
    if (mysqli_query($conn,$sql)) {
        print_r("Registro inserido com sucesso!! <br> <a href='../TelaFormularioLogin.php'>Voltar</a>");

    }else {
        print_r("Erro ao inserir o registro!!" . mysqli_error($conn));
    }
    

?>