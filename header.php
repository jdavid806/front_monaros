<style>
  * {
    font-size: large;
  }
</style>
<link rel="stylesheet" href="fuentes/fuentes.css">
<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
  <div class="collapse navbar-collapse justify-content-between">
    <div class="navbar-logo">

      <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
      <a class="navbar-brand me-1 me-sm-3" href="Dashboard">
        <div class="d-flex align-items-center">
          <div class="d-flex align-items-center"><img src="../logo_monaros_sinbg.png" alt="medical" width="50%" />
          </div>
        </div>
      </a>
    </div>
    <div class="col-8 d-flex justify-content-start">
      <div class="search-box navbar-top-search-box d-none d-lg-block" data-list='{"valueNames":["title"]}' style="width:25rem;">
        <form class="d-flex position-relative" data-bs-toggle="search" data-bs-display="static" method="GET" action="">
          <input class="form-control search-input fuzzy-search rounded-pill form-control-sm me-2" type="search" placeholder="Buscar..." aria-label="Search" />
          <span class="fas fa-search search-box-icon"></span>
        </form>

        <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search">
          <button class="btn btn-link p-0" aria-label="Close"></button>
        </div>
        <div class="dropdown-menu border start-0 py-0 overflow-hidden w-100">
          <div class="scrollbar-overlay" style="max-height: 30rem;">
            <div class="list pb-3">
              <h6 class="dropdown-header text-body-highlight fs-10 py-2">24 <span class="text-body-quaternary">resultados</span></h6>
              <hr class="my-0" />
              <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Recientemente buscado</h6>
              <hr class="my-0" />
              <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Clientes</h6>
              <hr class="my-0" />
              <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">No. Factura</h6>
            </div>
            <div class="text-center">
              <p class="fallback fw-bold fs-7 d-none">No se encontraron resultados.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2 d-flex justify-content-end">
      <ul class="navbar-nav navbar-nav-icons flex-row">
        <li class="nav-item">
          <div class="theme-control-toggle fa-icon-wait px-2">
            <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
            <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Cambiar tema" style="height:32px;width:32px;"><span class="icon" data-feather="moon"></span></label>
            <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Cambiar tema" style="height:32px;width:32px;"><span class="icon" data-feather="sun"></span></label>
          </div>
        </li>
  
        <li class="nav-item dropdown mb5">
          <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">
            <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
              <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
              <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
            </svg></a>

          <!-- <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border"  aria-labelledby="navbarDropdownNindeDots"> -->
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border" style="width:23vw !important" aria-labelledby="navbarDropdownNindeDots">
            <div class="card bg-body-emphasis position-relative border-0">
              <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 11rem;">
                <div class="row text-center align-items-center gx-0 gy-0">
                  <div class="col-4">
                    <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="FE_FCE"><img src="assets/img/nav-icons/Container.png" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Facturacion</p>
                    </a>
                  </div>
                  <div class="col-4">
                    <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="FE_Config">
                      <img src="assets/img/nav-icons/CashButton.png" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Configuracion</p>
                    </a>
                  </div>

                  <div class="col-4"><a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="RIPS_Report"><img src="assets/img/nav-icons/IconButton.png" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Reportes</p>
                    </a>
                  </div>

                  <div class="col-4"><a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="FE_Contabilidad"><img src="assets/img/nav-icons/Calculator.png" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Contabilidad</p>
                    </a>
                  </div>

                  <div class="col-4"><a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="FE_Nomina"><img src="assets/img/nav-icons/Calculator.png" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Nomina</p>
                    </a>
                  </div>

                  <div class="col-4"><a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="FE_Autorizaciones"><img src="assets/img/nav-icons/Container.png" alt="" width="30" />
                      <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Autorizaciones</p>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown mb5"><a class="nav-link lh-1 pe-0 d-flex align-items-center" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-l me-2"><img class="rounded-circle" src="<?= $ConfigNominaUser['logoBase64'] ?>" alt="" />
            </div>
            <!-- <div class="avatar avatar-l me-2">
              <p class="mb-0 fs-10 text-body-emphasis">Jerry Seinfield</p>
              <p class="mb-0 text-center fw-bold fs-10 text-body-quaternary">Cardiologo</p>
            </div> -->
          </a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border" aria-labelledby="navbarDropdownUser">
            <div class="card position-relative border-0">
              <div class="card-body p-0">
                <div class="text-center pt-4 pb-3">
                  <div class="avatar avatar-xl ">
                    <img class="rounded-circle " src="<?= $ConfigNominaUser['logoBase64'] ?>" alt="" />

                  </div>
                </div>
                <!--
                    <div class="mb-3 mx-3">
                      <input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" />
                    </div>
                    -->
              </div>
              <div class="overflow-auto scrollbar" style="height: 5rem;">
                <ul class="nav d-flex flex-column mb-2 pb-1">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="ConfigProfile"> <span class="me-2 text-body align-bottom" data-feather="user"></span><span>Perfil</span></a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#"><span class="me-2 text-body align-bottom" data-feather="archive"></span>Respaldos</a></li>
                </ul>
              </div>
              <div class="card-footer p-0 border-top border-translucent">
                <ul class="nav d-flex flex-column my-3">
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#settings-offcanvas" data-bs-toggle="offcanvas"> <span class="me-2 text-body align-bottom" data-feather="sliders"></span>Personalización</a></li>
                  <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="user-plus"></span>Generar Soporte</a></li>
                </ul>
                <hr />

                <?php
                ini_set('session.cookie_lifetime', 0);
                session_start();
                $sistema = $_SESSION['sistema'];


                ?>
                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="funciones/salir.php"> <span class="me-2" data-feather="log-out"> </span>Cerrar Sesión</a></div>
                <div class="my-2 text-center fw-bold fs-10 text-body-quaternary">
                  <div>
                    <a class="text-body-quaternary me-1" href="#!">Politicas de Privacidad</a>
                  </div>
                  <div>
                    <a class="text-body-quaternary mx-1" href="#!">Terminos y Condiciones</a>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>