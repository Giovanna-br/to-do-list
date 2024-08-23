<?php
require "src/conexao.php"; // Inclui o arquivo de conexão com o banco de dados.
require "src/Modelo/objetos.php"; // Inclui o arquivo que define a classe Tabela.
require "src/Repositorio/tabelasRepositorio.php"; // Inclui o arquivo que contém a classe TabelaRepositorio.

$tabelaRepositorio = new TabelaRepositorio($pdo); // Instancia a classe TabelaRepositorio utilizando a conexão PDO.
$dadosTodos = $tabelaRepositorio->buscarTodos(); // Chama o método buscarTodos para obter todas as tarefas do banco de dados.
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css"> <!-- Inclui o arquivo de CSS para resetar estilos padrão. -->
  <link rel="stylesheet" href="css/index.css"> <!-- Inclui o arquivo de CSS para estilos gerais da página. -->
  <link rel="stylesheet" href="css/form.css"> <!-- Inclui o arquivo de CSS para estilização de formulários. -->
  <title>Gerenciador de Tarefas</title> <!-- Define o título da página. -->
</head>

<body>

  <header>
    <h2 class="titulo-cabesalho">Gerenciador de Tarefas</h2> <!-- Cabeçalho da página com o título. -->
  </header>
  <main>
    <section class="container-section">
      <table class="container-table"> <!-- Cria uma tabela para exibir as tarefas. -->
        <thead>
          <tr>
            <th class="th-form">id</th> <!-- Cabeçalho da coluna ID. -->
            <th class="th-form">Titulo</th> <!-- Cabeçalho da coluna Título. -->
            <th class="th-form">Descrição</th> <!-- Cabeçalho da coluna Descrição. -->
            <th class="th-form">Estado</th> <!-- Cabeçalho da coluna Estado. -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dadosTodos as $dados): ?> <!-- Itera sobre todas as tarefas para exibir cada uma na tabela. -->
            <tr class="tarefas-form">
              <td><?= $dados->getId() ?></td> <!-- Exibe o ID da tarefa. -->
              <td><?= $dados->getTitulo() ?></td> <!-- Exibe o título da tarefa. -->
              <td><?= $dados->getDescricao() ?></td> <!-- Exibe a descrição da tarefa. -->
              <td><?= $dados->getEstado() ?></td> <!-- Exibe o estado da tarefa. -->

              <td class="td-botao"><a class="botao-editar" href="editar-tarefas.php?id=<?= $dados->getId() ?>">Editar</a></td> <!-- Link para editar a tarefa selecionada. -->
              <td class="td-botao">
                <form action="excluir-tarefas.php" method="post"> <!-- Formulário para excluir a tarefa. -->
                  <input type="hidden" name="id" value="<?= $dados->getId() ?>"> <!-- Campo oculto para enviar o ID da tarefa a ser excluída. -->
                  <input type="submit" class="botao-excluir" value="Excluir"> <!-- Botão para enviar o formulário e excluir a tarefa. -->
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <a class="botao-cadastrar" href="cadastrar-tarefas.php">Cadastrar produto</a> <!-- Link para cadastrar uma nova tarefa. -->
    </section>
  </main>
  <footer>

  </footer>
</body>

</html>