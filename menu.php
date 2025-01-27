<?php
ini_set('session.gc_maxlifetime', 43200);
ini_set('session.cookie_lifetime', 43200);
session_start();

/*IMPORTACIONES*/

// try {
//   // include __DIR__ . "/funciones/conn3.php";
//   // include __DIR__ . "/funciones/funciones.php";
//   // include __DIR__ . "/funciones/funcionesModels.php"; // => [DEIVYD] AGREGADO 01/10/2024 - CONTIENE ALGUNAS UTILIDADES OCUPADAS EN LOS MODELOS
  include __DIR__ . "/funciones/globals.php";


//   // * INICIALIZAR LA CONFIGURACION DE USUARIO ACTUAL
//   require __DIR__ . "/Models/Nomina/Configuracion.php";
//   require __DIR__ . "/Controllers/Nomina/Configuracion.php";
//  $ControllerConfiguracion = new ConfiguracionesController($conn3);
//   $ConfigNominaUser = $ControllerConfiguracion->obtenerPorCondicion(condition: " AND idUsuario = " . $_SESSION["ID"]);
//   // $ConfigNominaUser = $ConfigNominaUser[0];
//   // * INICIALIZAR LA CONFIGURACION DE USUARIO ACTUAL

//   // include __DIR__ . "../globalesMN.php";

// } catch (\Throwable $th) {
//   echo $th->getMessage();
//   die();
// }
/*IMPORTACIONES*/
?>

<!DOCTYPE html>
<html lang="es" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default"
  class="chrome windows fontawesome-i2svg-active fontawesome-i2svg-complete navbar-vertical-collapsed">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="https://erp.medicalsoftplus.com/pseudoiconomedical.png" type="image/x-icon">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <?php
  $url_completa = $_SERVER['REQUEST_URI'];
  function obtenerUltimaParteUrl($url)
  {
    // Analizamos la URL
    $url_componentes = parse_url($url);

    // Extraemos la ruta
    $ruta = $url_componentes['path'];

    // Eliminamos cualquier barra al final de la ruta
    $ruta = rtrim($ruta, '/');

    // Explotamos la ruta por la barra '/' y tomamos el último elemento
    $partes = explode('/', $ruta);
    $ultimaParte = end($partes);

    return $ultimaParte;
  }
  
  ?>
  <title>ERP - <?php echo obtenerUltimaParteUrl($url_completa); ?></title>


  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <!-- <link rel="apple-touch-icon" sizes="180x180" href="<?= $BASE ?>assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $BASE ?>assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $BASE ?>assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $BASE ?>assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= $BASE ?>assets/img/favicons/manifest.json"> -->
  <meta name="msapplication-TileImage" content="<?= $BASE ?>assets/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">
  <script src="<?= $BASE ?>vendors/simplebar/simplebar.min.js"></script>
  <script src="<?= $BASE ?>assets/js/config.js"></script>

  <script src="<?= $BASE ?>editorNuevo.js"></script>

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
    rel="stylesheet">
  <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="assets/css/theme-rtl.css" type="text/css" rel="stylesheet" id="style-rtl">
  <link href="assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
  <link href="assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
  <link href="assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
  <script>
    var phoenixIsRTL = window.config.config.phoenixIsRTL;
    if (phoenixIsRTL) {
      var linkDefault = document.getElementById('style-default');
      var userLinkDefault = document.getElementById('user-style-default');
      linkDefault.setAttribute('disabled', true);
      userLinkDefault.setAttribute('disabled', true);
      document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
      var linkRTL = document.getElementById('style-rtl');
      var userLinkRTL = document.getElementById('user-style-rtl');
      linkRTL.setAttribute('disabled', true);
      userLinkRTL.setAttribute('disabled', true);
    }
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Orbitron:wght@400..900&display=swap"
    rel="stylesheet">


  <link href="<?= $BASE ?>vendors/leaflet/leaflet.css" rel="stylesheet">
  <link href="<?= $BASE ?>vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
  <link href="<?= $BASE ?>vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">


  <!-- DATATABLES -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <!-- DATATABLES -->
  <style>
    /* Personaliza los botones de paginación */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0.5em;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      margin: 0.2em;
      border-radius: 0.3em;
      border: 1px solid #007bff;
      color: #fff !important;
      /* color: #007bff; */
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background-color: #007bff;
      color: #fff !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
      background-color: #e9ecef;
      border-color: #e9ecef;
      color: #fff !important;
      /* color: #6c757d; */
    }
  </style>


  <!-- SWEET ALERT -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <!-- SWEET ALERT -->


  <!-- <link rel="stylesheet" href="monaros/css/main_bootstrap_sobreescritos_2.css"> -->

  <style>
    /*ALUSIVOS A LOS COLORES DE MONAROS*/
    .text-primary {
      color: #132030 !important;
    }

    .text-primary {
      color: #132030 !important;
    }

    .active {
      color: #132030 !important;
    }

    .btn-primary {
      background-color: #132030 !important;
    }

    .btn-info {
      background-color: #274161 !important;
    }

    .btn-infov2 {
      background-color: #bbd5e7 !important;
      color: #000000 !important
    }

    * {
      font-family: "Open Sans" !important;
    }

    h1,
    h2,
    h3,
    h4,
    li,
    button {
      font-weight: normal !important;
    }

    /* Para navegadores basados en Webkit (Chrome, Edge, Safari) */
    body::-webkit-scrollbar {
      border-radius: 5px;
      width: 10px;
      /* Ancho del scrollbar */
    }

    body::-webkit-scrollbar-track {
      background: transparent;
      /* Fondo del track */
    }

    body::-webkit-scrollbar-thumb {
      background-color: #888;
      /* Color del scroll */
      border-radius: 10px;
      /* Bordes redondeados */
      border: 2px solid #f1f1f1;
      /* Espaciado entre el scroll y el track */
    }

    body::-webkit-scrollbar-thumb:hover {
      background-color: #555;
      /* Color del scroll al pasar el mouse */
    }
  </style>

</head>

<body>
 
  


  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <!-- <nav class="navbar navbar-vertical navbar-expand-lg"> -->
    <!-- <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
              <li class="nav-item">
 
                <div class="nav-item-wrapper" onclick="window.location.href='FE_Facturacion'"><a class="nav-link dropdown-indicator label-1" href="#nv-CRM" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-CRM">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon-wrapper"><span class="fas fa-caret-right dropdown-indicator-icon"></span></div><span class="nav-link-icon"><span class="fa-regular fa-user"></span></span><span class="nav-link-text">Facturacion Persona</span>
                    </div>
                  </a>

                </div>
                <div class="nav-item-wrapper" onclick="window.location.href='FE_Empresa'">
                  <a class="nav-link dropdown-indicator label-1" href="#nv-project-management" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-project-management">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon-wrapper">
                        <span class="fas fa-caret-right dropdown-indicator-icon"></span>
                      </div>
                      <span class="nav-link-icon"><span class="fa-regular fa-building"></span></span><span class="nav-link-text">Facturacion Empresa</span>
                    </div>
                  </a>
                </div>
                
            </ul>
          </div>
        </div> -->
    <!-- <div class="navbar-vertical-footer"> -->
    <!-- <button class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button> -->
    <!-- </div> -->
    <!-- </nav> -->