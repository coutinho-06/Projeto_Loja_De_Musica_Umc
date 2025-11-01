<?php
    include "conexao.php";

    $email = $_POST['email'];   
    $senha = $_POST['senha'];   
    

    $sql = "SELECT * FROM cliente WHERE email = '$email' ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0 ) {

        //Essa função serve para transformar o objeto de banco de dados em um objeto PHP para que possamos acessar os dados que estão dentro do Array.
        $result = mysqli_fetch_assoc($result);

        # verificação de senha com base no que retornou
        Header("Location: ../AreaCliente/AcessoCliente.php");
    }else {
        
        Header("Location: ../TelaFormularioLogin.php?error=Usuário não encontrado!!");
    }


    //está entrando sem a senha correta









?>