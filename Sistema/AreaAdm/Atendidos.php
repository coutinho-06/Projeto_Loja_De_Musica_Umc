<?php
include "../Database/conexao.php";

$sql = "
    SELECT
        c.id_compra,
        cli.primeiro_nome AS cliente,
        i.nome_instrumento,
        cat.categoria AS nome_categoria,
        i.valor,
        it.quantidade,
        i.imagem_instrumento
    FROM compra c
    INNER JOIN cliente cli ON c.id_cliente = cli.id_cliente
    INNER JOIN instrumento i ON c.id_instrumento = i.id_instrumento
    INNER JOIN categoria cat ON i.id_categoria = cat.id_categoria
    INNER JOIN item_compra it ON it.id_compra = c.id_compra
    WHERE c.status_compra = 'atendido'
    ORDER BY c.id_compra DESC
";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro na consulta SQL: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../IMG/Logos/logo-vinho-sem-fundo.png" type="image/x-icon">
    <title>Área do Administrador da Groove Sound!</title>

    <link rel="stylesheet" href="../CSS/adm/estiloMenuAdm.css">
    <link rel="stylesheet" href="../CSS/adm/estiloAtendidos.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
                    <a href="CadastroProdutos.php">Produtos</a>
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
            <h1>Pedidos Atendidos</h1>
        </div>
        <div class="containerInferior">
            <div class="caixaSelect">
                <table>
                    <thead>
                        <tr>
                            <th class="colId">Id</th>
                            <th>Cliente</th>
                            <th>Nome do Produto</th>
                            <th>Categoria</th>
                            <th>Valor do Produto</th>
                            <th class="colId">Qntd</th>
                            <th>Imagem do Produto</th>
                            <th class="colId">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $row["id_compra"] ?></td>
                                <td><?= $row["cliente"] ?></td>
                                <td><?= $row["nome_instrumento"] ?></td>
                                <td><?= $row["nome_categoria"] ?></td>
                                <td>R$ <?= number_format($row["valor"], 2, ',', '.') ?></td>
                                <td><?= $row["quantidade"] ?></td>
                                <td><img src="../<?= $row["imagem_instrumento"] ?>" width="60"></td>
                                <td><button class="btnOk" data-id="<?= $row['id_compra'] ?>">ok</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
let pedidoSelecionado = null;

// clicar no botão "ok"
document.querySelectorAll(".btnOk").forEach(btn => {
    btn.addEventListener("click", () => {
        pedidoSelecionado = btn.dataset.id;

        if(confirm("Remover pedido da lista de atendidos?")) {
            fetch("remover_pedido.php", {
                method: "POST",
                headers: {"Content-Type": "application/x-www-form-urlencoded"},
                body: "id_pedido=" + pedidoSelecionado
            })
            .then(r => r.text())
            .then(res => {
                res = res.trim();
                if(res === "ok") {
                    location.reload();
                } else {
                    alert("Erro ao remover pedido: " + res);
                }
            });
        }
    });
});
</script>


<script src="https://kit.fontawesome.com/ef7e10212e.js" crossorigin="anonymous"></script>
</body>
</html>
