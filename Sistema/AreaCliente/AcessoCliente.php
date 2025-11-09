<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/Logos/logo-branca.png" type="image/x-icon">
    <title>Bem-Vindo a Groove Sound!</title>


    <!-- links de estilo -->
    <link rel="stylesheet" href="../CSS/estiloNavPadrao.css">
    <link rel="stylesheet" href="../CSS/cliente/estiloPerfilCliente.css">
    <link rel="stylesheet" href="../CSS/estiloFooterPadrao.css">

     <!-- link de font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="imagemLogo">
            <img src="../IMG/Logos/logo-branca.png">
        </div>
        <div class="linksNav">
            <a href="../index.php">Home</a>

            <!-- Dropdown -->
            <ul>
                <li>
                    <a href="../TelaProdutos.php"> LOJA </a>
                    <div class="sub-menu">
                        <ul class="sub-menu-ul">
                            <li class="sub-menu-ul-li">
                                <p> Violões & Guitarras </p>                                    
                            </li>

                            <li class="sub-menu-ul-li">
                                <p> Baterias </p> 
                            </li>

                            <li class="sub-menu-ul-li">
                                <p> Teclados & Pianos</p> 
                            </li>

                            <li class="sub-menu-ul-li">
                                <p> Instrumentos p/ Crianças </p> 
                            </li>

                            <li class="sub-menu-ul-li">
                                <p> Flautas & Gaitas </p> 
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <a href="../index.php">Contato</a>
        </div>
        <div class="btnNav">
            <button class="btndois"><a class="linkbtn" href="../index.php">Sair</a></button>
        </div>
    </nav>
    <!-- Navbar -->




    <section>

        <div class="containerSuperior">
            <div class="espaco">

            </div>
            <div class="imgPerfil">
                <img src="../IMG/cleinte.png" alt="">
            </div>
            <div class="nomeCliente">
                <h2>Gabriella Ferreira Alves</h2>
            </div>
        </div>

        <div class="containerMeio">
            <div class="caixaInfo">
                <div class="infosClientes">
                    <ul>
                        <li>Data de Nascimento: {trazer do banco de dados}</li>
                        <li>CPF: {trazer do banco de dados}</li>
                        <li>E-mail: {trazer do banco de dados}</li>
                        <li>Telefone: {trazer do banco de dados}</li>
                    </ul>
                </div>
                <div class="espacoendereco">
                    <div class="btn">
                        <button>
                            <i class="fa-solid fa-house" style="color: #6c0a0a;"></i>
                        </button>
                        <p>Ver Endereço</p>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="containerInferior">
            <div class="linhaBtns">
                <div class="btn">
                    <button>
                        <i class="fa-solid fa-user" style="color: #6c0a0a;"></i>
                    </button>
                    <p>Editar Perfil</p>
                </div>
                <div class="btn">
                    <button>
                        <i class="fa-solid fa-location-dot" style="color: #6c0a0a;"></i>
                    </button>
                    <p>Editar Endereço</p>
                </div>
                <div class="btn">
                    <button>
                        <i class="fa-solid fa-truck" style="color: #6c0a0a;"></i>
                    </button>
                    <p>Ver Pedidos</p>
                </div>
                <div class="btn">
                    <button>
                        <i class="fa-solid fa-xmark" style="color: #6c0a0a;"></i>
                    </button>
                    <p>Deletar Conta</p>
                </div>
            </div>
        </div>
    </section>

    
    









    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>

</body>
</html>