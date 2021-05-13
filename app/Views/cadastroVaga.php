<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">

  <title>Tela de Cadastro de Vagas - MOE</title>

</head>

<body class="indigo lighten-5">
  <div class="navbar-fixed">
    <nav>
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

  <main class="page">
    <div class="registro">
      <?php
      helper('form');
      echo form_open('vagacontroller/novaVaga', 'data-parsley-validate');
      ?>
      <div class="row">
        <div class="col s12 m10 card-wrapper">
          <div class="card grey lighten-5">
            <div class="card-content black-text">
              <span class="card-title center-align">Formulário para Cadastro de Vagas - MOE</span>
              <div class="input-field">
                <i class="material-icons prefix">person</i>
                <label for="nome_vaga">Nome para a Vaga <span class="required">*</span></label>
                <input type="text" class="validate" name="nome_vaga" id="nome_vaga" value="<?= old('nome_vaga') ?>" maxlength="80" required>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">description</i>
                <label for="descricao_vaga">Descrição sobre a Vaga <span class="required">*</span></label>
                <textarea type="text" class="materialize-textarea validate" name="descricao_vaga" id="descricao_vaga" value="<?= old('minicurriculo_estagiario') ?>" required></textarea>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">school</i>
                <label for="horas">Horas Semanais <span class="required">*</span></label>
                <input type="text" class="validate" name="horas" id="horas" value="<?= old('horas') ?>" maxlength="80" required>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">school</i>
                <label for="remuneracao">Remuneração Mensal <span class="required">*</span></label>
                <input type="text" class="validate" name="remuneracao" id="remuneracao" value="<?= old('remuneracao') ?>" maxlength="80" required>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">date_range</i>
                <label for="semestre">Semestre Minimo Requerido <span class="required">*</span></label>
                <input type="number" class="validate" name="semestre" id="semestre" value="<?= old('semestre') ?>" required>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">description</i>
                <label for="lista_atividades">Lista de Atividadaes <span class="required">*</span></label>
                <textarea type="text" class="materialize-textarea validate" name="lista_atividades" id="lista_atividades" value="<?= old('minicurriculo_estagiario') ?>" required></textarea>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">description</i>
                <label for="lista_habilidades">Lista de Habilidades <span class="required">*</span></label>
                <textarea type="text" class="materialize-textarea validate" name="lista_habilidades" id="lista_habilidades" value="<?= old('minicurriculo_estagiario') ?>" required></textarea>
              </div>

              <label hidden for="id_empregadorVaga">Id Empregador</label>
              <input hidden type="id_empregadorVaga" name="id_empregadorVaga" id="id_empregadorVaga" value="<?= $_SESSION['id_usuario'] ?>" required>

              <div class="row">
                <button class="btn right btn-primario" type="submit">Cadastrar Vaga</button>
              </div>

              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    $('#lista_habilidades').val('New Text');
    M.textareaAutoResize($('#lista_habilidades'));

    $('#lista_atividades').val('New Text');
    M.textareaAutoResize($('#lista_atividades'));

    $('#descricao_vaga').val('New Text');
    M.textareaAutoResize($('#descricao_vaga'));
  </script>
  <script src="/resources/jquery-3.6.0.min.js"></script>
  <script src="/resources/materialize/materialize.min.js"></script>
  <script src="/resources/parsley/parsley.min.js"></script>
  <script src="/resources/parsley/pt-br.js"></script>
  <script src="/js/main.js"></script>
</body>

</html>