<!DOCTYPE html>
<html lang="pt-br">

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
          <li><a href="/empregador"><?= $_SESSION['nome'] ?><i class="material-icons right">person</i></a></li>
          <li><a href="/sair">Sair</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="sidenav">
    <li><a href="/empregador"><?= $_SESSION['nome'] ?><i class="material-icons right">person</i></a></li>
    <li><a href="/sair">Sair</a></li>
  </ul>

  <?= $this->include('partials/alerts') ?>

  <main class="page" style="padding-top: 0px;">
    <h2 class="center" style="margin-bottom: 30px;">Candidatos Interessados</h2>

    <div class="container page-empresas">
      <div class="row">
        <?php $estagiarioInteressado = $interesse->where('id_empregador_int', $_SESSION['id_usuario'])->first() ?>
        <?php if (count((array)$estagiarioInteressado) > 0) : ?>

          <?php foreach ($estagiarios as $estagiario) : ?>
            <?php $estagiarioInteressado = $interesse->where('id_estagiario_int', $estagiario['id_estagiario'])->where('id_empregador_int', $_SESSION['id_usuario'])->first() ?>

            <?php if (count((array)$estagiarioInteressado) > 0) : ?>

              <div class="col s12 card-wrapper">
                <div class="card grey lighten-5">
                  <div class="card-content black-text">
                    <p><b>Nome do Estudante</b><br>
                      <?= $estagiario['nome_estagiario'] ?>
                    </p>
                    <p><b>Email</b><br>
                      <a href="mailto:<?= $estagiario['email'] ?>"><?= $estagiario['email'] ?></a>
                    </p>
                    <p><b>Curso do Estudante</b><br>
                      <?= $estagiario['curso_estagiario'] ?>
                    </p>
                    <p><b>Ano de Ingresso do Estudante: </b>
                      <?= $estagiario['ano_ingresso_estagiario'] ?>
                    </p>
                    <p><b>Integralização do Estudante: </b>
                      <?= $estagiario['integralizacao'] ?>% do curso
                    </p>
                    <p><b>Minicurrículo do Estudante</b><br>
                      <?= $estagiario['minicurriculo_estagiario'] ?>
                    </p>
                  </div>
                </div>

              </div>
            <?php endif; ?>
          <?php endforeach; ?>
      </div>
    <?php else : ?>
      <div class="col s12 card-wrapper">
        <div class="card grey lighten-5">
          <div class="card-content black-text center">
            <h4 style="color: red;">Ainda não existem estudantes interessados em vagas de sua Empresa prezado(a) <?= $_SESSION['nome'] ?>!</h4>
          </div>
        </div>
      </div>
    <?php endif; ?>
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