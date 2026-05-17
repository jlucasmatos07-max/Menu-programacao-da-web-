<!--area de login do usuario-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>bloodlovrz</title>
    <link rel ="stylesheet" href="dash.css">
</head>
<body>
    <?php
    include 'sidebar.php';
    ?>
 <main>
    <form id="cadastroForm">
        <h2>Cadastro de usúario</h2>
        <p>preencha os campos para criar um novo usúario</p>

        <div>
        <label for="nome">nome</label>
        <input type="text" id="nome" placeholder="yasmin">
        </div>

        <div>
        <label for="data">data de nascimento</label>
        <input type="date" id="data" placeholder="data de nascimento">
        </div>

        <div>
        <label for="email">email</label>
        <input type="email" id="email" placeholder="email">
        </div>

        <div>
        <label for="senha">senha</label>
        <input type="password" id="senha" placeholder="senha">

        <button type="submit">cadastrar</button>
        </div>
    </form>
<script>

document.getElementById("cadastroForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Impede o envio do formulário

    let bancoUsusarios = JSON.parse(localStorage.getItem("bancoUsuarios")) || [];

    const novoUsuario =  {
        nome: document.getElementById("nome").value,
        data: document.getElementById("data").value,
        email: document.getElementById("email").value,
        senha: document.getElementById("senha").value,
        //nivel: document.getElementById("nivel").value
    };

    bancoUsuarios.push(novoUsuario);
    localStorage.setItem("bancoUsuarios", JSON.stringify(bancoUsuarios));

    alert("Usuário cadastrado com sucesso!");
});

    </script>

    </body>

</html>