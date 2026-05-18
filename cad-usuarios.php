<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="usuario.css">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="dashboard-container">
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="categorias.html">Categorias</a></li>
                <li><a href="postagem.html">Postagem</a></li>
                <li><a href="usuario.html">Usuario</a></li>
            </ul>
            <div class="perfil-usuario">
                <img src="https://ui-avatars.com/api/?name=V&background=008080&color=qwe" alt="Avatar">
                <span>Valverde</span>
            </div>
        </nav>
        <main>
            <section class="card-form">
                <div class="form-header">
                    <h2 id="form-titulo"><i class="fa-solid fa-user-plus"></i> Novo Usuário</h2>
                    <p>Preencha os dados abaixo para registrar um novo acesso.</p>
                </div>

                <form id="form-usuario">
                    <div class="form-group">
                        <label for="nome">Nome completo</label>
                        <input type="text" id="nome" name="nome" placeholder="Ex: Nome Sobrenome" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="nome@empresa.com" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group flex-1">
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha" placeholder="Senha" required>
                        </div>

                        <div class="form-group flex-1">
                            <label for="nivel">Nivel</label>
                            <select id="nivel" name="nivel">
                                <option value="1">Usuario</option>
                                <option value="2">Administrador</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button class="btn-save" type="submit"><i class="fa-solid fa-check"></i> Finalizar Cadastro</button>
                        <a class="btn-cancel" href="usuario.html" role="button">cancelar</a>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <footer>
        <p>&copy; <span id="ano"></span> - Desenvolvido na aula de web I</p>
    </footer>

    <script>
        document.getElementById('ano').textContent = new Date().getFullYear();

        const edit = JSON.parse(sessionStorage.getItem('editUsuario'));

        if (edit) {
            document.getElementById('form-titulo').innerHTML = '<i class="fa-solid fa-user-pen"></i> Editar Usuário';
            document.getElementById('nome').value = edit.dados.nome;
            document.getElementById('email').value = edit.dados.email;
            document.getElementById('senha').value = edit.dados.password;
            document.getElementById('nivel').value = edit.dados.nivel;
        }

        document.getElementById('form-usuario').addEventListener('submit', function (e) {
            e.preventDefault();

            const usuario = {
                nome: document.getElementById('nome').value,
                email: document.getElementById('email').value,
                password: document.getElementById('senha').value,
                nivel: document.getElementById('nivel').value
            };

            const lista = JSON.parse(localStorage.getItem('bancoUsuario')) || [];

            if (edit) {
                lista[edit.index] = usuario;
                sessionStorage.removeItem('editUsuario');
            } else {
                lista.push(usuario);
            }

            localStorage.setItem('bancoUsuario', JSON.stringify(lista));
            window.location.href = 'usuario.html';
        });
    </script>
</body>

</html>