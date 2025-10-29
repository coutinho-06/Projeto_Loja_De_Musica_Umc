<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/Logos/logo-branca.png" type="image/x-icon">
    <title>Bem-vindo Administrador na Groove Sound!</title>


    <!-- links de estilo -->
    <link rel="stylesheet" href="CSS/estiloNavPadrao.css">
    <link rel="stylesheet" href="CSS/estiloTelaFormularioLogin.css">
    <link rel="stylesheet" href="CSS/estiloTelaLoginAdm.css">

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
        <form method="" action="">
            <div class="caixaTexto">
                <p>Seja Bem-vindo<br>Administrador!</p>
            </div>
            <div class="caixaForm">
                <label for="">E-mail:</label>
                <input type="text">
                <label for="">Senha:</label>
                <input type="password">
            </div>

            <div class="caixabtn">
                <button onclick="irParaPagina()">ENTRAR</button>
            </div>
        </form>
    </section>

    <!-- <script>
        function irParaPagina() {
            window.location.;
        }
    </script> -->




     <footer>
        <div class="autoriaECopy">
            <div class="textCopy">
                <p> &copy GrooveSound 2025 <br>
                Todos os direitos reservados!</p>
            </div>
        </div>

    </footer>


    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>
</body>
</html>