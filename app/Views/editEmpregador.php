<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">

  <title>Tela de atualização de Cadastro do Empregador/Empresa - MOE</title>

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
  if ($_SESSION['id_usuario'] != $_SESSION['id_parametrizado1']) :
    redirect()->back()->withInput()->with('warning', 'Acesso Negado, você não tem permissão para alterar esse registro!!');
  ?>
  <?php else : ?>
    <main class="page">
      <div class="registro">
        <form action="/empregador/edit/<?= $_SESSION['id_usuario'] ?>" method="POST" data-parsley-validate>
          <div class="row">
            <div class="col s12 m10 card-wrapper">
              <div class="card grey lighten-5">
                <div class="card-content black-text">
                  <span class="card-title center-align"><b>Atualizar Registro</b></span>
                  <div class="row">
                    <div class="input-field col s12 m6">
                      <i class="material-icons prefix">password</i>
                      <label for="senha">Senha <span class="required">*</span></label>
                      <input id="senha" class="validate" type="password" name="senha" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}" minlength="6" maxlength="40" required>
                      <span class="helper-text" data-error="incorreto" data-success="correto"></span>
                    </div>
                    <div class="input-field col s12 m6 senha-confirm">
                      <label for="senha_confirm">Confirme a senha <span class="required">*</span></label>
                      <input id="senha_confirm" class="validate" type="password" name="senha_confirm" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}" minlength="6" maxlength="40" data-parsley-equalto="#senha" data-parsley-trigger="focusout" required>
                      <span class=" helper-text" data-error="incorreto" data-success="correto"></span>
                    </div>
                  </div>
                  <div class="descricao-senha">
                    <small>A senha deve possuir ao menos 6 caracteres, uma letra maiúscula, um número e um caractere especial.</small>
                  </div>

                  <div class="empregador">
                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">work</i>
                        <label for="nome_empresa">Nome da Empresa <span class="required">*</span></label>
                        <input type="text" class="validate" name="nome_empresa" id="nome_empresa" value="<?= $empregador['nome_empresa'] ?>" maxlength="60" required>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">add_location</i>
                        <label for="endereco_empresa">Endereço da Empresa <span class="required">*</span></label>
                        <input type="text" class="validate" name="endereco_empresa" id="endereco_empresa" value="<?= $empregador['endereco_empresa'] ?>" maxlength="80" required>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">badge</i>
                        <label for="pessoa_de_contato">Nome da Pessoa para Contato <span class="required">*</span></label>
                        <input type="text" class="validate" name="pessoa_de_contato" id="pessoa_de_contato" value="<?= $empregador['pessoa_de_contato'] ?>" maxlength="60" required>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">description</i>
                        <label for="descricao_empresa">Descrição da Empresa <span class="required">*</span></label>
                        <textarea type="text" class="materialize-textarea validate" name="descricao_empresa" id="descricao_empresa" required><?= $empregador['descricao_empresa'] ?></textarea>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">shop</i>
                        <label for="produtos_empresa">Produtos/Serviços que Empresa oferece <span class="required">*</span></label>
                        <input type="text" class="validate" name="produtos_empresa" id="produtos_empresa" value="<?= $empregador['produtos_empresa'] ?>" maxlength="220" required>
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
      $('#descricao_empresa').val('New Text');
      M.textareaAutoResize($('#descricao_empresa'));
    </script>
    <script src="/resources/jquery-3.6.0.min.js"></script>
    <script src="/resources/materialize/materialize.min.js"></script>
    <script src="/resources/parsley/parsley.min.js"></script>
    <script src="/resources/parsley/pt-br.js"></script>
    <script src="/js/main.js"></script>
</body>
<?php endif; ?>

</html>