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
  <div class="page">
    <div class="registro">
      <!-- <form action="/registrar" method="POST" data-parsley-validate> -->
      <?php
      helper('form');
      echo form_open('home/novoestagiario');
      ?>
      <div class="row">
        <div class="col s12 m10 l8 card-wrapper">
          <div class="card white darken-2">
            <div class="card-content black-text">
              <span class="card-title">Criar conta</span>
              <div class="input-field">
                <i class="material-icons prefix">email</i>
                <label for="email">E-mail <span class="required">*</span></label>
                <input id="email" type="email" name="email" placeholder="E-mail" value="<?= old('email') ?>" maxlength="50" required>
              </div>

              <div class="row">

                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">password</i>
                  <label for="senha">Senha <span class="required">*</span></label>
                  <input id="senha" type="password" name="senha" placeholder="Senha" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}" minlength="6" maxlength="50" required>
                </div>
                <!-- <div class="input-field col s12 m6 senha-confirm">
                    <label for="senha_confirm">Confirmação da Senha <span class="required">*</span></label>
                    <input id="senha_confirm" type="password" name="senha_confirm" placeholder="Senha" minlength="6" maxlength="50" data-parsley-equalto="#senha" required>
                  </div> -->

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

                  <label for="nome_estagiario">Seu Nome</label>
                  <input type="text" name="nome_estagiario" id="nome_estagiario" required> <br>

                  <label for="curso_estagiario">Curso Estagiário</label>
                  <input type="text" name="curso_estagiario" required> <br>

                  <label for="ano_ingresso_estagiario">Ano de Ingresso</label>
                  <input type="text" name="ano_ingresso_estagiario" required> <br>

                  <label for="minicurriculo_estagiario">Uma rápida descrição de você</label>
                  <input type="text" name="minicurriculo_estagiario" required> <br>

                  <!-- <label hidden for="email">Email</label>
                  <input hidden type="email" name="email" id="email2" value="" required> <br>

                  <label for="senha">Senha</label>
                  <input type="password" name="senha" id="senha2" value="" required> <br> -->

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
                  <label for="nome_empresa">Nome da Empresa</label>
                  <input type="text" name="nome_empresa" required> <br>

                  <label for="endereco_empresa">Endereço da Empresa</label>
                  <input type="text" name="endereco_empresa" required> <br>

                  <label for="pessoa_de_contato">Pessoa para Contato</label>
                  <input type="text" name="pessoa_de_contato" required> <br>

                  <label for="descricao_empresa">Descrição da Empresa</label>
                  <input type="text" name="descricao_empresa" required> <br>

                  <label for="produtos_empresa">Produtos da Empresa</label>
                  <input type="text" name="produtos_empresa" required> <br>

                  <label hidden for="email">Email</label>
                  <input hidden type="email" name="email" id="email2" value="" required> <br>

                  <label hidden for="senha">Senha</label>
                  <input hidden type="password" name="senha" id="senha2" value="" required> <br>

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

  </div>
  <!-- <a href="/login-estagiario">
    <button>Cadastrar Estagiário</button>
  </a>
  <a href="/login-empregador">
    <button>Cadastrar Empresa/Empregador</button>
  </a> -->
  <script>
  </script>
  <script src="/resources/jquery-3.6.0.min.js"></script>
  <script src="/resources/materialize/materialize.min.js"></script>
  <script src="/resources/parsley/parsley.min.js"></script>
  <script src="/resources/parsley/pt-br.js"></script>
  <script src="/js/main.js"></script>
</body>

</html>