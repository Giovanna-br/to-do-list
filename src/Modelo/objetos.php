<?php
class Tabela // Definição da classe Tabela, que representa uma tarefa ou item a ser cadastrado.
{
    // Propriedades privadas da classe, que armazenam os dados da tabela (tarefa).
    private ?int $id; // O ID da tarefa, pode ser nulo (indica que é um novo registro).
    private string $titulo;
    private string $descricao;
    private string $estado; // O estado da tarefa (não iniciado, em andamento, concluído).

    // Construtor da classe, que inicializa os atributos com os valores passados.
    public function __construct(?int $id, string $titulo, string $descricao, string $estado)
    {

        // Atribuindo os valorores.
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->estado = $estado;
    }
    // Retorna os respectivos getters da tarefa.
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }
}
