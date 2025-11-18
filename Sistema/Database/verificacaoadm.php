<?php
//Verificação do ADM

    $vddEmail = "verdadeiroadm@gmail.com";
    $vddSenha = 123;

    if (isset($_POST['email_adm']) && !empty($_POST['email_adm'])){
        $emailAdm = $_POST['email_adm'];
    }else {
        Header("Location: ../TelaLoginAdm.php?errorEmail=Campo 'email' não preenchido!!");
    }

    if (isset($_POST['senha_adm']) && !empty($_POST['senha_adm'])){
        $senhaAdm = $_POST['senha_adm'];
    } else {
        Header("Location: ../TelaLoginAdm.php?errorSenha=Campo 'senha' não preenchido!!");
    }
    
    if(isset($emailAdm) && isset($senhaAdm)) {
        if($emailAdm == $vddEmail && $senhaAdm == $vddSenha) {
            setcookie("id_admin", 1, time() + 3600, "/");
            header("Location: ../AreaAdm/AdmDashboard.php");
            exit;
        } else {
           Header("Location: ../TelaLoginAdm.php?errorAdm=ADM não encontrado!!");
    }}

?>