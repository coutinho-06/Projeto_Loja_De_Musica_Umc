<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/Logos/logo-vinho-sem-fundo.png" type="image/x-icon">
    <title>Cadastro na Groove Sound!</title>


    <!-- links de estilo -->
    <link rel="stylesheet" href="CSS/estiloNavPadrao.css">
    <link rel="stylesheet" href="CSS/estiloTelaFormularioCadastro.css">
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
        <form method="post" action="Database/Cadastrar.php">
            <div class="caixaTexto">
                <h1>CADASTRO</h1>
                <p>Esteja sempre ligado com a gente!</p>
            </div>
            <div class="caixaForm">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome">
                
                <?php if(isset($_GET['errorN']) && !empty($_GET['errorN'])){

                    $mensagem = $_GET['errorN'];
                    print_r("<span>$mensagem</span>");

                }?>

                <label for="Sobrenome">Sobrenome:</label>
                <input type="text" id="Sobrenome" name="Sobrenome">
                <?php if(isset($_GET['errorSN']) && !empty($_GET['errorSN'])){

                    $mensagem = $_GET['errorSN'];
                    print_r("<span>$mensagem</span>");

                }?>


                <label for="telefone">Telefone:</label>
                <input type="number" id="telefone" name="telefone">
<<<<<<< Updated upstream
                <?php if(isset($_GET['errorT']) && !empty($_GET['errorT'])){

                    $mensagem = $_GET['errorT'];
                    print_r("<span>$mensagem</span>");

                }?>

=======
>>>>>>> Stashed changes
                <label for="cpf">Cpf:</label>
                <input type="text" max="15" id="cpf" name="cpf">
                <?php if(isset($_GET['errorCpf']) && !empty($_GET['errorCpf'])){

                    $mensagem = $_GET['errorCpf'];
                    print_r("<span>$mensagem</span>");

                }?>

                <label for="Nasc">Nascimento:</label>
                <input type="date" class="dt" id="Nasc" name="Nasc">
                <?php if(isset($_GET['errorDt']) && !empty($_GET['errorDt'])){

                    $mensagem = $_GET['errorDt'];
                    print_r("<span>$mensagem</span>");

                }?>

                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email">
                <?php if(isset($_GET['errorEma']) && !empty($_GET['errorEma'])){

                    $mensagem = $_GET['errorEma'];
                    print_r("<span>$mensagem</span>");

                }?>
               

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha">
                <?php if(isset($_GET['errorse']) && !empty($_GET['errorse'])){

                    $mensagem = $_GET['errorse'];
                    print_r("<span>$mensagem</span>");

                }?>
                <label for="confirSenha">Confirmar Senha:</label>
                <input type="password" id="confirSenha" name="confirSenha">
                <?php if(isset($_GET['errorseC']) && !empty($_GET['errorseC'])){

                    $mensagem = $_GET['errorseC'];
                    print_r("<span>$mensagem</span>");

                }?>
            </div>

            <div class="caixabtn">
                <button type="submit" href="TelaFormularioLogin.php">CADASTRAR-ME</button>
                <a href="TelaFormularioLogin.php">Já tem conta? Entre!</a>
            </div>

        </form>


    </section>


    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>
</body>
</html>