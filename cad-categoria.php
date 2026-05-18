<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categoria</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="usuario.css">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="dashboard-container">
        <nav>
            <ul>
                <li><a href="main_page.php">Inicio</a></li>
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
                    <h2 id="form-titulo"><i class="fa-solid fa-user-plus"></i> Nova Categoria</h2>
                    <p>Preencha os dados abaixo para registrar uma categoria.</p>
                </div>

                <form id="form-categoria">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" id="titulo" name="titulo" placeholder="Ex: Tecnologia" required>
                    </div>

                    <div class="form-group flex-1">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="1">Ativo</option>
                            <option value="2">Inativo</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button class="btn-save" type="submit"><i class="fa-solid fa-check"></i> Finalizar Cadastro</button>
                        <a class="btn-cancel" href="categorias.html" role="button">cancelar</a>
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

        const edit = JSON.parse(sessionStorage.getItem('editCategoria'));

        if (edit) {
            document.getElementById('form-titulo').innerHTML = '<i class="fa-solid fa-pen"></i> Editar Categoria';
            document.getElementById('titulo').value = edit.dados.nome;
            document.getElementById('status').value = edit.dados.status;
        }

        document.getElementById('form-categoria').addEventListener('submit', function (e) {
            e.preventDefault();

            const categoria = {
                nome: document.getElementById('titulo').value,
                status: document.getElementById('status').value
            };

            const lista = JSON.parse(localStorage.getItem('bancoCategoria')) || [];

            if (edit) {
                lista[edit.index] = categoria;
                sessionStorage.removeItem('editCategoria');
            } else {
                lista.push(categoria);
            }

            localStorage.setItem('bancoCategoria', JSON.stringify(lista));
            window.location.href = 'categorias.html';
        });
    </script>
</body>

</html>