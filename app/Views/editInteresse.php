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
    <h3 class="center" style="margin-bottom: 30px;">Confira as empresas que você está seguindo</h3>

    <div class="container page-empresasInteresse">
      <div class="row">
        <?php if (count($empresas) > 0) : ?>
          <div class="col s12 card-wrapper">
            <?php foreach ($empresas as $empresa) : ?>
              <div class="card grey lighten-5">
                <div class="card-content black-text">

                  <h3><?= $empresa['nome_empresa'] ?></h3>
                  <hr>
                  <p><b>Descrição da Empresa</b><br>
                    <?= $empresa['descricao_empresa'] ?>
                  </p>
                  <p><b>Email</b><br>
                    <a href="mailto:<?= $empresa['email'] ?>"><?= $empresa['email'] ?></a>
                  </p>
                  <p><b>Endereço</b><br>
                    <?= $empresa['endereco_empresa'] ?>
                  </p>
                  <p><b>Pessoa de Contato</b><br>
                    <?= $empresa['pessoa_de_contato'] ?>
                  </p>
                  <p><b>Produtos/Serviços que a empresa oferece:</b><br>
                    <?= $empresa['produtos_empresa'] ?>
                  </p>
                </div>
                <div class="card-action" style="text-align: center">
                  <div>
                    <button class="btn btn-apagar btn-interesse" data-id="<?= $empresa['id_empregador'] ?>">Descadastrar Interesse</button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

        <?php else : ?>
          <div class="col s12 card-wrapper">
            <div class="card grey lighten-5">
              <div class="card-content black-text center">
                <h4 style="color: red;">Nenhuma empresa foi encontrada prezado(a) <?= $_SESSION['nome'] ?>!</h4>
              </div>
            </div>
          </div>
        <?php endif; ?>
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