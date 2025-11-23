<?php
    include "../Database/conexao.php";
    $id = $_COOKIE['id_cliente'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/Logos/logo-vinho-sem-fundo.png" type="image/x-icon">
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
        <?php

            $sql = "SELECT 
                cl.id_cliente as IdCLiente,
                cl.primeiro_nome AS Cliente,
                cl.segundo_nome AS Sobrenome,
                cl.data_nascimento AS data_nascimento,
                cl.cpf AS CPF,
                cl.email as Email,
                cl.telefone AS telefone,
                en.cep AS Cep,
                en.numero AS Numero,
                en.estado AS Estado
            FROM 
                cliente AS cl
            LEFT JOIN
             endereco AS en ON cl.id_cliente = en.id_cliente
            WHERE cl.id_cliente = $id";
            
            $result = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($result);

        

            $sqlEnd = "
                SELECT * FROM endereco 
                WHERE id_cliente = $id 
                ORDER BY id_endereco ASC 
                LIMIT 3
            ";

            $resEnd = mysqli_query($conn, $sqlEnd);

            $enderecos = [];
            while ($row = mysqli_fetch_assoc($resEnd)) {
                $enderecos[] = $row;
            }

            /* Preenche posições vazias com NULL */
            for ($i = 0; $i < 3; $i++) {
                if (!isset($enderecos[$i])) {
                    $enderecos[$i] = null;
                }
            }


                
        ?>


        <div class="containerSuperior">
            <div class="espaco">

            </div>
            <div class="imgPerfil">
                <img src="../IMG/Logos/logo-img-vinho.png" alt="">
            </div>
            <div class="nomeCliente">
                <h2><?php print_r($result['Cliente'] . " " . $result['Sobrenome']); ?></h2>
            </div>
        </div>


        <div class="containerMeio">
            <div class="caixaInfo">
                <div class="infosClientes">
                    <ul>
                        <li>Data de Nascimento: <?php print_r($result['data_nascimento']); ?></li>
                        <li>CPF: <?php print_r($result['CPF']); ?></li>
                        <li>E-mail: <?php print_r($result['Email']); ?></li>
                        <li>Telefone: <?php print_r($result['telefone']); ?></li>
                    </ul>
                </div>
                <div class="espacoendereco">
                    <div class="btn">
                        <button onclick="abrirModal('meuEndereco')">
                            <i class="fa-solid fa-house" style="color: #6c0a0a;"></i>
                        </button>
                        <p>Ver Endereços</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="containerInferior">

            <!-- BOTÕES -->
            <div class="linhaBtns">
                <div class="btn">
                    <button onclick="abrirModal('perfil')"><i class="fa-solid fa-user" style="color: #6c0a0a;"></i></button>
                    <p>Editar Perfil</p>
                </div>
                <div class="btn">
                    <button onclick="abrirModal('endereco')"><i class="fa-solid fa-location-dot" style="color: #6c0a0a;"></i></button>
                    <p>Editar Endereço</p>
                </div>
                <div class="btn">
                    <button onclick="abrirModal('pedidos')"><i class="fa-solid fa-truck" style="color: #6c0a0a;"></i></button>
                    <p>Ver Pedidos</p>
                </div>
                <div class="btn">
                    <button onclick="abrirModal('deletar')"><i class="fa-solid fa-xmark" style="color: #6c0a0a;"></i></button>
                    <p>Deletar Conta</p>
                </div>
            </div>

            <!-- MODAL ÚNICO -->
            <div id="overlay">
                <div id="modal">
                    <h2 id="titulo-modal"></h2>
                    <div id="modal-content">
                        
                    </div>
                </div>
            </div>

            <script>
                function abrirModal(tipo) {
                const titulo = document.getElementById('titulo-modal');
                const conteudo = document.getElementById('modal-content');

                // altera o conteúdo conforme o tipo do modal
                switch(tipo) {
                    case 'perfil':
                    titulo.textContent = 'Editar Perfil';
                    conteudo.innerHTML = `
                        <p>Aqui você poderá editar seus dados pessoais!</p>
                        <form method="post" action="AtualizarCliente.php">
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

                            <?php  
                                if (isset($_GET['erroMsg'])) {
                                    echo "<div class='erroMsg'>" . $_GET['erroMsg'] . "</div>";
                                }
                            ?>

                            <div class="caixabtn">
                                <button class="btnModalAtualizar" type="submit" onclick="" href="">ATUALIZAR</button>
                            </div>
                        </form>

                        <button class="btnModalFechar" onclick="fecharModal()">Fechar</button>
                    `;
                    break;

                    case 'endereco':
                        titulo.textContent = 'Cadastre seu novo endereço!';
                        conteudo.innerHTML = `
                            <form method="post" action="../Database/CadastrarEnderecoCliente.php">
                                <input type="hidden" id="endIndex" name="endIndex">

                                <label for="enderecosCad">Escolha um endereço para editar:</label>
                                <select id="enderecosCad" name="enderecosCad" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="primeiro_endereco">1° Endereço</option>
                                    <option value="segundo_endereco">2° Endereço</option>
                                    <option value="terceiro_endereco">3° Endereço</option>
                                </select>

                                <div class="caixaForm-e">
                                    <label>Número da Residência:</label>
                                    <input type="number" id="numR" name="numR">

                                    <label>CEP:</label>
                                    <input type="text" id="cep" name="cep">

                                    <label>Estado:</label>
                                    <select id="estado" name="estado" required>
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>

                                <?php  
                                    if (isset($_GET['erroMsg'])) {
                                        echo "<div class='erroMsg'>" . $_GET['erroMsg'] . "</div>";
                                    }
                                ?>
                                <div class="caixabtn">
                                    <button class="btnModalAtualizar" type="submit">ATUALIZAR</button>
                                </div>
                            </form>

                            <button class="btnModalFechar" onclick="fecharModal()">Fechar</button>
                            `;
                        setTimeout(configurarEndereco, 50);
                    break;



                    case 'pedidos':
                        titulo.textContent = 'Seus Pedidos';
                        conteudo.innerHTML = `
                            <div id="listaPedidos"></div>
                            <button class="btnModalFechar" onclick="fecharModal()">Fechar</button>
                        `;

                        setTimeout(carregarPedidos, 50); // 🔥 ADICIONA ISSO
                    break;

                    case 'deletar':
                    titulo.textContent = 'Deletar Conta';
                    conteudo.innerHTML = `
                        <p>Tem certeza que deseja excluir sua conta???</p>
                        <button class="btnExcluirConta" onclick="confirmarExclusao()">Confirmar</button>
                        <button class="btnModalFechar" onclick="fecharModal()">Fechar</button>
                    `;
                    break;

                    case 'meuEndereco':
                    titulo.textContent = 'Veja Seus Endereços Cadastrados!';
                    conteudo.innerHTML = `
                        <label>Escolha o endereço que deseja ver:</label>
                        <select id="selectVerEndereco">
                            <option value="" disabled selected>Selecione</option>
                            <option value="0">1° Endereço</option>
                            <option value="1">2° Endereço</option>
                            <option value="2">3° Endereço</option>
                        </select>

                        <ul id="listaEndereco">
                            <li>Selecione um endereço acima...</li>
                        </ul>

                        <button class="btnModalFechar" onclick="fecharModal()">Fechar</button>
                    `;

                    setTimeout(configurarVerEndereco, 50);
                    break;


                    default:
                    titulo.textContent = 'Informação';
                    conteudo.textContent = 'Nenhum conteúdo disponível.';
                }

                // mostrar modal
                document.getElementById('overlay').style.display = 'flex';
                document.getElementById('modal').style.display = 'block';
                
                }

                function fecharModal() {
                document.getElementById('overlay').style.display = 'none';
                }

                function confirmarExclusao() {
                const form = document.createElement("form");
                form.method = "POST";
                form.action = "DeletarCliente.php";
                document.body.appendChild(form);
                form.submit();
                }





                function configurarVerEndereco() {
                    const select = document.getElementById("selectVerEndereco");
                    const lista = document.getElementById("listaEndereco");

                    select.onchange = () => {
                        let index = select.value;
                        let end = enderecos[index];

                        if (!end) {
                            lista.innerHTML = "<li>Nenhum endereço cadastrado nesta posição.</li>";
                        } else {
                            lista.innerHTML = `
                                <li>Número: ${end.numero}</li>
                                <li>CEP: ${end.cep}</li>
                                <li>Estado: ${end.estado}</li>
                            `;
                        }
                    };
                }


                let enderecos = <?php echo json_encode($enderecos); ?>;

                function configurarEndereco() {
                    const select = document.getElementById('enderecosCad');
                    if (!select) return;

                    select.onchange = () => {
                        let index = select.selectedIndex - 1; // pois a primeira opção é 'Selecione'
                        let endereco = enderecos[index];

                        // Preenche inputs do modal EDITAR
                        document.getElementById('endIndex').value = index;

                        if (endereco) {
                            document.getElementById('numR').value = endereco.numero;
                            document.getElementById('cep').value = endereco.cep;
                            document.getElementById('estado').value = endereco.estado;
                        } else {
                            document.getElementById('numR').value = "";
                            document.getElementById('cep').value = "";
                            document.getElementById('estado').value = "";
                        }
                    };
                }

                function carregarPedidos() {
                    fetch("buscarPedidos.php")
                        .then(res => res.json())
                        .then(pedidos => {
                            let div = document.getElementById("listaPedidos");
                            div.innerHTML = "";

                            if (pedidos.length === 0) {
                                div.innerHTML = "<p>Nenhum pedido encontrado.</p>";
                                return;
                            }

                            pedidos.forEach(p => {
                                div.innerHTML += `
                                    <div class="pedido-item">
                                        <h3>Pedido #${p.id_compra}</h3>
                                        <p><b>Produto:</b> ${p.nome_instrumento}</p>
                                        <p><b>Quantidade:</b> ${p.quantidade}</p>
                                        <p><b>Valor unitário:</b> R$ ${p.valor_unitario}</p>
                                        <p><b>Pagamento:</b> ${p.forma_pagamento}</p>
                                        <p><b>Status:</b> ${p.status_compra}</p>
                                        <p><b>Data:</b> ${p.data_compra}</p>
                                        <hr>
                                    </div>
                                `;
                            });
                        });
                }







                    
            document.addEventListener("DOMContentLoaded", function() {
                const urlParams = new URLSearchParams(window.location.search);

                if (urlParams.has("erroMsg")) {
                    // abre diretamente o modal de perfil
                    abrirModal("perfil");

                    // remove erroMsg da URL sem recarregar a página
                    const novaURL = window.location.pathname;
                    window.history.replaceState({}, document.title, novaURL);
                }
            });


            </script>


        </div>
    </section>

    
    





    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>

</body>
</html>