<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário</title>
</head>

<body>
  <?php
  helper('form');
  echo form_open('home/novoestagiario');
  ?>
  <label for="nome_estagiario">Seu Nome</label>
  <input type="text" name="nome_estagiario" id="nome_estagiario" required> <br>

  <label for="email">Email</label>
  <input type="email" name="email" id="email" value="<?= old('email') ?>" required> <br>

  <label for="senha">Senha</label>
  <input type="password" name="senha" id="senha" value="<?= old('senha') ?>" required> <br>

  <label for="curso_estagiario">Curso Estagiário</label>
  <input type="text" name="curso_estagiario" required> <br>

  <label for="ano_ingresso_estagiario">Ano de Ingresso</label>
  <input type="text" name="ano_ingresso_estagiario" required> <br>

  <label for="minicurriculo_estagiario">Uma rápida descrição de você</label>
  <input type="text" name="minicurriculo_estagiario" required> <br>

  <input type="submit" value="Salvar no Banco">
  <?= form_close(); ?>
</body>

</html>