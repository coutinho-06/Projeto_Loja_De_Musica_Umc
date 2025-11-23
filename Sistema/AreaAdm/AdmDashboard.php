<?php
    include '../Database/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/Logos/logo-vinho-sem-fundo.png" type="image/x-icon">
    <title>Área do Administrador da Groove Sound!</title>


    <!-- links de estilo -->
    <link rel="stylesheet" href="../CSS/adm/estiloMenuAdm.css">
    <link rel="stylesheet" href="../CSS/adm/estiloDashboard.css">
    

     <!-- link de font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


</head>
<body>

    
    <?php
    if (!isset($_COOKIE['id_admin'])) {
        die("Acesso negado. Administrador não autenticado.");
    }

        $id_adm = $_COOKIE['id_admin'];


    #Realizando os SELECTS
    $total_de_produtos = "SELECT COUNT(*) FROM instrumento;";
    $resultado = mysqli_query($conn, $total_de_produtos);
    $resultado = mysqli_fetch_assoc($resultado);

    $total_de_categorias = "SELECT COUNT(*) FROM categoria;";
    $resultado_categoria = mysqli_query($conn, $total_de_categorias);
    $resultado_categoria = mysqli_fetch_assoc($resultado_categoria);

    
    $total_de_cliente = "SELECT COUNT(*) FROM cliente;";
    $resultado_cliente = mysqli_query($conn,  $total_de_cliente);
    $resultado_cliente = mysqli_fetch_assoc( $resultado_cliente);

    $total_de_produtos_pendentes = "SELECT COUNT(*) FROM compra WHERE status_compra = 'pendente';";
    $resultado_pendentes = mysqli_query($conn, $total_de_produtos_pendentes);
    $resultado_pendentes = mysqli_fetch_assoc($resultado_pendentes);

    $total_de_produtos_atendidos = "SELECT COUNT(*) FROM compra WHERE status_compra = 'atendido';";
    $resultado_atendidos = mysqli_query($conn, $total_de_produtos_atendidos);
    $resultado_atendidos = mysqli_fetch_assoc($resultado_atendidos);

    ?>


    <section>
       


        <nav>
             <!-- <button id="btnMenu" class="btnMenu">☰</button> -->
            <div class="saudacaoAdm">
                <h1>Olá, Adm!</h1> 
            </div>
            <div class="containerLinksNavegacao">
                <ul>
                    <li>
                        <a href="AdmDashboard.php">Dashboard</a>
                  
                        <a href="Categorias.php">Categorias</a>
                    
                        <a href="CadastroProdutos.php
                        ">Produtos</a>
                    
                        <a href="Pedidos.php">Pedidos</a>

                        <a href="Atendidos.php">Atendidos</a>
                    </li>
                </ul>
            </div>
            <div class="saidaAdm">
                <a href="../TelaLoginAdm.php">
                    <i class="fa-solid fa-door-closed" style="color: #ffffff;"></i>
                    SAIR
                </a>
            </div>
        </nav>
        

        <div class="containerParteDados">
            <div class="containerSuperior">
                <h1>Dashboard da Groove Sound</h1>
            </div>
            <div class="containerInferior">
                <div class="caixaCards">
                    <div class="cards">
                        <div class="titulo">
                            <p>Total de Produtos</p>
                        </div>
                        <div class="caixa">
                             <h2><?php print_r($resultado['COUNT(*)']); ?></h2>  <!--colocar o dados aqui !! -->
                        </div>
                    </div>
                    <div class="cards">
                        <div class="titulo">
                            <p>Total de Categorias</p>
                        </div>
                        <div class="caixa">
                            <h2><?php print_r($resultado_categoria['COUNT(*)']); ?></h2>  <!--colocar o dados aqui !! -->
                        </div>
                    </div>
                    <div class="cards">
                        <div class="titulo">
                            <p>Total de Clientes</p>
                        </div>
                        <div class="caixa">
                            <h2><?php print_r($resultado_cliente['COUNT(*)']); ?></h2>  <!--colocar o dados aqui !! -->
                        </div>
                    </div>
                    <div class="cards">
                        <div class="titulo">
                            <p>Total de Pedidos</p>
                        </div>
                        <div class="caixa">
                            <h2><?php print_r($resultado_pendentes['COUNT(*)']); ?></h2>  <!--colocar o dados aqui !! -->
                        </div>
                    </div>
                    <div class="cards">
                        <div class="titulo">
                            <p>Total de Atendidos</p>
                        </div>
                        <div class="caixa">
                            <h2><?php print_r($resultado_atendidos['COUNT(*)']); ?></h2>  <!--colocar o dados aqui !! -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>




    <script src="../JS/menu.js"></script>
    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>

    
</body>
</html>