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
        <form method="" action="">
            <div class="caixaTexto">
                <h1>CADASTRO</h1>
                <p>Esteja sempre ligado com a gente!</p>
            </div>
            <div class="caixaForm">
                <label for="">Nome:</label>
                <input type="text" id="" name="">
                <label for="">Sobrenome:</label>
                <input type="text" id="" name="">
                <label for="">Telefone:</label>
                <input type="text" id="" name="">
                <label for="">Cpf:</label>
                <input type="text" id="" name="">
                <label for="">cep:</label>
                <input type="text" id="" name="">
                <div class="caixaInputNum">
                    <label for="">Número:</label>
                    <input type="Number" min="0" class="num" id="" name="">
                </div>
                
                <label for="">Estados:</label>
                <div class="custom-select">
                    <div class="select-btn" id="selectBtn">Selecione</div>
                    <div class="options" id="optionsList">
                        <div class="#">Selecione</div>
                        <div class="option">AC</div>
                        <div class="option">AL</div>
                        <div class="option">AP</div>
                        <div class="option">AM</div>
                        <div class="option">BA</div>
                        <div class="option">CE</div>
                        <div class="option">DF</div>
                        <div class="option">ES</div>
                        <div class="option">GO</div>
                        <div class="option">MA</div>
                        <div class="option">MT</div>
                        <div class="option">MS</div>
                        <div class="option">MG</div>
                        <div class="option">PA</div>
                        <div class="option">PB</div>
                        <div class="option">PR</div>
                        <div class="option">PE</div>
                        <div class="option">PI</div>
                        <div class="option">RJ</div>
                        <div class="option">RN</div>
                        <div class="option">RS</div>
                        <div class="option">RO</div>
                        <div class="option">RR</div>
                        <div class="option">SC</div>
                        <div class="option">SP</div>
                        <div class="option">SE</div>
                        <div class="option">TO</div>
                    </div>
                </div>

                <label for="">Data de Nascimento:</label>
                <input type="date" class="dt" id="" name="">
                <label for="">E-mail:</label>
                <input type="text" id="" name="">
                <label for="">Senha:</label>
                <input type="password" id="" name="">
                <label for="">Confirmar Senha:</label>
                <input type="password" id="" name="">
            </div>

            <div class="caixabtn">
                <button type="submit">CADASTRAR-ME</button>
                <a href="#">Já tem conta? Entre!</a>
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



    <script>
        
        const selectBtn = document.getElementById('selectBtn');
        const optionsList = document.getElementById('optionsList');
        const options = document.querySelectorAll('.option');

        selectBtn.addEventListener('click', () => {
        optionsList.style.display = optionsList.style.display === 'block' ? 'none' : 'block';
        });

        options.forEach(option => {
        option.addEventListener('click', () => {
            selectBtn.textContent = option.textContent;
            optionsList.style.display = 'none';
        });
        });

        window.addEventListener('click', (e) => {
        if (!e.target.closest('.custom-select')) {
            optionsList.style.display = 'none';
        }
        });
</script>


    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>
</body>
</html>