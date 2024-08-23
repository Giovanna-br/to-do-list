<?php
require "src/conexao.php"; 
require "src/Modelo/objetos.php"; 
require "src/Repositorio/tabelasRepositorio.php";


// Verifica se o formulário foi enviado, se o botão de cadastro foi pressionado
if (isset($_POST['cadastro'])) {
    // Cria uma nova instância da classe "Tabela" com os dados enviados pelo formulário
    $tarefa = new Tabela(
        null, // ID é nulo, pois será gerado automaticamente no banco de dados
        $_POST['titulo'],
        $_POST['descricao'],
        $_POST['estado']
    );

    // Cria uma instância do repositório de tabelas e salva a tarefa no banco de dados
    $tabelaRepositorio = new TabelaRepositorio($pdo);
    $tabelaRepositorio->salvar($tarefa);

    // Redireciona para a página index.php após salvar a tarefa
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/form.css">

    <title>to-do-list</title>
</head>

<body>
    <header>
        <h2 class="titulo-cabesalho">Cadastro de Tarefas</h2>
    </header>
    <main>
        <section class="container-form">
            
            <form method="post" enctype="multipart/form-data">

                
                <label for="titulo">titulo:</label>
                <input name="titulo" type="text" id="titulo" placeholder="Digite a tarefa" required>

                
                <div class="container-radio">
                    <div>

                        <label for="nIniciado">não iniciado</label>
                        <input type="radio" id="nIniciado" name="estado" value="não iniciado" checked>

                    </div>

                    <div>

                        <label for="emAndamento">em andamento</label>
                        <input type="radio" id="emAndamento" name="estado" value="em andamento">

                    </div>
                    <div>

                        <label for="concluido">concluido</label>
                        <input type="radio" id="concluido" name="estado" value="concluido">

                    </div>
                </div>

                
                <label for="descricao">Descrição</label>
                <input name="descricao" type="text" id="descricao" placeholder="Digite uma descrição" required>

                
                <input name="cadastro" type="submit" class="botao-cadastrar" value="Cadastrar produto" />
            </form>

        </section>
    </main>
</body>

</html>
