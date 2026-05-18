<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="estilo.css">
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
            <section class="container-card">

                <article>
                    <h2>Módulo de Usuários</h2>
                    <p>Gerenciador os acessos e permissões do sistema nesta área.</p>
                    <a href="usuario.html" class="btn">Acessar</a>
                </article>

                <article>
                    <h2>Relatórios de vendas</h2>
                    <p>Acompanhar os gráficos de desempenho deste mês.</p>
                    <a href="#" class="btn">Acessar</a>
                </article>

                <article>
                    <h2>Configurações do servidor</h2>
                    <p>Ajuste as portas do apache e banco de dados</p>
                    <a href="#" class="btn">Acessar</a>
                </article>
            </section>
        </main>
    </div>

    <footer>
        <p>&copy; <span id="ano"></span> - Desenvolvido na aula de web I</p>
    </footer>

    <script>
        document.getElementById('ano').textContent = new Date().getFullYear();
    </script>
</body>

</html>