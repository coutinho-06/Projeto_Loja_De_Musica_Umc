<?php
    include "../Database/conexao.php";

    $id = $_POST["id_pedido"];

    $sql = "UPDATE compra SET status = 'atendido' WHERE id_compra = $id";

    if(mysqli_query($conn, $sql)){
        echo "ok";
    } else {
        echo "erro";
    }
    
?>
