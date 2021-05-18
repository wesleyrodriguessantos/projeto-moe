<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">

  <title>Tela de Login - MOE</title>

</head>

<body class="indigo lighten-5">
  <div class="navbar-fixed">
    <nav id="navprincipal">
      <div class="nav-wrapper">
        <a href="/" class="brand-logo">MOE</a>
        <a href="#" data-target="sidenav" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/cadastrar">Cadastrar</a></li>
          <li><a href="/login">Entrar</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="sidenav">
    <li><a href="/cadastrar">Cadastrar</a></li>
    <li><a href="/login">Entrar</a></li>
  </ul>

  <?= $this->include('partials/alerts') ?>

  <main class="page">
    <div class="registro center">
      <form action="/login_action" method="POST">
        <div class="row">
          <div class="col s12 m10 l8 card-wrapper">
            <div class="card grey lighten-5">
              <div class="card-content black-text">
                <span class="card-title center-align"><b>Login - MOE</b></span>
                <div class="input-field">
                  <i class="material-icons prefix">email</i>
                  <label for="email">E-mail</label>
                  <input id="email" class="validate" type="email" name="email" value="<?= old('email') ?>" maxlength="100" required>
                </div>

                <div class="input-field">
                  <i class="material-icons prefix">password</i>
                  <label for="senha">Senha</label>
                  <input id="senha" class="validate" type="password" name="senha" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}" minlength="6" maxlength="40" required>
                </div>

                <button class="btn btn-primario" type="submit">Entrar</button>
              </div>
            </div>
          </div>
        </div>
      </form>
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