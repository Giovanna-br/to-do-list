<?php

// Classe TabelaRepositorio, que gerencia a persistência de dados da tabela (tarefas) no banco de dados.
class TabelaRepositorio
{
    // Propriedade privada que armazena a instância de PDO para conexão com o banco de dados.
    private PDO $pdo;

    /**
     * Construtor da classe, que recebe uma instância de PDO e a atribui à propriedade $pdo.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Método privado para converter os dados do banco de dados em um objeto Tabela.
    private function formarObjeto($dados)
    {
        return new Tabela(
            $dados['id'],        // ID da tarefa
            $dados['titulo'],    // Título da tarefa
            $dados['descricao'], // Descrição da tarefa
            $dados['estado']     // Estado da tarefa
        );
    }

    // Método para buscar todas as tarefas do banco de dados.
    public function buscarTodos()
    {
        $sql = "SELECT * FROM tarefas"; // Consulta SQL para selecionar todas as tarefas
        $statement = $this->pdo->query($sql); // Executa a consulta
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC); // Obtém todos os registros como um array associativo

        // Converte cada registro em um objeto Tabela usando o método formarObjeto
        $todosOsDados = array_map(function ($tarefas) {
            return $this->formarObjeto($tarefas);
        }, $dados);

        return $todosOsDados; // Retorna o array de objetos Tabela
    }

    // Método para deletar uma tarefa com base no ID fornecido.
    public function deletar(int $id)
    {
        $sql = "DELETE FROM tarefas WHERE id = ?"; // Consulta SQL para deletar uma tarefa pelo ID
        $statement = $this->pdo->prepare($sql); // Prepara a consulta
        $statement->bindValue(1, $id); // Atribui o ID ao parâmetro da consulta
        $statement->execute(); // Executa a consulta
    }

    // Método para salvar uma nova tarefa no banco de dados.
    public function salvar(Tabela $tarefas)
    {
        $sql = "INSERT INTO tarefas (titulo, descricao, estado) VALUES (?,?,?)"; // Consulta SQL para inserir uma nova tarefa
        $statement = $this->pdo->prepare($sql); // Prepara a consulta
        $statement->bindValue(1, $tarefas->getTitulo()); // Atribui o título ao parâmetro
        $statement->bindValue(2, $tarefas->getDescricao()); // Atribui a descrição ao parâmetro
        $statement->bindValue(3, $tarefas->getEstado()); // Atribui o estado ao parâmetro
        $statement->execute(); // Executa a consulta
    }

    // Método para buscar uma tarefa específica com base no ID fornecido.
    public function buscar(int $id)
    {
        $sql = "SELECT * FROM tarefas WHERE id = ?"; // Consulta SQL para buscar uma tarefa pelo ID
        $statement = $this->pdo->prepare($sql); // Prepara a consulta
        $statement->bindValue(1, $id); // Atribui o ID ao parâmetro da consulta
        $statement->execute(); // Executa a consulta

        $dados = $statement->fetch(PDO::FETCH_ASSOC); // Obtém o registro como um array associativo

        return $this->formarObjeto($dados); // Converte os dados em um objeto Tabela e o retorna
    }

    // Método para atualizar uma tarefa existente no banco de dados.
    public function atualizar(Tabela $tarefas)
    {
        $sql = "UPDATE tarefas SET titulo = ?, descricao = ?, estado = ? WHERE id = ?"; // Consulta SQL para atualizar uma tarefa

        $statement = $this->pdo->prepare($sql); // Prepara a consulta
        $statement->bindValue(1, $tarefas->getTitulo()); // Atribui o título ao parâmetro
        $statement->bindValue(2, $tarefas->getDescricao()); // Atribui a descrição ao parâmetro
        $statement->bindValue(3, $tarefas->getEstado()); // Atribui o estado ao parâmetro
        $statement->bindValue(4, $tarefas->getId()); // Atribui o ID ao parâmetro

        $statement->execute(); // Executa a consulta
    }
}
