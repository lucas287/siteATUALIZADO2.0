# Voinich Motors — Sistema de venda de veículos

Projeto acadêmico de uma plataforma web para apresentação e gerenciamento de veículos.

## Tecnologias

- PHP
- MySQL
- HTML
- CSS
- JavaScript

## Funcionalidades identificadas no projeto

- Página inicial com veículos em destaque
- Páginas de detalhes dos veículos
- Telas de login e cadastro
- Páginas de contato e informações
- Estrutura de banco de dados para clientes, funcionários e veículos

## Estrutura e banco de dados

- `index.php`: página inicial
- `conexao.php`: conexão local com o banco de dados
- `loja.sql`: estrutura e dados de demonstração do banco MySQL

## Executar localmente

1. Instale PHP, MySQL e um ambiente local como XAMPP.
2. Copie o projeto para a pasta pública do servidor local.
3. Crie um banco chamado `loja`.
4. Importe o arquivo `loja.sql` pelo phpMyAdmin ou pelo cliente MySQL.
5. Ajuste a configuração de conexão em `conexao.php` para o seu ambiente.
6. Inicie Apache e MySQL e acesse `http://localhost/siteATUALIZADO2.0/` (ajuste o caminho conforme a pasta utilizada).

## Observação de segurança

Este repositório representa um projeto acadêmico e não deve ser colocado em produção sem uma revisão de segurança. A configuração atual de conexão é voltada ao ambiente local; antes de hospedar, mova credenciais para variáveis de ambiente, revise o armazenamento de senhas e remova dados de demonstração que não devam ser publicados.

## Repositório

https://github.com/lucas287/siteATUALIZADO2.0
