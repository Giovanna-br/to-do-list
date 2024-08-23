<?php
require "src/conexao.php";
require "src/Modelo/objetos.php";
require "src/Repositorio/tabelasRepositorio.php";

// Cria uma instância do repositório de tabelas, passando a conexão PDO.
$tabelaRepositorio = new TabelaRepositorio($pdo);

// Chama o método deletar do repositório, passando o ID da tarefa que deve ser deletada.
// O ID é obtido através de um formulário, onde o campo 'id' foi enviado via método POST.
$tabelaRepositorio->deletar($_POST['id']);

// Redireciona para a página principal após a exclusão da tarefa.
header("Location: index.php");
