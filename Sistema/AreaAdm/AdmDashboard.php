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


    <section>
        <nav>
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
                <a href="../TelaLoginAdm.php">SAIR</a>
            </div>
        </nav>

        <div class="containerParteDados">
            <div class="containerSuperior">
                <h1>Dashboard da Groove Sound</h1>
            </div>
            <div class="containerInferior">
                <div class="caixaGrafico">
                        <div class="titulo">
                            <p>Categoria Mais Procurada </p>
                        </div>
                        <div class="grafico">

                        </div>
                </div>
                <div class="caixaCards">
                    <div class="cards">
                        <div class="titulo">
                            <p>Total de Produtos</p>
                        </div>
                        <div class="caixa">
                             <h2>NUM</h2>  <!--colocar o dados aqui !! -->
                        </div>
                    </div>
                    <div class="cards">
                        <div class="titulo">
                            <p>Total de Vendidos</p>
                        </div>
                        <div class="caixa">
                            <h2>NUM</h2>  <!--colocar o dados aqui !! -->
                        </div>
                    </div>
                    <div class="cards">
                        <div class="titulo">
                            <p>Total de Pedidos</p>
                        </div>
                        <div class="caixa">
                            <h2>NUM</h2>  <!--colocar o dados aqui !! -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







 <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>


    <?php
        $sql = "SELECT primeiro_nome FROM cliente";
        $result = mysqli_query($conn, $sql);

    
</body>
</html>