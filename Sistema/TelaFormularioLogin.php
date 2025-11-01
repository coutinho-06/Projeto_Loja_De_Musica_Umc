<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/Logos/logo-branca.png" type="image/x-icon">
    <title>Login na Groove Sound!</title>


    <!-- links de estilo -->
    <link rel="stylesheet" href="CSS/estiloNavPadrao.css">
    <link rel="stylesheet" href="CSS/estiloTelaFormularioLogin.css">
    <link rel="stylesheet" href="CSS/estiloFooterPadrao.css">

     <!-- link de font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="imagemLogo">
            <img src="IMG/Logos/logo-branca.png">
        </div>
        <div class="linksNav">
            <a href="index.php">Home</a>
        </div>
        <div class="btnNav">
            <button><a class="linkbtn" href="TelaFormularioCadastro.php">Cadastrar</a></button>
            <button class="btndois"><a class="linkbtn" href="TelaFormularioLogin.php">Login</a></button>
        </div>
    </nav>
    <!-- Navbar -->


    <!-- Primeira Sessão -->

<section>
        <form method="POST" action="Database/verificacao.php">
            <div class="caixaTexto">
                <h1>Login</h1>
                <p>Esteja sempre ligado com a gente!</p>
            </div>
            <div class="caixaForm">
                <label for="">E-mail:</label>
                <input type="text" name="email">
                <label for="">Senha:</label>
                <input type="password" name="senha">

                <?php if(isset($_GET['error']) && !empty($_GET['error'])){

                    $mensagem = $_GET['error'];
                    print_r("<span>$mensagem</span>");

                }?>
            </div>

            <div class="caixabtn">
                <button type="submit">ENTRAR</button>
                <a href="TelaFormularioLogin.php">Sem conta? Crie uma!</a>
            </div>
        </form>
    </section>





     <footer>
        <div class="titFooter">
            <h2>GrooveSound</h2>
        </div>
        <div class="containerInfo">
            <div class="atendimento">
                <h3>Entre em contato conosco</h3>
                <ul>
                    <li><p>E-mail: groovesound@gmail.com.br</p></li>
                    <li><p>Telefone: +55 (11) 95991-1839</p></li>
                </ul>
            </div>

            <div class="pagamento">
                <h3>Aceitamos as seguintes formas de pagamento</h3>
                <ul>
                    <li class="iconPagamento"><img src="IMG/Footer/visa.png" alt=""></li>
                    <li class="iconPagamento"><img src="IMG/Footer/boleto.png" alt=""></li>
                    <li class="iconPagamento"><img src="IMG/Footer/pix.png" alt=""></li>
                </ul>
            </div>
            
            <div class="redes">
                <h3>Siga nossas redes</h3>
                <ul>
                    <li><i class="fa-brands fa-facebook"></i></li>
                    <li><i class="fa-brands fa-instagram"></i></li>
                    <li><i class="fa-brands fa-whatsapp"></i></li>
                    <li><i class="fa-brands fa-youtube"></i></li>
                </ul>
            </div>
        </div>

        <div class="autoriaECopy">
            <div class="espaco">

            </div>
            <div class="textCopy">
                <p> &copy GrooveSound 2025 <br>
                Todos os direitos reservados!</p>
            </div>
            <div class="linkAdm">
                <a href="TelaLoginAdm.php">ADM</a>
            </div>
        </div>

    </footer>


    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>
</body>
</html>