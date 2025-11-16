<?php
    include "../Database/conexao.php";
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
            $id = $_COOKIE['id_cliente'];

            $sql = "SELECT 
                cl.id_cliente as IdCLiente,
                cl.primeiro_nome AS Cliente,
                cl.segundo_nome AS Sobrenome,
                cl.data_nascimento AS data_nascimento,
                cl.cpf AS CPF,
                cl.email as Email,
                cl.telefone AS telefone,
                en.cep AS Cep,
                en.numero AS Numero
            FROM 
                cliente AS cl
            LEFT JOIN
             endereco AS en ON cl.id_cliente = en.id_cliente
            WHERE cl.id_cliente = $id";
            
            $result = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($result);
        ?>


        <div class="containerSuperior">
            <div class="espaco">

            </div>
            <div class="imgPerfil">
                <img src="../IMG/cleinte.png" alt="">
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

                        <label for="estado">Estado:</label>
                            <select id="enderecosCad" name="enderecosCad" required>
                                <option value="" disabled selected>Selecione</option>
                                <option value="primeiro_endereco">1° Endereço</option>
                                <option value="segundo_endereco">2° Endereço</option>
                                <option value="terceiro_endereco">3° Endereço</option>
                            </select>



                            <div class="caixaForm">
                                
                                <label class="LnumR for="numR">Número da Residência:</label>
                                <input type="number" class="numR" id="numR" name="numR">

                                <label  class="Lcep" for="cep">CEP:</label>
                                <input type="text"  max="15" id="cep" name="cep">

                                <label for="estado">Estado:</label>
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




                                <?php if(isset($_GET['errorR']) && !empty($_GET['errorR'])){

                                    $mensagem = $_GET['errorR'];
                                    print_r("<span>$mensagem</span>");

                                }?>
                            </div>

                            

                            <div class="caixabtn">
                                <button class="btnModalAtualizar" type="submit" onclick="" href="">ATUALIZAR</button>
                            </div>
                        </form>



                        <button class="btnModalFechar" onclick="fecharModal()">Fechar</button>
                    `;
                    break;

                    case 'pedidos':
                    titulo.textContent = 'Seus Pedidos';
                    conteudo.innerHTML = `
                        <p>Histórico de compras do cliente...</p>
                        <button class="btnModalFechar" onclick="fecharModal()">Fechar</button>
                    `;
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
                    titulo.textContent = 'Veja Seu Endereço Cadastrado!';
                    conteudo.innerHTML = `
                        <div id="modal-content">
                            <ul>
                                <li>Número da residência: <?php print_r($result['Numero']); ?></li>
                                <li>CEP: <?php print_r($result['Cep']); ?></li>
                            </ul>
                        </div>

                        <button class="btnModalFechar" onclick="fecharModal()">Fechar</button>
                    `;
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
                form.action = "../Database/DeletarCliente.php";
                document.body.appendChild(form);
                form.submit();
                }
            </script>


        </div>
    </section>

    
    





    <script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>

</body>
</html>