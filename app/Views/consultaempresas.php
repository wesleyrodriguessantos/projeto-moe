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
    }

    p {
      font-size: 1.15rem;
    }

    nav {
      background-color: #512da8;
    }

    h3 {
      margin: 0 0 10px 0;
      font-size: 2.5rem;
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
  <title>Visualizar Empresas</title>
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
    <h2 class="center" style="margin-bottom: 30px;">Empresas Cadastradas</h2>

    <div class="container page-empresas">
      <div class="row">
        <div class="col s12">
          <?php if (count($empresas) > 0) : ?>
            <?php foreach ($empresas as $empresa) : ?>
              <div class="card deep-purple darken-2 center">
                <div class="card-content white-text">
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
                <div class="card-action">
                  <div>
                    <?php $interesseEmpresa = $interesse->where('id_estagiario_int', $_SESSION['id_usuario'])->where('id_empregador_int', $empresa['id_empregador'])->first() ?>
                    <?php if (!$interesseEmpresa) : ?>
                      <button class="btn btn-primario btn-interesse" data-id="<?= $empresa['id_empregador'] ?>">Cadastrar Interesse</button>
                    <?php else : ?>
                      <label style="color: #26a69a;">
                        <input type="checkbox" checked disabled>
                        <span>Você já está seguindo as vagas dessa empresa</span>
                      </label>
                    <?php endif; ?>
                  </div>
                </div>
              </div> <!-- Fim do Card -->
            <?php endforeach; ?>
          <?php else : ?>
            <h2 class="center-align">Nenhuma Empresa foi Cadastrada ainda!</h2>
          <?php endif; ?>
        </div>

      </div>
      <?php echo $pager->links(); ?>
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