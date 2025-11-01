<?php
//Verificação do ADM

    $vddEmail = "verdadeiroadm@gmail.com";
    $vddSenha = 123;
    if (isset($_POST['email_adm']) && !empty($_POST['email_adm'])){
        $emailAdm = $_POST['email_adm'];
    } else {
        echo("Campo 'email' não preenchido!");
    }
    if (isset($_POST['senha_adm']) && !empty($_POST['senha_adm'])){
        $senhaAdm = $_POST['senha_adm'];
    } else {
        echo("Campo 'senha' não preenchido!");
    }

    if (($emailAdm = $vddEmail) && ($senhaAdm = $vddSenha)) {
        Header("Location: ../AreaAdm/AdmDashboard.php");
    }else {
        print_r("Usuário ou senha incorretos!");
    }

?>