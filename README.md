# Simple IPLogger

## Descrição

Este repositório contém o código fonte de um ip logger simples
escrito em `PHP` que usa o banco de dados `sqlite3`.

Este ip logger te permite gerar links espiões e vigiar quem os acessa.

## Objetivo

O projeto foi feito para o módulo 3 do curso CtrlYoung da
escola de programação CtrlPlay.
O objetivo do projeto é que alunos consigam usar PHP em conjunto com o
`sqlite3` para criar uma aplicação simples.

## Dependencias

Para executar o projeto você precisará de:

`php`
`sqlite3`

### PHP

<https://www.php.net/manual/en/install.php>

### Sqlite

<https://www.sqlite.org/download.html>

#### Sqlite no replit

Para instalar o sqlite no replit siga estes passos:

1. Crie um projeto `PHP Web Server`.
2. Abra a aba `shell`
3. Digite `sqlite3 --version` e aperte <kbd>Enter</kbd>

output:

```output
sqlite3: command not installed. Multiple versions of this command were found in Nix.
Select one to run (or press Ctrl-C to cancel):
>
sqlite.bin
sqliteInteractive.bin
sqlite-replication.bin
```

4. Escolha a opção `sqlite.bin` e aperte <kbd>Enter</kbd>
5. O programa será instalado automaticamente


## Configuração

Antes de executar o projeto é necessário criar o arquivo do banco de dados.
Para isso use o comando:

```bash
php cfg.php
```

Será criado o arquivo `database.db`.

Para alterar o nome do arquivo usado para o banco de dados
bem como os nomes das tabelas altere, o arquivo `dbManager.php`.

## Execução

Caso não esteja em um ambiente como o replit que
,já vem configurado para execução.

Você poderá executar o projeto usando o comando:

```bash
php -S 0.0.0.0:8000
```

Assim o servidor será iniciado na porta 8000.

Acesse o projeto digitando `0.0.0.0:8000` em seu navegador.
