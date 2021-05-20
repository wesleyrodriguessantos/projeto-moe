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
      font-size: 1.3rem;
    }

    p {
      font-size: 1.15rem;
    }

    nav {
      background-color: #512da8;
    }

    ul.pagination li.active {
      background-color: initial;
    }

    ul.pagination li.active a {
      color: yellow;
    }

    .pagination li a {
      color: white;
    }
  </style>
  <title>Visualizar Vagas para Edição</title>
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

  <?php
  function limitText($text, $limit)
  {
    if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos   = array_keys($words);
      $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
  }
  ?>

  <main class="page" style="padding-top: 0px;">
    <h2 class="center" style="margin-bottom: 30px;">Vagas Para Edição</h2>

    <div class="container">
      <div class="row">
        <div class="col s12">
          <?php if (count($vagas) > 0) :
            arsort($vagas);
          ?>
            <?php foreach ($vagas as $vaga) : ?>
              <?php if (($_SESSION['id_usuario'] == $vaga['id_empregadorVaga'])) : ?>
                <div class="card deep-purple darken-2 center">
                  <div class="card-content white-text">
                    <span class="card-title"><?= $vaga['nome_vaga'] ?></span>
                    <p><b>Descrição da Vaga</b><br>
                      <?= limitText($vaga['descricao_vaga'], 25) ?>
                    </p>
                    <p><b>Lista de Atividades</b><br>
                      <?= limitText($vaga['lista_atividades'], 25) ?>
                    </p>
                    <p><b>Lista de Habilidades</b><br>
                      <?= limitText($vaga['lista_habilidades'], 25) ?>
                    </p>
                    <p><b>Semestre Mínimo Requerido:</b> <?= $vaga['semestre'] ?>º</p>
                    <p><b>Horas Semanais:</b> <?= $vaga['horas'] ?> Horas</p>
                    <p><b>Remuneração:</b> R$ <?= $vaga['remuneracao'] ?></p>
                  </div>
                  <div class="card-action">
                    <a class="btn waves-effect waves-light" href="/vagas/editar/<?= $vaga['id_vaga'] ?>">
                      Editar Vaga<i class="material-icons right">send</i>
                    </a>
                  </div>
                </div> <!-- Fim do Card -->
              <?php endif; ?>
            <?php endforeach; ?>
          <?php else : ?>
            <h2 class="center-align">Nenhuma Vaga foi encontrada!</h2>
          <?php endif; ?>
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