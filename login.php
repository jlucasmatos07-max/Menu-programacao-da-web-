<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="usuario.css">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="login-container">
        <div class="login-card">

            <i class="fa-solid fa-newspaper logo-icon"></i>
            <h2>Painel do Blog</h2>

            <p id="msg-erro" style="color:red; display:none;">E-mail ou senha incorretos.</p>

            <form id="form-login">
                <div class="form-group">
                    <input type="email" id="email" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                    <input type="password" id="senha" placeholder="Senha" required>
                </div>

                <button type="submit" class="btn-salvar">Entrar</button>
            </form>

        </div>
    </div>

    <script src="valida_login.js"></script>
</body>

</html>