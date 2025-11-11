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
                    <form action="">
                        <label for="">Nome do Produto:</label>
                        <input type="text">
                        <label for="">Categoria:</label>
                        <input type="text">
                        <label for="">Valor do Produto:</label>
                        <input type="text" class="inpValor">
                        <label for="">Imagem do Produto:</label>
                        <input type="file" class="inpImg">
                        
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
                            <tr>
                                <td>1</td>
                                <td>hihi</td>
                                <td>1</td>
                                <td>hihi</td>
                                <td>hihi</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>hihi</td>
                                <td>1</td>
                                <td>hihi</td>
                                <td>1</td>
                                
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>hihi</td>
                                <td>1</td>
                                <td>hihi</td>
                                <td>hihi</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>hihi</td>
                                <td>1</td>
                                <td>hihi</td>
                                <td>hihi</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

