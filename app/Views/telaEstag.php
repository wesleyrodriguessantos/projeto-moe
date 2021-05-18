<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <title>Ambiente Estagiário</title>
</head>

<body class="indigo lighten-5">
  <div class="navbar-fixed">
    <nav id="navprincipal">
      <div class="nav-wrapper">
        <a href="/" class="brand-logo">MOE</a>
        <a href="#" data-target="sidenav" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/estagiario"><?= $_SESSION['nome'] ?><i class="material-icons right">person</i></a></li>
          <li><a href="/sair">Sair</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="sidenav">
    <li><a href="/estagiario"><?= $_SESSION['nome'] ?><i class="material-icons right">person</i></a></li>
    <li><a href="/sair">Sair</a></li>
  </ul>

  <?= $this->include('partials/alerts') ?>
  <main class="page" style="padding-top: 12px;">
    <h2 class="center" style="margin-bottom: 30px;">Seja Bem-vindo(a) <?= $_SESSION['nome'] ?>!!</h2>

    <div class="container">
      <div class="row">
        <div class="col s12 l6">
          <div class="card deep-purple accent-3 darken-1 center">
            <div class="card-content white-text">
              <span class="card-title">Alterar Dados Cadastrais</span>
            </div>
            <div class="card-action">
              <a href="/estagiario/editar/<?= $_SESSION['id_usuario'] ?>" class="waves-effect waves-light btn-large"><i class="material-icons right">mode_edit</i>Alterar</a>
            </div>
          </div>
        </div>

        <div class="col s12 l6">
          <div class="card deep-purple accent-3 darken-1 center">
            <div class="card-content white-text">
              <span class="card-title">Consultar Oportunidades de Estágio</span>
            </div>
            <div class="card-action">
              <a class="waves-effect waves-light btn-large" href="/vagas"><i class="material-icons right">web</i>Consultar</a>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col s12 l6">
          <div class="card deep-purple accent-3 darken-1 center">
            <div class="card-content white-text">
              <span class="card-title">Consultar e Seguir Empresas Cadastradas</span>
            </div>
            <div class="card-action">
              <a href="/empresas" class="waves-effect waves-light btn-large"><i class="material-icons right">home</i>Consultar</a>
            </div>
          </div>
        </div>
        <div class="col s12 l6">
          <div class="card deep-purple accent-3 darken-1 center">
            <div class="card-content white-text">
              <span class="card-title">Consultar/Editar Empresas que está Seguindo</span>
            </div>
            <div class="card-action">
              <a class="waves-effect waves-light btn-large"><i class="material-icons right">short_text</i>Consultar/Editar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <?= $this->include('partials/footer') ?>

  <script src="/resources/jquery-3.6.0.min.js"></script>
  <script src="/resources/materialize/materialize.min.js"></script>
  <script src="/resources/parsley/parsley.min.js"></script>
  <script src="/resources/parsley/pt-br.js"></script>
  <script src="/js/main.js"></script>
</body>

</html>