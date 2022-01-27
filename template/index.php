<?php
  require_once 'class/Funcoes.class.php';
  $aniversariosDoDia = Lista::AniversarianteDoDia();
  $aniversariosDoMes = Lista::AniversarianteDoMes();
  require_once 'class/Login.class.php';
  if (!Sessao::estaLogado()) {
    header('Location: ../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>BackEnd AMZ | MP</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css" />
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
  <link rel="stylesheet" href="vendors/typicons/typicons.css" />
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css" />
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css" />
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
  <link rel="stylesheet" href="js/select.dataTables.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css" />
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.php">
            <img src="images/logo.jpg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">
              Bem vindo, <span class="text-black fw-bold"><?php echo $_SESSION['Name']; ?></span>
            </h1>
            <h3 class="welcome-sub-text">
              Este é o seu sistema de gerenciamento de Clientes
            </h3>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Inicial</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="clientes.php">
              <i class="menu-icon mdi mdi-account-multiple"></i>
              <span class="menu-title">Clientes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../doLogout.php">
              <i class="menu-icon mdi mdi-exit-to-app"></i>
              <span class="menu-title">Sair</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="Visão geral" aria-selected="true">Visão geral</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-evenly">
                          <div>
                            <p class="statistics-title">
                              Clientes Cadastrados
                            </p>
                            <h3 class="rate-percentage"><?php echo Lista::QuantidadeCadastrada(); ?></h3>
                          </div>
                          <div>
                            <p class="statistics-title">
                              Aniversários do Dia
                            </p>
                            <h3 class="rate-percentage"><?php echo Lista::QtdAniversarianteDoDia(); ?></h3>
                          </div>
                          <div>
                            <p class="statistics-title">
                              Aniversários no Mês
                            </p>
                            <h3 class="rate-percentage"><?php echo Lista::QtdAniversarianteDoMes(); ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Aniversariantes do Dia</h4>
                            <div class="table-responsive">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                    <th>Data de Nascimento</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  foreach ($aniversariosDoDia as $cliente) {

                                  ?>
                                    <tr>
                                      <td><?php echo $cliente->id; ?></td>
                                      <td><?php echo $cliente->nome; ?></td>
                                      <td><?php echo $cliente->email; ?></td>
                                      <td><?php echo Converter::DataTela($cliente->dataNasc); ?></td>
                                    </tr>
                                  <?php
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Aniversariantes do Mês</h4>
                            <div class="table-responsive">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Usuário</th>
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                    <th>Data de Nascimento</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($aniversariosDoMes as $cliente) {
                                  ?>
                                    <tr>
                                      <td><?php echo $cliente->id; ?></td>
                                      <td><?php echo $cliente->nome; ?></td>
                                      <td><?php echo $cliente->email; ?></td>
                                      <td><?php echo Converter::DataTela($cliente->dataNasc); ?></td>
                                    </tr>
                                  <?php
                                    }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Template
              <a href="https://github.com/BootstrapDash/star-admin2-free-admin-template" target="_blank">Disponivel aqui</a>
              por BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. Todos os direitos reservados.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>