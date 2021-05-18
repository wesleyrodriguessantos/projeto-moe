<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">

  <title>Tela de atualização de Cadastro do Estagiário - MOE</title>

</head>

<body class="indigo lighten-5">
  <div class="navbar-fixed">
    <nav id="navprincipal">
      <div class="nav-wrapper">
        <a href="/" class="brand-logo">MOE</a>
        <a href="#" data-target="sidenav" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/login">Login</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="sidenav">
    <li><a href="/cadastrar">Cadastrar</a></li>
    <li><a href="/login">Entrar</a></li>
  </ul>

  <?= $this->include('partials/alerts') ?>

  <?php
  if ($_SESSION['id_usuario'] != $_SESSION['id_parametrizado']) :
    redirect()->back()->withInput()->with('warning', 'Acesso Negado, você não tem permissão para alterar esse registro!!');
  ?>
  <?php else : ?>
    <main class="page">
      <div class="registro">
        <form action="/estagio/store" method="POST" data-parsley-validate>
          <div class="row">
            <div class="col s12 m10 card-wrapper">
              <div class="card grey lighten-5">
                <div class="card-content black-text">
                  <span class="card-title center-align"><b>Criar conta</b></span>
                  <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <label for="email">E-mail <span class="required">*</span></label>
                    <input id="email" class="validate" type="email" name="email" value="<?= $estagiario['email'] ?>" maxlength="100" required>
                    <span class="helper-text" data-error="incorreto" data-success="correto"></span>
                  </div>
                  <div class="row">
                    <div class="input-field col s12 m6">
                      <i class="material-icons prefix">password</i>
                      <label for="senha">Senha <span class="required">*</span></label>
                      <input id="senha" class="validate" type="password" name="senha" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}" minlength="6" maxlength="40" value="<?= $estagiario['senha'] ?>" required>
                      <span class="helper-text" data-error="incorreto" data-success="correto"></span>
                    </div>
                    <div class="input-field col s12 m6 senha-confirm">
                      <label for="senha_confirm">Confirme a senha <span class="required">*</span></label>
                      <input id="senha_confirm" class="validate" type="password" name="senha_confirm" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}" minlength="6" maxlength="40" data-parsley-equalto="#senha" data-parsley-trigger="focusout" value="<?= $estagiario['senha'] ?> required>
                    <span class=" helper-text" data-error="incorreto" data-success="correto"></span>
                    </div>
                  </div>
                  <div class="descricao-senha">
                    <small>A senha deve possuir ao menos 6 caracteres, uma letra maiúscula, um número e um caractere especial.</small>
                  </div>

                  <div class="estagiario">

                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <label for="nome_estagiario">Seu Nome <span class="required">*</span></label>
                        <input type="text" class="validate" name="nome_estagiario" id="nome_estagiario" value="<?= $estagiario['nome_estagiario'] ?>" maxlength="80" required>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">school</i>
                        <label for="curso_estagiario">Nome do Curso <span class="required">*</span></label>
                        <input type="text" class="validate" name="curso_estagiario" id="curso_estagiario" value="<?= $estagiario['curso_estagiario'] ?>" maxlength="80" required>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">date_range</i>
                        <label for="ano_ingresso_estagiario">Ano de Ingresso <span class="required">*</span></label>
                        <input type="number" class="validate" name="ano_ingresso_estagiario" id="ano_ingresso_estagiario" value="<?= $estagiario['ano_ingresso_estagiario'] ?>" required>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">access_time</i>
                        <label for="integralizacao">Integralização Atual <span class="required">*</span></label>
                        <input type="number" class="validate" name="integralizacao" id="integralizacao" min="0" max="100" value="<?= $estagiario['integralizacao'] ?>" required>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">description</i>
                        <label for="minicurriculo_estagiario">Minicurrículo <span class="required">*</span></label>
                        <textarea type="text" class="materialize-textarea validate" name="minicurriculo_estagiario" id="minicurriculo_estagiario" required>
                      <?= $estagiario['minicurriculo_estagiario'] ?>
                      </textarea>
                      </div>

                      <button class="btn right btn-primario" type="submit">Atualizar Dados</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>
    <?= $this->include('partials/footer') ?>

    <script>
      $('#minicurriculo_estagiario').val('New Text');
      M.textareaAutoResize($('#minicurriculo_estagiario'));
    </script>
    <script src="/resources/jquery-3.6.0.min.js"></script>
    <script src="/resources/materialize/materialize.min.js"></script>
    <script src="/resources/parsley/parsley.min.js"></script>
    <script src="/resources/parsley/pt-br.js"></script>
    <script src="/js/main.js"></script>
</body>
<?php endif; ?>

</html>