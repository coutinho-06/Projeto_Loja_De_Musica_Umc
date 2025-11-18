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
                                include "../Database/CadastrarInstrumento.php";

                                $sql = "SELECT * FROM instrumento ORDER BY id_Instrumento DESC"; 
                                $result = msqli_query($conn,$sql);

                                while($cat = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?= $cat['id_instrumento'] ?></td>
                                        <td><?= $cat['nome_instrumento'] ?></td>
                                        <td><?= $cat['id_categoria'] ?></td>
                                        <td><?= $cat['valor'] ?></td>
                                        <td><?= $cat['imagem_instrumento'] ?></td>
                                    </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

