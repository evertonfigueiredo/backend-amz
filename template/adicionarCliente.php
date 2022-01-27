<?php 
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
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>BackEnd AMZ | MP</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css" />
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/typicons/typicons.css" />
    <link
      rel="stylesheet"
      href="vendors/simple-line-icons/css/simple-line-icons.css"
    />
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link
      rel="stylesheet"
      href="vendors/datatables.net-bs4/dataTables.bootstrap4.css"
    />
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
      <nav
        class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row"
      >
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start"
        >
          <div class="me-3">
            <button
              class="navbar-toggler navbar-toggler align-self-center"
              type="button"
              data-bs-toggle="minimize"
            >
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
          <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-bs-toggle="offcanvas"
          >
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
              <div class="col-2"></div>
              <div class="col-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Informações do Cliente</h4>
                    <p class="card-description">
                      Informações necessárias para cadastro
                    </p>
                    <form class="forms-sample" action="class/controle.php" method="POST">
                    <input type="hidden" class="form-control" name="cadastrar" id="nome">
                      <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                      </div>
                      <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                      </div>
                      <div class="form-group">
                        <label for="fone">Fone</label>
                        <input type="number" class="form-control" id="fone" name="fone" placeholder="Fone">
                      </div>
                      <div class="form-group">
                        <label for="data">Data de Nascimento</label>
                        <input type="date" class="form-control" id="data" name="data" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="Logradouro">Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" id="Logradouro" placeholder="Logradouro">
                      </div>
                      <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
                      </div>
                      <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
                      </div>
                      <div class="form-group">
                        <label for="UF">UF</label>
                        <input type="text" class="form-control" name="uf" id="UF" placeholder="UF">
                      </div>
                      <button type="submit" class="btn btn-success me-2">Adicionar</button>
                      <a class="btn btn-light" href="clientes.php">Cancelar</a>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-2"></div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div
              class="d-sm-flex justify-content-center justify-content-sm-between"
            >
              <span
                class="text-muted text-center text-sm-left d-block d-sm-inline-block"
                >Template
                <a
                  href="https://github.com/BootstrapDash/star-admin2-free-admin-template"
                  target="_blank"
                  >Disponivel aqui</a
                >
                por BootstrapDash.</span
              >
              <span
                class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
                >Copyright © 2021. Todos os direitos reservados.</span
              >
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
