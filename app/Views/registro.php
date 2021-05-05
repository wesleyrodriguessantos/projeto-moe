<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">

  <title>Code Igniter 4</title>

</head>

<body>

  <?php
  if (session()->has("message")) {
    echo session("message");
  }
  ?>

  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="" class="brand-logo">MOE</a>
        <a href="#" data-target="sidenav" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">

        </ul>
      </div>
    </nav>
  </div>
  <main class="page">
    <div class="registro">
      <!-- <form data-parsley-validate> -->
      <?php
      helper('form');
      echo form_open('home/novoestagiario', 'id="form1" data-parsley-validate');
      ?>
      <div class="row">
        <div class="col s12 m10 l8 card-wrapper">
          <div class="card white darken-2">
            <div class="card-content black-text">
              <span class="card-title">Criar conta</span>
              <div class="input-field">
                <i class="material-icons prefix">email</i>
                <label for="email">E-mail <span class="required">*</span></label>
                <input id="email" class="validate" type="email" name="email" value="<?= old('email') ?>" required>
                <span class="helper-text" data-error="incorreto" data-success="correto"></span>
              </div>
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
                  <span class="helper-text" data-error="incorreto" data-success="correto"></span>
                </div>
              </div>
              <div class="descricao-senha">
                <small>A senha deve possuir ao menos 6 caracteres, uma letra maiúscula, um número e um caractere especial.</small>
              </div>

              <div class="tipo-conta">

                <span class="card-title secondary center-align">Tipo da Conta</span>

                <div class="row">
                  <p class="col s6 right-align">
                    <label>
                      <input name="tipo_conta" value="estagiario" type="radio" <?= old('tipo_conta') ? (old('tipo_conta') == 'estagiario' ? 'checked' : '') : 'checked' ?> />
                      <span>Estagiário</span>
                    </label>
                  </p>
                  <p class="col s6">
                    <label>
                      <input name="tipo_conta" value="empregador" type="radio" <?= old('tipo_conta') == 'empregador' ? 'checked' : '' ?> />
                      <span>Empregador</span>
                    </label>
                  </p>
                </div>

              </div>

              <div class="estagiario">

                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">person</i>
                    <label for="nome_estagiario">Seu Nome <span class="required">*</span></label>
                    <input type="text" class="validate" name="nome_estagiario" id="nome_estagiario" value="<?= old('nome_estagiario') ?>" required>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">school</i>
                    <label for="curso_estagiario">Nome do Curso <span class="required">*</span></label>
                    <input type="text" class="validate" name="curso_estagiario" id="curso_estagiario" value="<?= old('curso_estagiario') ?>" required>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">date_range</i>
                    <label for="ano_ingresso_estagiario">Ano de Ingresso <span class="required">*</span></label>
                    <input type="text" class="validate" name="ano_ingresso_estagiario" id="ano_ingresso_estagiario" value="<?= old('ano_ingresso_estagiario') ?>" required>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">description</i>
                    <label for="minicurriculo_estagiario">Minicurrículo <span class="required">*</span></label>
                    <textarea type="text" class="materialize-textarea validate" name="minicurriculo_estagiario" id="minicurriculo_estagiario" value="<?= old('minicurriculo_estagiario') ?>" required></textarea>
                  </div>

                  <button class="btn right btn-primario" type="submit">Registrar-se</button>

                  <?= form_close(); ?>
                </div>

              </div>

              <div class="empregador d-none">

                <div class="row">
                  <?php
                  helper('form');
                  echo form_open('home/novoempregador');
                  ?>
                  <div class="input-field">
                    <i class="material-icons prefix">work</i>
                    <label for="nome_empresa">Nome da Empresa <span class="required">*</span></label>
                    <input type="text" class="validate" name="nome_empresa" id="nome_empresa" value="<?= old('nome_empresa') ?>" required>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">add_location</i>
                    <label for="endereco_empresa">Endereço da Empresa <span class="required">*</span></label>
                    <input type="text" class="validate" name="endereco_empresa" id="endereco_empresa" value="<?= old('endereco_empresa') ?>" required>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">badge</i>
                    <label for="pessoa_de_contato">Nome da Pessoa para Contato <span class="required">*</span></label>
                    <input type="text" class="validate" name="pessoa_de_contato" id="pessoa_de_contato" value="<?= old('pessoa_de_contato') ?>" required>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">description</i>
                    <label for="descricao_empresa">Descrição da Empresa <span class="required">*</span></label>
                    <textarea type="text" class="materialize-textarea validate" name="descricao_empresa" id="descricao_empresa" value="<?= old('descricao_empresa') ?>" required></textarea>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">shop</i>
                    <label for="produtos_empresa">Produtos/Serviços que Empresa oferece <span class="required">*</span></label>
                    <input type="text" class="validate" name="produtos_empresa" id="produtos_empresa" value="<?= old('produtos_empresa') ?>" required>
                  </div>

                  <label hidden for="email">Email</label>
                  <input hidden type="email" name="email" id="email2" value="" required>

                  <label hidden for="senha">Senha</label>
                  <input hidden type="password" name="senha" id="senha2" value="" required>

                  <button class="btn right btn-primario" type="submit">Registrar-se</button>

                  <?= form_close(); ?>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- </form> -->

    </div>

  </main>
  <!-- <a href="/login-estagiario">
    <button>Cadastrar Estagiário</button>
  </a>
  <a href="/login-empregador">
    <button>Cadastrar Empresa/Empregador</button>
  </a> -->
  <script>
    $('#minicurriculo_estagiario').val('New Text');
    M.textareaAutoResize($('#minicurriculo_estagiario'));

    $('#descricao_empresa').val('New Text');
    M.textareaAutoResize($('#descricao_empresa'));
  </script>
  <script src="/resources/jquery-3.6.0.min.js"></script>
  <script src="/resources/materialize/materialize.min.js"></script>
  <script src="/resources/parsley/parsley.min.js"></script>
  <script src="/resources/parsley/pt-br.js"></script>
  <script src="/js/main.js"></script>
</body>

</html>