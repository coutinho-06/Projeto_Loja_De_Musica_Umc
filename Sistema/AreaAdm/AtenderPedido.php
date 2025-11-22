<?php
include "../Database/conexao.php";

if(isset($_POST['id_pedido'])){
    $id = intval($_POST['id_pedido']);

    $sql = "UPDATE compra SET status_compra='atendido' WHERE id_compra=$id";
    if($conn->query($sql)){
        echo "ok";  // precisa ser exatamente isso
    } else {
        echo "erro: " . $conn->error;  // ajuda a descobrir o que deu errado
    }
} else {
    echo "erro: id não enviado";
}
