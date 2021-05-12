<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <title>Ambiente Empregador</title>
</head>

<body>
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="/" class="brand-logo">MOE</a>
        <a href="#" data-target="sidenav" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/cadastrar">Cadastrar novo Usuário</a></li>
          <li><a href="/sair">Sair</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="sidenav">
    <li><a href="/cadastrar">Cadastrar novo Usuário</a></li>
    <li><a href="/sair">Sair</a></li>
  </ul>

  <?php if (session()->has('success')) : ?>
    <div class="materialert success">
      <div class="material-icons">check</div>
      <?= session('success') ?>
      <button type="button" class="close-alert">×</button>
    </div>
  <?php endif ?>

  <?php if (session()->has('warning')) : ?>
    <div class="materialert warning">
      <div class="material-icons">warning</div>
      <?= session('warning') ?>
      <button type="button" class="close-alert">×</button>
    </div>
  <?php endif ?>

  <?php if (session()->has('errors')) : ?>
    <div class="materialert error">
      <div class="material-icons">error</div>
      <?php if (is_array(session('errors'))) : ?>
        <ul>
          <?php foreach (session('errors') as $error) : ?>
            <li><?= $error ?></li>
          <?php endforeach ?>
        </ul>
      <?php else : ?>
        <?= session('errors') ?>
      <?php endif ?>
      <button type="button" class="close-alert">×</button>
    </div>
  <?php endif ?>

  <main class="page">
    <h1>Você está no Ambiente do Empregador!!</h1>
  </main>

  <script src="/resources/jquery-3.6.0.min.js"></script>
  <script src="/resources/materialize/materialize.min.js"></script>
  <script src="/resources/parsley/parsley.min.js"></script>
  <script src="/resources/parsley/pt-br.js"></script>
  <script src="/js/main.js"></script>
</body>

</html>