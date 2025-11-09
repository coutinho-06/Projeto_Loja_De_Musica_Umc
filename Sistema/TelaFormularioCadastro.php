<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/Logos/logo-branca.png" type="image/x-icon">
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
                <label for="Sobrenome">Sobrenome:</label>
                <input type="text" id="Sobrenome" name="Sobrenome">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone">
                <label for="cpf">Cpf:</label>
                <input type="text" max="15" id="cpf" name="cpf">
                <label for="Nasc">Nascimento:</label>
                <input type="date" class="dt" id="Nasc" name="Nasc">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha">
                <label for="confirSenha">Confirmar Senha:</label>
                <input type="password" id="confirSenha" name="confirSenha">
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