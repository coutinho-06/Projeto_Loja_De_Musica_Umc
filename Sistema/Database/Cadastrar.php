<?php
    include "conexao.php";


    $Nome = $_POST['nome'];
    $Sobrenome = $_POST['Sobrenome'];
    $Telefone = $_POST['telefone'];
    $Cpf = $_POST['cpf'];
    $Dt_Nasc = $_POST['Nasc'];
    $Email = $_POST['email'];
    $Senha = $_POST['senha'];
    $Confir_Senha = $_POST['confirSenha'];

    $sql = "INSERT INTO Cliente(nome,sobrenome,telefone,cpf,dt_Nasc,email,senha) VALUES ('$nome','$Sobrenome','$Telefone','$Cpf','$Dt_Nasc','$Email','$Senha')";

    if (mysqli_query($conn,$sql)) {

        print_r('<div class="modal" id="modalSucesso">
                    <div class="modal-content">
                        <h3>Cadastro realizado com sucesso!</h3>
                        <p style="color:#6C0A0A;">Seja bem-vindo(a)! Você já pode fazer login.</p>

                        <button><a href="TelaFormularioLogin.php">Ir para login</a></button>
                    </div>
                </div>');

    }else {
        print_r("Erro ao inserir o registro!!" . mysqli_error($conn));
    }





const form = document.getElementById('formCadastro');
const modal = document.getElementById('modalSucesso');

form.addEventListener('submit', function(e) {
    e.preventDefault(); // impede o envio real do formulário
    modal.style.display = 'flex'; // mostra o modal
});

// Fecha o modal ao clicar fora dele (opcional)
window.addEventListener('click', function(e) {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});