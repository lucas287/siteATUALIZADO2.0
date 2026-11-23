# Voinich Motors

Plataforma web acadêmica para apresentação e gerenciamento de veículos, desenvolvida como projeto de conclusão de curso (TCC).

O sistema reúne uma vitrine de veículos para consulta dos visitantes e páginas de apoio à administração dos registros, com integração a um banco de dados MySQL.

## Objetivo do projeto

Desenvolver uma aplicação web para uma revenda de veículos, permitindo que clientes visualizem modelos disponíveis e que a equipe gerencie informações relacionadas a veículos, clientes e funcionários.

## Funcionalidades

Com base nos arquivos presentes no repositório, o projeto inclui:

- Página inicial com veículos em destaque.
- Páginas para visualizar informações e detalhes dos veículos.
- Área de login e cadastro.
- Páginas institucionais, como contato e sobre a empresa.
- Rotinas de inclusão, consulta, atualização e exclusão de registros.
- Estrutura de banco de dados para veículos, clientes e funcionários.

> Projeto acadêmico. A disponibilidade e o funcionamento de cada fluxo dependem da configuração local do banco de dados e dos arquivos do projeto.

## Tecnologias utilizadas

- **PHP** — lógica da aplicação e integração com o banco de dados.
- **MySQL** — armazenamento dos dados.
- **HTML5** — estrutura das páginas.
- **CSS3** — estilos e layout.
- **JavaScript** — interações da interface.

## Banco de dados

O arquivo `loja.sql` contém a estrutura e dados de demonstração do banco utilizado pelo projeto.

Entre as tabelas identificadas estão:

- `clientes`
- `funcionario`
- `veiculo`

## Como executar localmente

### Pré-requisitos

- PHP.
- MySQL ou MariaDB.
- Servidor Apache (por exemplo, por meio do XAMPP).
- phpMyAdmin ou outro cliente para importar o banco.

### Passos

1. Clone este repositório:

   ```bash
   git clone https://github.com/lucas287/siteATUALIZADO2.0.git
   ```

2. Coloque a pasta do projeto no diretório público do seu servidor local (por exemplo, `htdocs` no XAMPP).
3. Inicie o Apache e o MySQL.
4. Crie um banco de dados chamado `loja`.
5. Importe o arquivo `loja.sql` pelo phpMyAdmin ou por outro cliente MySQL.
6. Confira e ajuste as configurações de conexão no arquivo `conexao.php` para o seu ambiente local.
7. Acesse o projeto pelo navegador, usando o caminho correspondente à pasta instalada. Exemplo:

   ```
   http://localhost/siteATUALIZADO2.0/
   ```

## Estrutura principal

| Arquivo | Finalidade |
| --- | --- |
| `index.php` | Página inicial do sistema |
| `conexao.php` | Configuração da conexão com o banco |
| `loja.sql` | Estrutura e dados de demonstração do banco |
| `visualizar.php` | Página de detalhes de um veículo |

O repositório também contém páginas PHP, folhas de estilo, scripts JavaScript e imagens utilizados nas demais áreas do sistema.

## Segurança e uso

Este código foi desenvolvido para fins acadêmicos e **não deve ser publicado em produção sem uma revisão técnica e de segurança**.

Antes de utilizar o sistema com dados reais:

- Remova os registros de demonstração do arquivo SQL e nunca publique dados pessoais.
- Não mantenha credenciais diretamente no código; utilize variáveis de ambiente ou configuração protegida.
- Implemente armazenamento de senhas com hash seguro (por exemplo, `password_hash()` e `password_verify()`).
- Revise autenticação, autorização, validação de entradas e consultas ao banco.
- Utilize uma conta de banco de dados própria, com permissões mínimas necessárias.

## Repositório

[GitHub — Voinich Motors](https://github.com/lucas287/siteATUALIZADO2.0)
