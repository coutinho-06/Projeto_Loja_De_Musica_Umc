<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/Logos/logo-vinho-sem-fundo.png" type="image/x-icon">
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
                
                <?php if(isset($_GET['errorEmail']) && !empty($_GET['errorEmail'])){

                    $mensagem = $_GET['errorEmail'];
                    print_r("<span>$mensagem</span>");

                    }?>
                <label for="">Senha:</label>
                <input type="password" name="senha">


                <?php if(isset($_GET['errorSenha']) && !empty($_GET['errorSenha'])){

                    $mensagem = $_GET['errorSenha'];
                    print_r("<span>$mensagem</span>");

                }?>

                <?php if(isset($_GET['error']) && !empty($_GET['error'])){

                    $mensagem = $_GET['error'];
                    print_r("<span>$mensagem</span>");

                }?>
            </div>

            <div class="caixabtn">
                <button type="submit">ENTRAR</button>
                <a href="TelaFormularioCadastro.php">Sem conta? Crie uma!</a>
            </div>
        </form>
    </section>







    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>
</body>
</html>