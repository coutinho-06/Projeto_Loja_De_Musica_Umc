<?php
    include "conexao.php";


    // fazer validações

    if (isset($_POST['nome']) && !empty($_POST['nome'])){
        $Nome = $_POST['nome'];
    } else {
        Header("Location: ../TelaFormularioCadastro.php?errorN=Campo 'nome' não preenchido!!");
        die;
    }
    if (isset($_POST['Sobrenome']) && !empty($_POST['Sobrenome'])){
        $Sobrenome = $_POST['Sobrenome'];
    } else {
        Header("Location: ../TelaFormularioCadastro.php?errorSN=Campo 'Sobrenome' não preenchido!!");
        
        die;
    }
    if (isset($_POST['telefone']) && !empty($_POST['telefone'])){
        $Telefone = $_POST['telefone'];
    } else {
        Header("Location: ../TelaFormularioCadastro.php?errorT=Campo 'Telefone' não preenchido!!");
       
        die;
    }
    if (isset($_POST['cpf']) && !empty($_POST['cpf'])){
        $Cpf = $_POST['cpf'];
    } else {
        Header("Location: ../TelaFormularioCadastro.php?errorCpf=Campo 'CPF' não preenchido!!");
        die;
    }
    if (isset($_POST['Nasc']) && !empty($_POST['Nasc'])){
        $Dt_Nasc = $_POST['Nasc'];
    } else {
        Header("Location: ../TelaFormularioCadastro.php?errorDt=Campo 'Data de Nascimento' não preenchido!!");
        die;
    }
    if (isset($_POST['email']) && !empty($_POST['email'])){
        $Email = $_POST['email'];
    } else {
        Header("Location: ../TelaFormularioCadastro.php?errorEma=Campo 'email' não preenchido!!");
        die;
    }
    if (isset($_POST['senha']) && !empty($_POST['senha'])){
        $Senha = $_POST['senha'];
    } else {
        Header("Location: ../TelaFormularioCadastro.php?errorse=Campo 'senha' não preenchido!!");
        die;
    }
    if (isset($_POST['confirSenha']) && !empty($_POST['confirSenha'])){
        $Confir_Senha = $_POST['confirSenha'];
    } else {
        Header("Location: ../TelaFormularioCadastro.php?errorseC=Campo 'Confirmar Senha' não preenchido!!");
        die;
    }

    if ($Senha != $Confir_Senha) {
        Header("Location: ../TelaFormularioCadastro.php?errorcon=Senhas não coincidentes!!");
        die("Senhas não coincidentes! " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO cliente(primeiro_nome,segundo_nome,data_nascimento,cpf,email,senha,telefone) VALUES ('$Nome','$Sobrenome','$Dt_Nasc','$Cpf','$Email','$Senha','$Telefone')";
    if (mysqli_query($conn,$sql)) {
        echo "<script>
            alert('Cadastro realizado com sucesso!');
            window.location.href = '../TelaFormularioLogin.php';
        </script>";

        
        

    }else {
        print_r("Erro ao inserir o registro!!" . mysqli_error($conn));
    }
    

?>