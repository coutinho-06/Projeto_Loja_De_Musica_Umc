<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/Logos/logo-vinho-sem-fundo.png" type="image/x-icon">
    <title>Área do Administrador da Groove Sound!</title>


    <!-- links de estilo -->
    <link rel="stylesheet" href="../CSS/adm/estiloMenuAdm.css">
    <link rel="stylesheet" href="../CSS/adm/estiloCategoriaAdm.css">
    

     <!-- link de font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


</head>
<body>


    <section>
        <nav>
            <div class="saudacaoAdm">
                <h1>Olá, Adm!</h1> 
            </div>
            <div class="containerLinksNavegacao">
                <ul>
                    <li>
                        <a href="AdmDashboard.php">Dashboard</a>
                  
                        <a href="Categorias.php">Categorias</a>
                    
                        <a href="CadastroProdutos.php
                        ">Produtos</a>
                    
                        <a href="Pedidos.php">Pedidos</a>

                        <a href="Atendidos.php">Atendidos</a>
                    </li>
                </ul>
            </div>
            <div class="saidaAdm">
                <a href="../TelaLoginAdm.php">
                    <i class="fa-solid fa-door-closed" style="color: #ffffff;"></i>
                    SAIR
                </a>
            </div>
        </nav>

        <div class="containerParteDados">
            <div class="containerSuperior">
                <h1>Cadastrar Categorias</h1>
            </div>
            <div class="containerInferior">
                <div class="caixaForm">
                    <form action="CadastrarCategoria.php" method="post">
                        <label for="">Nome da Categoria:</label>
                        <input type="text" name="categoria" id="categoria">
                        
                        <button type="submit">Cadastrar</button>
                            
                    </form>

                </div>
                <div class="caixaSelect">
                    <div class="tabela-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th class="colId">Id</th>
                                    <th>Nome Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "../Database/conexao.php";

                                    $sql = "SELECT * FROM categoria ORDER BY id_categoria DESC";
                                    $result = mysqli_query($conn, $sql);

                                    while ($cat = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="linha-categoria"
                                            data-id="<?= $cat['id_categoria'] ?>"
                                            data-nome="<?= $cat['categoria'] ?>"
                                            >
                                            <td><?= $cat['id_categoria'] ?></td>
                                            <td><?= $cat['categoria'] ?></td>
                                            </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div id="modalAcoes" class="modal">
                <div class="modal-content">
                    <h2 id="tituloCategoria"></h2>

                    <div class="bts">
                        <button id="btnEditar">Editar</button>
                        <button id="btnExcluir" class="btnExcluir">Excluir</button>
                    </div>
                    <button onclick="fecharModais()">Fechar</button>
                </div>
            </div>


            <div id="modalEditar" class="modal">
                <div class="modal-content">
                    <h2>Editar Categoria</h2>

                    <form action="EditarCategoria.php" method="POST">
                        <input type="hidden" id="edit-id" name="id">

                        <label>Nome:</label>
                        <input type="text" id="edit-nome" name="categoria">

                        <button type="submit">Salvar</button>
                        <button type="button" onclick="fecharModais()">Cancelar</button>
                    </form>
                </div>
            </div>


            <div id="modalExcluir" class="modal">
                <div class="modal-content">
                    <h2>Excluir Categoria</h2>

                    <p>Tem certeza que deseja excluir <b id="excluirNome"></b>?</p>

                    <form action="ExcluirCategoria.php" method="POST">
                        <input type="hidden" id="excluir-id" name="id">

                        <button type="submit" class="btnExcluir">Excluir</button>

                    </form>
                    <button type="button" onclick="fecharModais()">Cancelar</button>
                
                </div>
            </div>






    <script>
        const linhas = document.querySelectorAll(".linha-categoria");
        const modalAcoes = document.getElementById("modalAcoes");
        const modalEditar = document.getElementById("modalEditar");
        const modalExcluir = document.getElementById("modalExcluir");

        let categoriaSelecionada = null;

        // Ao clicar na linha
        linhas.forEach(linha => {
            linha.addEventListener("click", () => {
                categoriaSelecionada = linha;

                document.getElementById("tituloCategoria").innerText =
                    linha.dataset.nome;

                modalAcoes.style.display = "flex";
            });
        });

        // Editar
        document.getElementById("btnEditar").onclick = () => {
            modalAcoes.style.display = "none";

            document.getElementById("edit-id").value = categoriaSelecionada.dataset.id;
            document.getElementById("edit-nome").value = categoriaSelecionada.dataset.nome;

            modalEditar.style.display = "flex";
        };

        // Excluir
        document.getElementById("btnExcluir").onclick = () => {
            modalAcoes.style.display = "none";

            document.getElementById("excluir-id").value = categoriaSelecionada.dataset.id;
            document.getElementById("excluirNome").innerText = categoriaSelecionada.dataset.nome;

            modalExcluir.style.display = "flex";
        };

        function fecharModais() {
            modalAcoes.style.display = "none";
            modalEditar.style.display = "none";
            modalExcluir.style.display = "none";
        }
    </script>




<script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>

</body>
</html>



