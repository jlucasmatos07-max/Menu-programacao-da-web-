<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="usuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <header></header>
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

            <div class="header-content">
                <div>
                    <h2>Gestão de Usuário</h2>
                    <p>Visualizar e gerenciar as permições de usuário do sistema</p>
                </div>
                <a href="cad-usuarios.html" class="btn-add">Adicionar usuario <i class="fa-solid fa-plus"></i></a>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Acesso</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="corpo-tabela"></tbody>
                    <tbody>
                        <tr>
                            <td colspan="6" align="right" id="info-registros">Total: 0 registro(s)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <footer>
        <p>&copy; <span id="ano"></span> - Desenvolvido na aula de web I</p>
    </footer>

    <script>
        document.getElementById('ano').textContent = new Date().getFullYear();

        function renderUsuarios() {
            const lista = JSON.parse(localStorage.getItem('bancoUsuario')) || [];
            const tbody = document.getElementById('corpo-tabela');

            if (lista.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" align="center">Nenhum usuário cadastrado.</td></tr>';
                document.getElementById('info-registros').textContent = 'Total: 0 registro(s)';
                return;
            }

            tbody.innerHTML = lista.map((u, i) => {
                const nivel = u.nivel == 2 ? 'Administrador' : 'Usuário';
                return `
                    <tr>
                        <td>${String(i + 1).padStart(2, '0')}</td>
                        <td>${u.nome}</td>
                        <td>${u.email}</td>
                        <td>${nivel}</td>
                        <td><span class="badge ativo">Ativo</span></td>
                        <td>
                            <button class="btn-icon" onclick="editar(${i})"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn-icon" onclick="excluir(${i})"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                `;
            }).join('');

            document.getElementById('info-registros').textContent = `Total: ${lista.length} registro(s)`;
        }

        function editar(index) {
            const lista = JSON.parse(localStorage.getItem('bancoUsuario')) || [];
            sessionStorage.setItem('editUsuario', JSON.stringify({ index, dados: lista[index] }));
            window.location.href = 'cad-usuarios.html';
        }

        function excluir(index) {
            if (!confirm('Deseja excluir este usuário?')) return;
            const lista = JSON.parse(localStorage.getItem('bancoUsuario')) || [];
            lista.splice(index, 1);
            localStorage.setItem('bancoUsuario', JSON.stringify(lista));
            renderUsuarios();
        }

        renderUsuarios();
    </script>
</body>

</html>