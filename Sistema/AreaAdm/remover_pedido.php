<?php
include "../Database/conexao.php";

if(isset($_POST['id_pedido'])){
    $id = intval($_POST['id_pedido']);
    
    // Deleta o pedido da tabela compra
    $sql = "DELETE FROM compra WHERE id_compra=$id";
    
    if($conn->query($sql)){
        echo "ok";
    } else {
        echo "erro";
    }
} else {
    echo "erro";
}
?>
