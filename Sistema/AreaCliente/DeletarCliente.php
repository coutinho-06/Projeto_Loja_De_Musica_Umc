<?php
    include "conexao.php";

    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        print_r("Por uma questão de segurança, não foi possível fazer a exclusão da conta.");
    }

    if (isset($_COOKIE['id_cliente']) && !empty($_COOKIE['id_cliente'])) {
        $id = $_COOKIE['id_cliente'];
    }else {
        die(print_r("Usuário não autenticado!"));
    }

    

?>