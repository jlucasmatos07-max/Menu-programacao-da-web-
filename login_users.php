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
    <section class="card-form">
        <div class="form-header">
            <h2><i class="fa-solid fa-user-plus"></i> novo usuario </h2>
            <p>preencha os dados abaixo para registrar um novo acesso</p>
        </div>

        <form action="user_area.php" method="POST">
            <div class="form-group">
                <label for="nome">nome completo</label>
                <input type="text" id="nome" name="nome" placeholder="ex: lucas matos" required>
            </div>

            <div class="form-group">
                <label for="data">data de nascimento</label>
                <input type="date" id="data" name="data" placeholder="dd/mm/yyyy" required>

                </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="email" id="email" name="email" placeholder="nome@empresa.com" required>
            </div>

            <div class="form-row">
                <div class="form-group flex-1">
                    <label for="senha">senha</label>
                    <input type="password" id="senha" name="senha" required>          
                 </div>
                 <div class="form-group flex-1">
                    <label for="nivel">nivel</label>
                    <select id="nivel" name="nivel">
                        <option value="1">usuario</option>
                        <option value="2">administrador</option>
                    </select>

                    <?php 
                    $nivelAcesso =2;
                    if ($nivelAcesso == 2) {
                        echo '<span class="badge ativo"> </span>';

                    } else {
                        echo '<span class="badge inativo">usúario</span>';
                    }
                    ?>
                 </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-save">finalizar cadastro</button>
                <a href="index.php" class="btn-cancel">cancelar</a>
            </div>
        </form>
    </section>
    </main>
    </div>
<button onclick="cadastrar()">Salvar</button>

<br><br>
<a href="user_area.php">Ver usuários</a>

<script>

document.getElementById("user_area.php").addEventListener("submit", function(event) {
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