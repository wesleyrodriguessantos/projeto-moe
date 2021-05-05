<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário Empregaor</title>
</head>

<body>
  <?php
  helper('form');
  echo form_open('home/novoempregador');
  ?>
  <label for="nome_empresa">Nome da Empresa</label>
  <input type="text" name="nome_empresa" required> <br>

  <label for="endereco_empresa">Endereço da Empresa</label>
  <input type="text" name="endereco_empresa" required> <br>

  <label for="email">Email</label>
  <input type="email" name="email" id="email" required> <br>

  <label for="senha">Senha</label>
  <input type="password" name="senha" id="senha" required> <br>

  <label for="pessoa_de_contato">Pessoa para Contato</label>
  <input type="text" name="pessoa_de_contato" required> <br>

  <label for="descricao_empresa">Descrição da Empresa</label>
  <input type="text" name="descricao_empresa" required> <br>

  <label for="produtos_empresa">Produtos da Empresa</label>
  <input type="text" name="produtos_empresa" required> <br>

  <input type="submit" value="Salvar no Banco">
  <?= form_close(); ?>
</body>

</html>