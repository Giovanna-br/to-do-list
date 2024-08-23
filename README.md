# to-do-list

Este projeto é uma aplicação simples de gerenciamento de tarefas desenvolvida em PHP. Ele permite que os usuários criem, editem, excluam e visualizem tarefas em um banco de dados MySQL.

## Funcionalidades

- **Cadastro de Tarefas**: Adicione novas tarefas com título, descrição e estado.
- **Edição de Tarefas**: Modifique tarefas existentes.
- **Exclusão de Tarefas**: Remova tarefas do sistema.
- **Visualização de Tarefas**: Exiba uma lista de todas as tarefas cadastradas.

## Estrutura do Projeto
- src/conexao.php => Arquivo de conexão com o banco de dados
- Modelo/objetos.php => Definição da classe Tabela
- Repositorio/tabelasRepositorio.php => Repositório para operações CRUD com tarefas

- cadastrar-tarefas.php => Página para cadastrar novas tarefas
- editar-tarefas.php => Página para editar tarefas existentes
- excluir-tarefas.php => Script para excluir tarefas
- index.php => Página principal para visualizar todas as tarefas


## Pré-requisitos

- **PHP** (versão 7.4 ou superior)
- **MySQL** (ou MariaDB)
- **Servidor Web** (por exemplo, Apache)

## Configuração

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/Giovanna-br/to-do-list.git

2. **Configure o banco de dados:**

   1. abra seu gerenciador MySQL e importe o arquivo **database_api_rest .sql**.
   2. Atualize as credenciais do banco de dados no arquivo src/conexao.php se necessário.

3. **Configuração do servidor web:**

Coloque o projeto no diretório do servidor web configurado (por exemplo, htdocs para Apache) e acesse http://localhost/seu-repositorio.
