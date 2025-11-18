<?php
    include "../Database/conexao.php";

    #Verificando o método da requisição
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        print_r("Por uma questão de segurança, não foi possível fazer a exclusão da conta.");
        die;
    }

    #Verificando autenticidade do cookie
    if (isset($_COOKIE['id_cliente']) && !empty($_COOKIE['id_cliente']) && is_numeric($_COOKIE['id_cliente'])){
        $id = intval($_COOKIE['id_cliente']);
    }else {
        die(print_r("Usuário não autenticado!"));
    }

    #Confirmando se o ID existe no banco
    $verificacao_id = "SELECT id_cliente FROM cliente WHERE id_cliente = '$id'";
    $resultado = mysqli_query($conn, $verificacao_id);
    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
    }else {
        print_r("Exclusão de cadastro não disponível.");
        die;
    }

    #Executando os DELETE's
    $excluir_cliente_endereco = "DELETE FROM endereco WHERE id_cliente = '$id'";
    $resultado_cliente_endereco = mysqli_query($conn, $excluir_cliente_endereco);
    
    $excluir_cliente_compra = "DELETE FROM compra WHERE id_cliente = '$id'";
    $resultado_cliente_compra = mysqli_query($conn, $excluir_cliente_compra);

    $excluir_cliente = "DELETE FROM cliente WHERE id_cliente = '$id'";
    $resultado_excluir_cliente = mysqli_query($conn, $excluir_cliente);
    if (!$resultado_excluir_cliente) {
        die("Erro ao excluir cliente.");
    }

    #Apagando os cookies
    setcookie('id_cliente','',time()-3600,'/');

    #Redirecionando
    header("Location: ../index.php?msg=Exclusão feita com sucesso!");
    exit();
?>