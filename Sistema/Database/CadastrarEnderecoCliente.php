<?php
    include "conexao.php";
    
    $numR = $_POST['numR'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];

    
    $sql = "INSERT INTO endereco(estado,cep,numero) VALUES ('$estado','$cep','$numR')";
    if (mysqli_query($conn,$sql)) {
        echo("
                
                ");

    }else {
        Header("Location: ../AreaCliente/AcessoCliente.php?errorR=Erro ao inserir o registro!!!". mysqli_error($conn));
    }

    

?>