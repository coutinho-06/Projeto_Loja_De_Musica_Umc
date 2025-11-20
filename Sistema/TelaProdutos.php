<?php
    include "Database/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/Logos/logo-vinho-sem-fundo.png" type="image/x-icon">    
    <title>Bem-Vindo a Groove Sound!</title>


    <!-- links de estilo -->
    <link rel="stylesheet" href="CSS/estiloNavPadrao.css">
    <link rel="stylesheet" href="CSS/estiloTelaProdutos.css">
    <link rel="stylesheet" href="CSS/estiloFooterPadrao.css">

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
            <img src="IMG/Logos/logo-branca.png">
        </div>
        <div class="linksNav">
            <a href="#home">Home</a>
            <a href="#sobre">Sobre</a>

            <!-- Dropdown -->
            <ul>
                <li>
                    <a href="TelaProdutos.php"> LOJA </a>
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
            <a href="#">Contato</a>
        </div>
        <div class="btnNav">
            <button><a class="linkbtn" href="TelaFormularioCadastro.php">Cadastrar</a></button>
            <button class="btndois"><a class="linkbtn" href="TelaFormularioLogin.php">Login</a></button>
        </div>
    </nav>
    <!-- Navbar -->






<div class="containerGlobal">

<p>Bem-vindo !!</p>
    <!-- mais vendidos Sessão -->
    <?php
        $sql = "SELECT id_instrumento, nome_instrumento, valor, imagem_instrumento FROM instrumento";

        $result = mysqli_query($conn, $sql);
        
    ?>

    <section class="SegundaSessao">
        <h1>Mais Vendidos</h1>


        <div class="caixaCarrossel">
            <button class="btn" id="voltar"> < </button>

            <div class="carrossel">
                

                <div class="conteinerCard">
                    <?php while($linha = mysqli_fetch_assoc($result)) { ?>
                        <div class="card" data-id="<?= $linha['id_instrumento'] ?>">

                            <img src="<?= $linha['imagem_instrumento'] ?>" alt="<?= $linha['nome_instrumento'] ?>">
                            <div class="cardText">
                                <p><?= $linha['nome_instrumento'] ?></p>
                                <p>R$ <?= number_format($linha['valor'], 2, ',', '.') ?></p>
                            </div>
                        
                        </div>
                    <?php } ?>
                </div>

            
            </div>

            <button class="btn" id="avancar">></button>
        </div>


    </section>



    <!-- Acessorios Sessão -->

    <section class="SegundaSessao">
        <h1>Acessórios</h1>

        <?php
            $sql2 = "SELECT * FROM instrumento WHERE id_categoria = '14'";
            $acessorios = mysqli_query($conn, $sql2);

        ?>
        
        <div class="caixaCarrossel">
            <button class="btn" id="voltar"> < </button>

            <div class="carrossel">

                <div class="conteinerCard">
                    <?php while($linha = mysqli_fetch_assoc($acessorios)) { ?>
                    <div class="card" data-id="<?= $linha['id_instrumento'] ?>">
                        <img src="<?= $linha['imagem_instrumento'] ?>" alt="<?= $linha['nome_instrumento'] ?>">
                        <div class="cardText">
                            <p><?= $linha['nome_instrumento'] ?></p>
                            <p>R$ <?= number_format($linha['valor'], 2, ',', '.') ?></p>
                        </div>
                        </div>
                        <?php } ?>
                </div>

            
            </div>

            <button class="btn" id="avancar">></button>
        </div>
    </section>












</div>


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













    


        <!-- MODAL 1 — DETALHES DO PRODUTO -->
    <div id="modalDetalhes" class="modal">
        <div class="modal-content">

            <span class="fechar" onclick="fecharModais()">&times;</span>

            <div class="caixa-modal">
                <img id="modal-img" src="" alt="Produto">
                <h2 id="modal-nome"></h2>
                <p id="modal-valor"></p>
            

                <button class="btnPedido" onclick="abrirModalPedido()">Fazer Pedido</button>
            </div>
        </div>
    </div>


    <!-- MODAL 2 — PEDIDO -->
    <div id="modalPedido" class="modal">
        <div class="modal-content">
            <span class="fechar" onclick="fecharModais()">&times;</span>

            <h2>Finalizar Pedido</h2>

            <form action="FinalizarPedido.php" method="POST">

                <input type="hidden" name="produto_id" id="pedido-id">

                <div class="caixa-inp">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" min="1" required>
                 </div>      

                <div class="caixa-inp">
                    <label>Forma de Pagamento:</label>
                    <select name="pagamento" required>
                        <option value="">Selecione</option>
                        <option>Pix</option>
                        <option>Cartão de Crédito</option>
                        <option>Boleto</option>
                    </select>
                </div>

                <div class="caixa-inp">
                    <label>Endereço de Entrega:</label>
                    <select name="endereco" id="select-endereco" required>
                        <option value="">Carregando...</option>
                    </select>
                </div>

                <button type="submit" class="btnConfirmar">Confirmar Pedido</button>
            </form>

        </div>
    </div>





    <script>
        const modalDetalhes = document.getElementById("modalDetalhes");
        const modalPedido = document.getElementById("modalPedido");

        const modalImg = document.getElementById("modal-img");
        const modalNome = document.getElementById("modal-nome");
        const modalValor = document.getElementById("modal-valor");
        const pedidoId = document.getElementById("pedido-id");

        // Quando clicar no card → abrir modal com informações
        document.querySelectorAll(".card").forEach(card => {
            card.addEventListener("click", () => {

                let img = card.querySelector("img").src;
                let nome = card.querySelector(".cardText p:nth-child(1)").innerText;
                let valor = card.querySelector(".cardText p:nth-child(2)").innerText;

                modalImg.src = img;
                modalNome.innerText = nome;
                modalValor.innerText = valor;

                pedidoId.value = card.dataset.id; // O ID virá no data-atribute

                modalDetalhes.style.display = "flex";
            });
        });

        function abrirModalPedido() {
            modalDetalhes.style.display = "none";
            carregarEnderecos();
            modalPedido.style.display = "flex";
        }

        function fecharModais() {
            modalDetalhes.style.display = "none";
            modalPedido.style.display = "none";
        }

        // Carregar endereços do usuário (AJAX)
        function carregarEnderecos() {
            fetch("Database/buscar_enderecos.php")
            .then(r => r.json())
            .then(dados => {
                const select = document.getElementById("select-endereco");
                select.innerHTML = "<option value=''>Selecione</option>";

                dados.forEach(e => {
                    select.innerHTML += `
                        <option value="${e.id_endereco}">
                            Nº ${e.numero} - ${e.cep} - ${e.estado}
                        </option>`;
                });
            });
        }






        const conteudo = document.querySelector(".conteinerCard");
        const cards = document.querySelectorAll(".conteinerCard .card");
        const voltar = document.getElementById("voltar");
        const avancar = document.getElementById("avancar");

        let index = 0;
        const cardLargura = 300 + 70; // largura + gap
        const total = cards.length;

        voltar.onclick = () => {
            index = index > 0 ? index - 1 : total - 1;
            conteudo.style.transform = `translateX(-${index * cardLargura}px)`;
        };

        avancar.onclick = () => {
            index = index < total - 1 ? index + 1 : 0;
            conteudo.style.transform = `translateX(-${index * cardLargura}px)`;
        };


    </script>





    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>
</body>
</html>