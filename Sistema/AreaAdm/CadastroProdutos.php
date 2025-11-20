<?php
    include "../Database/conexao.php";

    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/Logos/logo-vinho-sem-fundo.png" type="image/x-icon">
    <title>Área do Administrador da Groove Sound!</title>


    <!-- links de estilo -->
    <link rel="stylesheet" href="../CSS/adm/estiloMenuAdm.css">
    <link rel="stylesheet" href="../CSS/adm/estiloCadastroProduto.css">
    

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
                <a href="../TelaLoginAdm.php">SAIR</a>
            </div>
        </nav>

        <div class="containerParteDados">
            <div class="containerSuperior">
                <h1>Cadastrar Produtos</h1>
            </div>
            <div class="containerInferior">
                <div class="caixaForm">
                    <form action="../Database/CadastrarInstrumento.php" method="POST" enctype="multipart/form-data">
                        <label for="">Nome do Produto:</label>
                        <input type="text" name="nome">

                        <label>Categoria:</label>
                        <select name="categoria" required>
                            <option value="">Selecione uma categoria</option>

                                <?php
                                    include "../Database/conexao.php";
                                    $sql = "SELECT * FROM categoria ORDER BY categoria ASC";
                                    $result = mysqli_query($conn, $sql);

                                    while ($cat = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?= $cat['id_categoria'] ?>">
                                            <?= $cat['categoria'] ?>
                                        </option>
                                <?php } ?>
                        </select>
                        <label for="">Valor do Produto:</label>
                        <input type="text" class="inpValor" name="valor">

                        <label for="">Imagem do Produto:</label>
                        <input type="file" name="imagem" accept="image/*" required>
                        
                        <button type="submit">Cadastrar</button>
                            
                    </form>

                </div>
                <div class="caixaSelect">
                    <div class="tabela-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th class="colId">Id</th>
                                <th>Nome do Produto</th>
                                <th>Categoria</th>
                                <th>Valor do Produto</th>
                                <th>Imagem do Produto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include "../Database/conexao.php";

                                $sql = "SELECT * FROM instrumento ORDER BY id_instrumento DESC"; 
                                $result = mysqli_query($conn, $sql);

                                while($p = mysqli_fetch_assoc($result)) { ?>

                                    <tr class="linha-produto"
                                        data-id="<?= $p['id_instrumento'] ?>"
                                        data-nome="<?= $p['nome_instrumento'] ?>"
                                        data-categoria="<?= $p['id_categoria'] ?>"
                                        data-valor="<?= $p['valor'] ?>"
                                        data-imagem="<?= $p['imagem_instrumento'] ?>"
                                    >
                                        <td><?= $p['id_instrumento'] ?></td>
                                        <td><?= $p['nome_instrumento'] ?></td>
                                        <td><?= $p['id_categoria'] ?></td>
                                        <td>R$ <?= number_format($p['valor'], 2, ',', '.') ?></td>
                                        <td>
                                            <img src="../<?= $p['imagem_instrumento'] ?>" width="80">
                                        </td>
                                    </tr>



                                    <!-- <tr>
                                        <td><?= $p['id_instrumento'] ?></td>
                                        <td><?= $p['nome_instrumento'] ?></td>
                                        <td><?= $p['id_categoria'] ?></td>
                                        <td>R$ <?= number_format($p['valor'], 2, ',', '.') ?></td>
                                        <td>
                                            <img src="../<?= $p['imagem_instrumento'] ?>" width="80">
                                        </td>
                                    </tr> -->
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <div id="modalAcoes" class="modal">
        <div class="modal-content">
            <h2 id="tituloProduto"></h2>

            <p>O que deseja fazer?</p>

            <button id="btnEditar" class="btn-acao">Editar</button>
            <button id="btnExcluir" class="btn-acao delete">Excluir</button>

            <button class="fechar" onclick="fecharModais()">Fechar</button>
        </div>
    </div>


    <div id="modalEditar" class="modal">
        <div class="modal-content">
            <h2>Editar Produto</h2>

            <form id="formEditar" action="../Database/EditarInstrumento.php" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" id="edit-id">

                <label>Nome:</label>
                <input type="text" name="nome" id="edit-nome">

                <label>Valor:</label>
                <input type="text" name="valor" id="edit-valor">

                <label>Categoria:</label>
                <input type="text" name="categoria" id="edit-categoria">

                <label>Imagem:</label>
                <input type="file" name="imagem">

                <button type="submit">Salvar</button>
                <button type="button" onclick="fecharModais()">Cancelar</button>
            </form>
        </div>
    </div>

    <div id="modalExcluir" class="modal">
        <div class="modal-content">
            <h2>Excluir Produto</h2>
            <p>Tem certeza que deseja excluir <strong id="excluirNome"></strong>?</p>

            <form action="../Database/ExcluirInstrumento.php" method="POST">
                <input type="hidden" name="id" id="excluir-id">
                <button type="submit" class="btn-acao delete">Excluir</button>
                <button type="button" onclick="fecharModais()">Cancelar</button>
            </form>
        </div>
    </div>





<script>
    const linhas = document.querySelectorAll(".linha-produto");
    const modalAcoes = document.getElementById("modalAcoes");
    const modalEditar = document.getElementById("modalEditar");
    const modalExcluir = document.getElementById("modalExcluir");

    let produtoSelecionado = null;

    // Abrir modal ao clicar em uma linha
    linhas.forEach(linha => {
        linha.addEventListener("click", () => {
            produtoSelecionado = linha;

            document.getElementById("tituloProduto").innerText =
                linha.dataset.nome;

            modalAcoes.style.display = "flex";
        });
    });

    // Botão editar
    document.getElementById("btnEditar").onclick = () => {
        modalAcoes.style.display = "none";

        document.getElementById("edit-id").value = produtoSelecionado.dataset.id;
        document.getElementById("edit-nome").value = produtoSelecionado.dataset.nome;
        document.getElementById("edit-valor").value = produtoSelecionado.dataset.valor;
        document.getElementById("edit-categoria").value = produtoSelecionado.dataset.categoria;

        modalEditar.style.display = "flex";
    };

    // Botão excluir
    document.getElementById("btnExcluir").onclick = () => {
        modalAcoes.style.display = "none";

        document.getElementById("excluir-id").value = produtoSelecionado.dataset.id;
        document.getElementById("excluirNome").innerText = produtoSelecionado.dataset.nome;

        modalExcluir.style.display = "flex";
    };

    // Fechar todos
    function fecharModais() {
        modalAcoes.style.display = "none";
        modalEditar.style.display = "none";
        modalExcluir.style.display = "none";
    }

</script>




</body>
</html>

