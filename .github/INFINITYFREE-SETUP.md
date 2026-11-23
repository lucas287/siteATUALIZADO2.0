# Configurar publicação automática no InfinityFree

O repositório usa a Vercel para publicar a pasta `visual/` e o InfinityFree para hospedar o sistema PHP/MySQL da raiz.

## 1. Obter os dados FTP

No painel da conta InfinityFree, abra **FTP Details** e localize:
- FTP Hostname
- FTP Username
- FTP Password

O destino padrão do site é a pasta `htdocs/`. Não envie a senha por mensagem ou para o repositório.

## 2. Salvar os dados como Secrets no GitHub

No repositório, acesse **Settings → Secrets and variables → Actions → New repository secret** e crie:

| Nome | Valor |
| --- | --- |
| `FTP_SERVER` | Hostname exibido em FTP Details |
| `FTP_USERNAME` | Usuário FTP exibido em FTP Details |
| `FTP_PASSWORD` | Senha FTP |

Não coloque credenciais em arquivos do projeto, commits, Issues ou mensagens.

## 3. Manter a automação desligada por enquanto

O workflow já foi preparado, mas fica bloqueado por padrão. **Não crie ainda a variável `INFINITYFREE_DEPLOY_ENABLED=true`.**

O código PHP atual ainda precisa ser adaptado à conexão MySQL do InfinityFree. O arquivo atual `conexao.php` usa `localhost/root` e senha vazia, configuração de ambiente local. Vamos ajustar também os pontos de conexão usados pelo restante do sistema antes de liberar a publicação, para não colocar uma página quebrada no ar.

## 4. Depois da adaptação do banco

Quando a conexão estiver pronta e testada, crie em **Settings → Secrets and variables → Actions → Variables**:

| Nome | Valor |
| --- | --- |
| `INFINITYFREE_DEPLOY_ENABLED` | `true` |

A partir daí, alterações na branch `main` que não sejam apenas da pasta `visual/` poderão ser enviadas automaticamente para `htdocs/`. Alterações visuais continuam sendo publicadas pela integração GitHub → Vercel.

## Segurança

- O workflow não envia `visual/`, arquivos SQL, ZIPs, arquivos README, pastas Git ou arquivos `.env`.
- O arquivo `loja.sql` contém registros de demonstração e senhas em texto puro. Não importe esses registros como dados reais nem use essas senhas em produção.
- Antes de usar cadastros reais, será necessário revisar autenticação, hash de senhas, permissões e validação dos dados.
- O FTP gratuito do InfinityFree é FTP comum (não SFTP). Use somente os secrets do GitHub para as credenciais.
