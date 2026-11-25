<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#090909">
  <title>Painel administrativo | Voinich Motors</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="devs.css">
</head>
<body>
  <header class="topbar">
    <a class="brand" href="devs.php" aria-label="Painel Voinich Motors">
      <img src="logom-VMFinal.png" alt="Voinich Motors">
      <span><strong>VOINICH</strong><small>PAINEL ADMINISTRATIVO</small></span>
    </a>
    <a class="site-link" href="index.php"><i class="fa fa-external-link"></i> Ver site</a>
  </header>

  <main class="dashboard">
    <section class="welcome">
      <div>
        <span class="eyebrow">CENTRAL DE CONTROLE</span>
        <h1>Bem-vindo ao painel</h1>
        <p>Gerencie as informações da demonstração da Voinich Motors.</p>
      </div>
      <span class="demo-label"><i class="fa fa-flask"></i> Ambiente demonstrativo</span>
    </section>

    <section class="management" aria-label="Áreas de gerenciamento">
      <article class="module">
        <div class="module-icon"><i class="fa fa-users"></i></div>
        <div class="module-copy">
          <span class="module-kicker">GESTÃO DE CADASTROS</span>
          <h2>Clientes</h2>
          <p>Consulte e gerencie os cadastros de clientes.</p>
        </div>
        <div class="actions">
          <a href="exibirClientes.php"><i class="fa fa-list"></i> Listagem geral</a>
          <a href="loguin2.php"><i class="fa fa-plus"></i> Cadastrar</a>
          <a href="atualizaListCli.php"><i class="fa fa-pencil"></i> Atualizar</a>
          <a href="apagarCli.php"><i class="fa fa-trash"></i> Deletar</a>
        </div>
      </article>

      <article class="module featured">
        <div class="module-icon"><i class="fa fa-car"></i></div>
        <div class="module-copy">
          <span class="module-kicker">ESTOQUE</span>
          <h2>Veículos</h2>
          <p>Organize os veículos exibidos no catálogo.</p>
        </div>
        <div class="actions">
          <a href="exibirVei.php"><i class="fa fa-list"></i> Listagem geral</a>
          <a href="logvei.php"><i class="fa fa-plus"></i> Cadastrar</a>
          <a href="atualistVei.php"><i class="fa fa-pencil"></i> Atualizar</a>
          <a href="delist.php"><i class="fa fa-trash"></i> Deletar</a>
        </div>
      </article>

      <article class="module">
        <div class="module-icon"><i class="fa fa-id-badge"></i></div>
        <div class="module-copy">
          <span class="module-kicker">EQUIPE</span>
          <h2>Funcionários</h2>
          <p>Gerencie os cadastros de funcionários.</p>
        </div>
        <div class="actions">
          <a href="exibirFuncionario.php"><i class="fa fa-list"></i> Listagem geral</a>
          <a href="logfun.php"><i class="fa fa-plus"></i> Cadastrar</a>
          <a href="atualizarFun.php"><i class="fa fa-pencil"></i> Atualizar</a>
          <a href="apagalistFun.php"><i class="fa fa-trash"></i> Deletar</a>
        </div>
      </article>
    </section>

    <aside class="notice">
      <i class="fa fa-info-circle"></i>
      <p><strong>Projeto demonstrativo:</strong> utilize apenas dados fictícios durante os testes. Os atalhos mantêm as funcionalidades existentes do sistema.</p>
    </aside>
  </main>

  <footer class="footer">
    <span>VOINICH MOTORS</span>
    <span>Painel administrativo · Projeto demonstrativo</span>
  </footer>
</body>
</html>
