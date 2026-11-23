# Configurar publicação automática no InfinityFree

O repositório usa a Vercel para publicar a pasta `visual/` e o InfinityFree para hospedar o sistema PHP/MySQL da raiz.

## 1. Dados FTP

No painel da conta InfinityFree, em **FTP Details**, localize o hostname, usuário e senha FTP. O destino do site é `htdocs/`.

## 2. Secrets do GitHub

No repositório, acesse **Settings → Secrets and variables → Actions → New repository secret** e mantenha estes secrets cadastrados:

| Nome | Uso |
| --- | --- |
| `FTP_SERVER` | Hostname FTP da hospedagem |
| `FTP_USERNAME` | Usuário FTP |
| `FTP_PASSWORD` | Senha FTP da hospedagem |
| `MYSQL_PASSWORD` | Senha do banco MySQL da Voinich |

As senhas FTP e MySQL são diferentes. Não coloque credenciais em arquivos do projeto, commits, Issues ou mensagens.

## 3. Configuração PHP

Os arquivos `conexao.php` e `conexaolistar.php` agora usam o carregador compartilhado `database_config.php`.

Durante a publicação, o GitHub Actions gera `config.local.php` com os dados do banco da hospedagem e a senha obtida de `MYSQL_PASSWORD`. Esse arquivo:
- não é versionado no Git (está no `.gitignore`);
- é criado apenas durante a execução do workflow;
- é enviado para `htdocs/` junto com o PHP para que a aplicação consiga conectar ao MySQL.

Os dados de conexão configurados para a hospedagem são o host `sql109.infinityfree.com`, banco `if0_43515581_VoinichMotors`, usuário `if0_43515581` e porta `3306`.

## 4. Ativar a publicação

A automação continua bloqueada por padrão. Só depois de confirmar que os quatro secrets estão cadastrados e que o banco foi importado corretamente, crie em **Settings → Secrets and variables → Actions → Variables**:

| Nome | Valor |
| --- | --- |
| `INFINITYFREE_DEPLOY_ENABLED` | `true` |

A partir daí, alterações na branch `main` que não sejam apenas da pasta `visual/` poderão ser enviadas automaticamente para `htdocs/`. Alterações visuais continuam sendo publicadas pela integração GitHub → Vercel.

## Segurança e limitações

- O workflow não envia `visual/`, arquivos SQL, ZIPs, arquivos README, pastas Git ou arquivos `.env`.
- O arquivo `config.local.php` contém a senha MySQL e não deve ser copiado para o repositório nem compartilhado.
- Os registros de `loja.sql` foram identificados pelo usuário como dados fictícios de demonstração. Não os reutilize como dados reais.
- Antes de usar cadastros reais, será necessário revisar autenticação, hash de senhas, permissões e validação dos dados.
- O FTP gratuito do InfinityFree é FTP comum (não SFTP). As credenciais ficam armazenadas nos Secrets do GitHub.
