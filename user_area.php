<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Usuários</title>
</head>
<body>

<h1>Usuários</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody id="tabela"></tbody>
</table>

<br>
<a href="cadastro.html">Cadastrar novo</a>

<script>

function listar(){

    let usuarios =
        JSON.parse(localStorage.getItem("db_usuarios")) || [];

    let tabela = document.getElementById("tabela");

    tabela.innerHTML = "";

    usuarios.forEach((u, i) => {

        tabela.innerHTML += `
            <tr>
                <td>${i+1}</td>
                <td>${u.nome}</td>
                <td>${u.email}</td>

                <td>
                    <button onclick="editar(${i})">Editar</button>
                    <button onclick="deletar(${i})">Excluir</button>
                </td>
            </tr>
        `;
    });
}

function editar(i){

    let usuarios =
        JSON.parse(localStorage.getItem("db_usuarios"));

    let nome = prompt("Novo nome", usuarios[i].nome);
    let email = prompt("Novo email", usuarios[i].email);

    if(nome == "" || email == "") return;

    usuarios[i].nome = nome;
    usuarios[i].email = email;

    localStorage.setItem("db_usuarios", JSON.stringify(usuarios));

    listar();
}

function deletar(i){

    let usuarios =
        JSON.parse(localStorage.getItem("db_usuarios"));

    usuarios.splice(i, 1);

    localStorage.setItem("db_usuarios", JSON.stringify(usuarios));

    listar();
}

listar();

</script>

</body>
</html>