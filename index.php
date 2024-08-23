<?php
require "src/conexao.php"; 
require "src/Modelo/objetos.php";
require "src/Repositorio/tabelasRepositorio.php";

$tabelaRepositorio = new TabelaRepositorio($pdo); // Instancia a classe TabelaRepositorio utilizando a conexão PDO.
$dadosTodos = $tabelaRepositorio->buscarTodos(); // Chama o método buscarTodos para obter todas as tarefas do banco de dados.
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css"> <!-- Inclui o arquivo de CSS para resetar estilos padrão. -->
  <link rel="stylesheet" href="css/index.css"> 
  <link rel="stylesheet" href="css/form.css"> 
  <title>Gerenciador de Tarefas</title> 
</head>

<body>

  <header>
    <h2 class="titulo-cabesalho">Gerenciador de Tarefas</h2> 
  </header>
  <main>
    <section class="container-section">
      <table class="container-table"> 
        <thead>
          <tr>
            <th class="th-form">id</th>
            <th class="th-form">Titulo</th>
            <th class="th-form">Descrição</th>
            <th class="th-form">Estado</th> 
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dadosTodos as $dados): ?> <!-- Itera sobre todas as tarefas para exibir cada uma na tabela. -->
            <tr class="tarefas-form"><!-- Exibe o conteudo da tarefa. -->
              <td><?= $dados->getId() ?></td> 
              <td><?= $dados->getTitulo() ?></td>
              <td><?= $dados->getDescricao() ?></td> 
              <td><?= $dados->getEstado() ?></td> 

              <td class="td-botao"><a class="botao-editar" href="editar-tarefas.php?id=<?= $dados->getId() ?>">Editar</a></td>
              <td class="td-botao">
                <form action="excluir-tarefas.php" method="post"> 
                  <input type="hidden" name="id" value="<?= $dados->getId() ?>"> 
                  <input type="submit" class="botao-excluir" value="Excluir"> 
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <a class="botao-cadastrar" href="cadastrar-tarefas.php">Cadastrar produto</a> 
    </section>
  </main>
  <footer>

  </footer>
</body>

</html>
