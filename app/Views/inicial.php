<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">

  <title>MOE - Página Inicial</title>

  <style>
    main.page {
      background-image: url(img/vaga_estagio.jpg);
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }

    @media (max-width: 1000px) {
      main.page {
        background-image: url(img/vaga_estagio.jpg);
        background-repeat: repeat;
        background-size: contain;
      }
    }
  </style>
</head>

<body class="indigo lighten-5">
  <div class="navbar-fixed">
    <nav id="navprincipal">
      <div class="nav-wrapper">
        <a href="/" class="brand-logo">MOE</a>
      </div>
    </nav>
  </div>

  <?= $this->include('partials/alerts') ?>

  <main class="page">
    <div class="container" style="margin-top: 50px;">
      <div class="row">
        <div class="col s12 l6">
          <div class="card blue-grey lighten-5 center">
            <div class="card-content">
              <span class="card-title"><b>Cadastre-se no MOE</b></span>
            </div>
            <div class="card-action">
              <a href="/cadastrar" class="waves-effect deep-purple darken-3 btn-large"><i class="material-icons right">person_add</i>Cadastrar-se</a>
            </div>
          </div>
        </div>
        <div class="col s12 l6">
          <div class="card blue-grey lighten-5 center">
            <div class="card-content">
              <span class="card-title"><b>Faça login no MOE</b></span>
            </div>
            <div class="card-action">
              <a href="/login" class="waves-effect deep-purple darken-3 btn-large"><i class="material-icons right">person_pin</i>Login</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 l6">
          <div class="card blue-grey lighten-5 center">
            <div class="card-content">
              <span class="card-title"><b>Acessar o Ambiente do Empregador</b></span>
            </div>
            <div class="card-action">
              <a href="/empregador" class="waves-effect deep-purple darken-3 btn-large"><i class="material-icons right">visibility</i>Ambiente Empregador</a>
            </div>
          </div>
        </div>
        <div class="col s12 l6">
          <div class="card blue-grey lighten-5 center">
            <div class="card-content">
              <span class="card-title"><b>Acessar o Ambiente do Estagiário</b></span>
            </div>
            <div class="card-action">
              <a href="/estagiario" class="waves-effect deep-purple darken-3 btn-large"><i class="material-icons right">visibility</i>Ambiente Estagiário</a>
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