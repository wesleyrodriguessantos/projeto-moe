<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="/resources/materialize/materialize.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <style>
    p b {
      font-size: 1.3rem;
    }

    p {
      font-size: 1.15rem;
    }
  </style>
  <script>
    window.onload = function() {
      $(document).ready(function() {
        $('.modal').modal();
      });
    }
  </script>
  <title>Visualizar Vagas</title>
</head>

<body class="indigo lighten-5">
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="/" class="brand-logo">MOE</a>
        <a href="#" data-target="sidenav" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/cadastrar">Cadastrar novo Usuário</a></li>
          <li><a href="/sair">Sair</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="sidenav">
    <li><a href="/cadastrar">Cadastrar novo Usuário</a></li>
    <li><a href="/sair">Sair</a></li>
  </ul>

  <?= $this->include('partials/alerts') ?>

  <main class="page" style="padding-top: 0px;">
    <h2 class="center" style="margin-bottom: 30px;">Últimas Vagas de Estágio Cadastradas</h2>

    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card deep-purple darken-2 center">
            <div class="card-content white-text">
              <span class="card-title">Título da Vaga Aqui</span>
              <p><b>Nome da Empresa Aqui</b></p>
              <p><b>Descrição da Vaga</b><br>
                Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.
              </p>
            </div>
            <!-- Modal -->
            <div id="modal1" class="modal modal-fixed-footer">
              <div class="modal-content">
                <p><b>Descrição da Vaga</b><br>
                  Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.
                </p>
                <p><b>Lista de Atividades</b><br>
                  Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.
                </p>
                <p><b>Lista de Habilidades</b><br>
                  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.
                </p>
                <p><b>Semestre Mínimo Requerido:</b> 5º</p>
                <p><b>Horas Semanais:</b> 30 Horas</p>
                <p><b>Remuneração:</b> R$ 1125,98</p>
              </div>
              <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
              </div>
            </div>

            <div class="card-action">
              <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ver mais detalhes sobre essa vaga
                <i class="material-icons right">remove_red_eye</i>
              </a>
              <button class="btn waves-effect waves-light" type="submit" name="action">
                Tenho interesse nessa vaga<i class="material-icons right">send</i>
              </button>
            </div>
          </div> <!-- Fim do Card -->


          <div class="card deep-purple darken-2 center">
            <div class="card-content white-text">
              <span class="card-title">Título da Vaga Aqui</span>
              <p><b>Nome da Empresa Aqui</b></p>
              <p><b>Descrição da Vaga</b><br>
                Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.
              </p>
            </div>
            <!-- Modal -->
            <div id="modal1" class="modal modal-fixed-footer">
              <div class="modal-content">
                <p><b>Descrição da Vaga</b><br>
                  Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.
                </p>
                <p><b>Lista de Atividades</b><br>
                  Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.
                </p>
                <p><b>Lista de Habilidades</b><br>
                  Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.
                </p>
                <p><b>Semestre Mínimo Requerido:</b> 5º</p>
                <p><b>Horas Semanais:</b> 30 Horas</p>
                <p><b>Remuneração:</b> R$ 1125,98</p>
              </div>
              <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
              </div>
            </div>

            <div class="card-action">
              <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ver mais detalhes sobre essa vaga
                <i class="material-icons right">remove_red_eye</i>
              </a>
              <button class="btn waves-effect waves-light" type="submit" name="action">
                Tenho interesse nessa vaga<i class="material-icons right">send</i>
              </button>
            </div>
          </div> <!-- Fim do Card -->
        </div>

      </div>

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