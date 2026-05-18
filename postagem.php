<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagem</title>
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
                    <h2>Gestão de Postagem</h2>
                    <p>Visualizar e gerenciar as permições de postagem</p>
                </div>
                <a href="cad-postagem.html" class="btn-add">Adicionar Postagem <i class="fa-solid fa-plus"></i></a>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Conteudo</th>
                            <th>Categoria</th>
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

        function renderPostagens() {
            const lista = JSON.parse(localStorage.getItem('bancoPostagem')) || [];
            const tbody = document.getElementById('corpo-tabela');

            if (lista.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" align="center">Nenhuma postagem cadastrada.</td></tr>';
                document.getElementById('info-registros').textContent = 'Total: 0 registro(s)';
                return;
            }

            tbody.innerHTML = lista.map((p, i) => {
                const statusLabel = p.status == 1 ? 'Ativo' : 'Inativo';
                const statusClass = p.status == 1 ? 'ativo' : 'inativo';
                return `
                    <tr>
                        <td>${String(i + 1).padStart(2, '0')}</td>
                        <td>${p.titulo}</td>
                        <td>${p.conteudo}</td>
                        <td>${p.categoria}</td>
                        <td><span class="badge ${statusClass}">${statusLabel}</span></td>
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
            const lista = JSON.parse(localStorage.getItem('bancoPostagem')) || [];
            sessionStorage.setItem('editPostagem', JSON.stringify({ index, dados: lista[index] }));
            window.location.href = 'cad-postagem.html';
        }

        function excluir(index) {
            if (!confirm('Deseja excluir esta postagem?')) return;
            const lista = JSON.parse(localStorage.getItem('bancoPostagem')) || [];
            lista.splice(index, 1);
            localStorage.setItem('bancoPostagem', JSON.stringify(lista));
            renderPostagens();
        }

        renderPostagens();
    </script>
</body>

</html>