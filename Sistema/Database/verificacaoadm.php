<?php
//Verificação do ADM

    $vddEmail = "verdadeiroadm@gmail.com";
    $vddSenha = 123;
    if (isset($_POST['email_adm']) && !empty($_POST['email_adm'])){
        $emailAdm = $_POST['email_adm'];
        if ($emailAdm != $vddEmail) {
            print_r("Email incorreto!<br>");
        }
    }

    if (isset($_POST['senha_adm']) && !empty($_POST['senha_adm'])){
        $senhaAdm = $_POST['senha_adm'];
        if (($senhaAdm != $vddSenha)) {
            print_r("Senha incorreta!<br>");
        } else {
            echo("Campo 'senha' não preenchido!<br>");
        }
    }
    if (($emailAdm == $vddEmail) && ($senhaAdm == $vddSenha)) {
        Header("Location: ../AreaAdm/AdmDashboard.php");
    }


?>