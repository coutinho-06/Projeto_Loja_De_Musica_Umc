<?php
    include "conexao.php";

    $numR = $_POST['numR'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];


    function EditarEndereco($sql,$numR,$cep,$estado){

        $sql = "INSERT INTO endereco() VALUES ()";
        if (mysqli_query($conn,$sql)) {
            print_r("deu certo hihihihi");

        }else {
            print_r("Erro ao inserir o registro!!" . mysqli_error($conn));
        }
}
    

?>