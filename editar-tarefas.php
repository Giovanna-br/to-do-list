<?php
require "src/conexao.php";
require "src/Modelo/objetos.php";
require "src/Repositorio/tabelasRepositorio.php";

// Cria uma instância do repositório de tabelas, passando a conexão PDO.
$tabelaRepositorio = new TabelaRepositorio($pdo);

// Verifica se o formulário de edição foi submetido (se existe a variável $_POST['editar']).
if (isset($_POST['editar'])) {
  // Cria um novo objeto Tabela com os dados do formulário.
  // O ID é obtido via $_GET['id'], enquanto o título, descrição e estado vêm do formulário ($_POST).
  $tarefa = new Tabela($_GET['id'], $_POST['titulo'], $_POST['descricao'], $_POST['estado']);

  // aciona a função atualizar 
  $tabelaRepositorio->atualizar($tarefa);

  // Redireciona para a página principal após a atualização.
  header("Location: index.php");
} else {
  // Se o formulário não foi submetido, busca a tarefa específica pelo ID fornecido via $_GET['id'].
  $tarefa = $tabelaRepositorio->buscar($_GET['id']);
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

  <title>Document</title>
</head>

<body>
  <header>
    <h2 class="titulo-cabesalho">Editor de Tarefas</h2>
  </header>
  <main>
    <section class="container-form">
      <form method="post" enctype="multipart/form-data">
       
        <label for="titulo">titulo</label>
        <input type="text" id="titulo" name="titulo" placeholder="Digite o titulo" value="<?= $tarefa->getTitulo() ?>" required>

        <div class="container-radio">
          <div>
            <label for="nIniciado">não iniciado</label>
            <input type="radio" id="nIniciado" name="estado" value="não iniciado" <?= $tarefa->getEstado() == "não iniciado" ? "checked" : "" ?>> <!-- se o valos estdo for igual a "não iniciado" deixe marcado, se não retorne limpo -->
          </div>
          <div>
            <label for="emAndamento">em andamento</label>
            <input type="radio" id="emAndamento" name="estado" value="em andamento" <?= $tarefa->getEstado() == "em andamento" ? "checked" : "" ?>>
          </div>
          <div>
            <label for="concluido1">concluido</label>
            <input type="radio" id="concluido1" name="estado" value="concluido" <?= $tarefa->getEstado() == "concluído" ? "checked" : "" ?>>
          </div>
        </div>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" value="<?= $tarefa->getDescricao() ?>" placeholder="Digite uma descrição" required>

        <input type="submit" name="editar" class="botao-cadastrar" value="Editar produto" />
      </form>
    </section>
  </main>
</body>

</html>
