<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/Logos/logo-vinho-sem-fundo.png" type="image/x-icon">
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
        <form method="POST" action="Database/verificacaoadm.php">
            <div class="caixaTexto">
                <p>Seja Bem-vindo<br>Administrador!</p>
            </div>
            <div class="caixaForm">
                <label for="">E-mail:</label>
                <input type="email" name="email_adm" id="email_adm">
                
                <label for="">Senha:</label>
                <input type="password" name="senha_adm" id="senha_adm">

                <?php if(isset($_GET['errorEmail']) && !empty($_GET['errorEmail'])){

                    $mensagem = $_GET['errorEmail'];
                    print_r("<span>$mensagem</span>");

                }?>

                <?php if(isset($_GET['errorSenha']) && !empty($_GET['errorSenha'])){

                    $mensagem = $_GET['errorSenha'];
                    print_r("<span>$mensagem</span>");

                }?>
  
                <?php if(isset($_GET['errorAdm']) && !empty($_GET['errorAdm'])){

                    $mensagem = $_GET['errorAdm'];
                    print_r("<span>$mensagem</span>");

                }?>

            </div>
            

            <div class="caixabtn">
                <button>ENTRAR</button>
            </div>
        </form>
    </section>


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