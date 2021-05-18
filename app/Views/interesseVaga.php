<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <style>
    p b {
      font-size: 1.2rem;
      margin-bottom: 10px;
    }

    .card .card-content p {
      margin-bottom: 20px;
    }

    p {
      font-size: 1.15rem;
    }
  </style>
  <title>Visualizar Vagas</title>
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

  <main class="page" style="padding-top: 0px;">
    <h2 class="center" style="margin-bottom: 30px;"><?= $vaga['nome_vaga'] ?></h2>

    <div class="container">
      <div class="row">
        <div class="col s12 card-wrapper">
          <div class="card grey lighten-5">
            <div class="card-content black-text">
              <p><b>Descrição da Vaga</b><br>
                <?= $vaga['descricao_vaga'] ?>
              </p>
              <p><b>Lista de Atividades</b><br>
                <?= $vaga['lista_atividades'] ?>
              </p>
              <p><b>Lista de Habilidades</b><br>
                <?= $vaga['lista_habilidades'] ?>
              </p>
              <p><b>Semestre Mínimo Requerido:</b> <?= $vaga['semestre'] ?>º</p>
              <p><b>Horas Semanais:</b> <?= $vaga['horas'] ?> Horas</p>
              <p><b>Remuneração:</b> R$ <?= $vaga['remuneracao'] ?></p>
            </div>
            <div class="card-action" style="text-align: right">
              <div>
                <label>
                  <input type="checkbox">
                  <span>Confirmar Interesse</span>
                </label>
              </div>
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