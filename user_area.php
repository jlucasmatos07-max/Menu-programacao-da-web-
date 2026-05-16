
<!--area de gerenciamento de usúario-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de usúarios</title>
    <link rel ="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
    include 'sidebar.php'
    ?>


    <main>
        <div class="header-container">
            <h1>Gerenciamento de usúarios</h1>
            <p>gerencie as configurações do usuário</p>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nome</th>
                        <th>e-mail</th>
                        <th>acesso</th>
                        <th>status</th>
                        <th>ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>lucas matos</td>
                        <td>lucasmatos2727@example.com</td>
                        <td>administrador</td>
                        <td><span class= "badge ativo">ativo</span></td>
                        <td> <a href= "#" class= "btn-acao btn-editar">
                             <i class="fa-solid fa-pen-to-square"></i> </a>
                            <a href= "#" class= "btn-acao btn-excluir"></a>
                            <i class= "fa-solid fa-trash"></i></button></td>

                    </tr>
                    <tr>
                        <td>02</td>
                        <td>kwjgrhfjkm,se</td>
                        <td>kwjgrhfjkm,se@example.com</td>
                        <td>editor</td>
                        <td><span class= "badge ativo">ativo</span></td>
                        <td> <a href= "#" class= "btn-acao btn-editar">
                             <i class="fa-solid fa-pen-to-square"></i> </a>
                            <a href= "#" class= "btn-acao btn-excluir"></a>
                            <i class= "fa-solid fa-trash"></i></button></td>
                    </tr>
                        <thead>
                
                </thead>
                <tbody>
                    <tr>
                        <td>03</td>
                        <td>duda silva</td>
                        <td>dudasilva2504@example.com</td>
                        <td>usúario</td>
                        <td><span class= "badge inativo">inativo</span></td>
                        <td> <a href= "#" class= "btn-acao btn-editar">
                             <i class="fa-solid fa-pen-to-square"></i> </a>
                            <a href= "#" class= "btn-acao btn-excluir"></a>
                            <i class= "fa-solid fa-trash"></i></button></td>

                    </tr>
                </tbody>
            </table>


    </main>
    <script>
        // LISTAR
function listarUsuarios(){

    let listaUsuarios =
        JSON.parse(localStorage.getItem("login_users.php")) || [];

    let tabela =
        document.getElementById("tabelaUsuarios");

    tabela.innerHTML = "";

    for(let i = 0; i < listaUsuarios.length; i++){

        tabela.innerHTML += `

            <tr>

                <td>${listaUsuarios[i].nome}</td>

                <td>${listaUsuarios[i].email}</td>

                <td>

                    <button onclick="editarUsuario(${i})">
                        Editar
                    </button>

                    <button onclick="excluirUsuario(${i})">
                        Excluir
                    </button>

                </td>

            </tr>

        `;
    }
}


// EXCLUIR
function excluirUsuario(index){

    let listaUsuarios =
        JSON.parse(localStorage.getItem("login_users.php")) || [];

    listaUsuarios.splice(index, 1);

    localStorage.setItem(
        "login_users.php",
        JSON.stringify(listaUsuarios)
    );

    listarUsuarios();
}


// EDITAR
function editarUsuario(index){

    let listaUsuarios =
        JSON.parse(localStorage.getItem("login_users.php")) || [];

    let novoNome = prompt(
        "Digite o novo nome",
        listaUsuarios[index].nome
    );

    let novoEmail = prompt(
        "Digite o novo email",
        listaUsuarios[index].email
    );

    if(novoNome == "" || novoEmail == ""){

        alert("Campos inválidos");

        return;
    }

    listaUsuarios[index].nome = novoNome;
    listaUsuarios[index].email = novoEmail;

    localStorage.setItem(
        "login_users.php",
        JSON.stringify(listaUsuarios)
    );

    listarUsuarios();
}


// CARREGA A LISTA
listarUsuarios();
    </script>
</body>
</html>