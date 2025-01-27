<?php
include "../menu.php";
include "../header.php";


$Base = 'https://erp.medicalsoftplus.com/FE/';


$dropdownNew = '<div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-plus"></i> &nbsp; Nuevo
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalTipoFactura">Facturacion Cliente</a></li>
                    <!-- <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNuevaFacturaCliente">Facturacion Cliente</a></li> -->
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNuevaFacturaEmpresa">Facturacion Entidad</a></li>
                    <li><a class="dropdown-item" onclick="notaDC(1, true)">Nota Crédito</a></li>
                    <li><a class="dropdown-item" onclick="notaDC(2, true)">Nota Débito</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNuevoDocumentoSoporte">Documento soporte</a></li>
                  </ul>
                </div>';


// <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#">Compra</a></li>

include "./IncludeDatosPrueba.php";

?>

<style type="text/css">
  


  .custom-btn {
    width: 150px; /* Establece el ancho fijo */
    height: 40px; /* Establece la altura fija */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-bottom: 5px; /* Espaciado opcional entre botones */
}

.custom-btn i {
    margin-right: 5px; /* Espaciado entre el ícono y el texto */
}
</style>
<div class="componete">
  <div class="content">
    <div class="container-small">
      <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="portada">Inicio</a></li>
          <li class="breadcrumb-item active" onclick="location.reload()">Facturacion</li>
        </ol>
      </nav>
      <div class="pb-9">
        <div class="row">
          <div class="col-12">
            <div class="col-10">
              <div class="col-12 row col-md-auto">
                <div class="col-6">
                  <h2 class="mb-0">Facturacion</h2>
                </div>
                <div class="col-6 text-end" style="z-index: 999999999999999999999999999999999999999999999999999999999">

                </div>
              </div>
              <div class="col-12 col-md-auto">
                <div class="d-flex">
                  <div class="flex-1 d-md-none">
                    <button class="btn px-3 btn-phoenix-secondary text-body-tertiary me-2" data-phoenix-toggle="offcanvas"
                      data-phoenix-target="#productFilterColumn"><span class="fa-solid fa-bars"></span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-0 g-md-4 g-xl-6">

          <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="lead-details-container">
              <nav class="navbar pb-4 px-0 sticky-top bg-body nav-underline-scrollspy" id="navbar-deals-detail">
                <ul class="nav nav-underline fs-9" role="tablist">
                  <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" role="tab" aria-selected="true" onclick="showSections('content-facturas-facturas')">Facturacion
                      Ventas</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" onclick="showSections('content-facturas-compras')">Facturacion Compras</a></li> -->
                  <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-facturas-ndebito')">Nota
                      débito</a></li>
                  <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-facturas-ncredito')">Nota
                      crédito</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-facturas-soporte')">Documento
                      soporte</a></li> -->
                </ul>
              </nav>
              <div class="scrollspy-example rounded-2" data-bs-spy="scroll" data-bs-offset="0"
                data-bs-target="#navbar-deals-detail" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                tabindex="0">

                <div class="mb-8" id="content-facturas-facturas">
                  <!-- Facturacion Ventas -->
                  <div class=" col-12 row mb-4"
                    id="scrollspyFacturacionVentas">
                    <div class="col-6">
                      <h4 class="mb-1" id="scrollspyFacturacionVentas">Facturacion Ventas</h4>
                    </div>
                    <div class="col-6 text-end">
                      <?= $dropdownNew ?>
                    </div>
                    <div class="col-2">
                      <input type="date" value="<?= date("Y-m-d") ?>" class="form-control col-md-6">
                    </div>
                    <div class="col-2">
                      <input type="date" value="<?= date("Y-m-d") ?>" class="form-control col-md-6">
                    </div>
                  </div>
                  <!-- =========== TABLE ========== -->
                  <div class="col-12 row">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row gx-3">
                          <div class="col-12">
                            <table class="table table-sm fs-9 mb-0 tableDataTableSearch">
                              <thead>
                                <tr>
                                  <th class="sort border-top border-translucent ps-3" data-sort="number">N° de Factura</th>
                                  <th class="sort border-top" data-sort="date">Fecha</th>
                                  <th class="sort border-top" data-sort="user">Encargado</th>
                                  <th class="sort border-top" data-sort="customer">Cliente</th>
                                  <th class="sort border-top" data-sort="id">Identificacion</th>
                                  <th class="sort border-top" data-sort="type">Tipo</th>
                                  <th class="sort text-end align-middle pe-0 border-top" scope="col"></th>
                                </tr>
                              </thead>
                              <tbody class="list">
                                <?php
                                $arraytest_ventas = obtenerVentas();

                                foreach ($arraytest_ventas as $value) { ?>
                                  <tr>
                                    <td class="align-middle ps-3 number"><?= $value["Factura"] ?></td>
                                    <td class="align-middle date"><?= $value["Fecha"] ?></td>
                                    <td class="align-middle user"><?= $value["Encargado"] ?></td>
                                    <td class="align-middle customer"><?= $value["Cliente"] ?></td>
                                    <td class="align-middle id"><?= $value["Identificacion"] ?></td>
                                    <td class="align-middle type"><?= $value["Tipo"] ?></td>
                                    <td class="align-middle white-space-nowrap pe-0 p-3">
                                      <!--<button style="margin-right:10px" class="btn btn-sm btn-outline-secondary" type="button" id="prefactura" data-id="118"> <i class="fas fa-eye"></i> &nbsp; Previsualizar</button>-->
                                      <a class='dropdown-item' href='Imprimir_Factura?idOperacion=<?php echo $value['idOperacion']; ?>' target='_blank'>
    <button class="btn btn-sm btn-outline-secondary custom-btn" type="button">
        <i class="fas fa-eye"></i> &nbsp;&nbsp;&nbsp; Ver
    </button>
</a>
<a class='dropdown-item' href='Descargar_Factura?idOperacion=<?php echo $value['idOperacion']; ?>' target='_blank'>
    <button class="btn btn-sm btn-outline-secondary custom-btn" type="button">
        <i class="fas fa-download"></i> &nbsp;&nbsp;&nbsp; Descargar
    </button>
</a>
                                       <!--<a class="btn btn-primary" href="Descargar_Factura?idOperacion=<?php echo $value['idOperacion']; ?>" target="_blank">
    Descargar Factura
</a>-->
                                      <!-- Enlace del botón -->
<!--<a class="dropdown-item" id="descargarFacturaBtn" href="#" target="_blank">
    <i style="margin-right:10px" class="fas fa-down-long"></i>
    <i class="fas fa-bars"></i> Descargar PDF
</a>

<script>
    // Variables dinámicas
    let baseURL = '<?=$Base?>'; // Asegúrate de que $Base esté definida en tu PHP
    let idOperacion = <?php echo $value['idOperacion']; ?>;

    // Construir URL para la descarga
    let urlPdf = baseURL + 'Imprimir_FacturaPDF?idOperacion=' + idOperacion;
    let urlAbrir = 'Descargar_Factura?idOperacion=' + idOperacion + '&urlOpen=' + btoa(urlPdf);

    // Asignar la URL dinámica al atributo href del enlace
    document.getElementById('descargarFacturaBtn').href = urlAbrir;
</script>-->
                                    </td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="modalPrevisualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Previsualizar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <!-- Aquí se cargará el iframe -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



                  <!-- ========= TABLE =========== -->
                </div>

                <div class="mb-8" id="content-facturas-compras">
                  <div class=" col-12 row mb-4"
                    id="scrollspyFacturacionCompras">
                    <div class="col-6">
                      <h4 class="mb-1">Facturacion Compras</h4>
                    </div>
                    <div class="col-6 text-end">
                      <?= $dropdownNew ?>
                    </div>
                    <div class="col-2">
                      <input type="date" value="<?= date("Y-m-d") ?>" class="form-control">
                    </div>
                    <div class="col-2">
                      <input type="date" value="<?= date("Y-m-d") ?>" class="form-control">
                    </div>
                  </div>


                  <div class="col-12 row">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row gx-3">
                          <div class="col-12">
                            <table class="table table-sm fs-9 mb-0 tableDataTableSearch">
                              <thead>
                                <tr>
                                  <th class="sort border-top border-translucent ps-3" data-sort="number">N° de compra</th>
                                  <th class="sort border-top" data-sort="date">Fecha</th>
                                  <th class="sort border-top" data-sort="user">Encargado</th>
                                  <th class="sort border-top" data-sort="customer">Cliente/Proveedor</th>
                                  <th class="sort border-top" data-sort="id">NIT</th>
                                  <th class="sort border-top" data-sort="type">Tipo</th>
                                  <th class="sort text-end align-middle pe-0 border-top" scope="col"> </th>
                                </tr>
                              </thead>
                              <tbody class="list">
                                <?php

                                foreach ($arraytest_compra as $value) { ?>
                                  <tr>
                                    <td class="align-middle ps-3 number"><?= $value["Factura"] ?></td>
                                    <td class="align-middle date"><?= date("Y-m-d") ?></td>
                                    <td class="align-middle user"><?= $value["Encargado"] ?></td>
                                    <td class="align-middle customer"><?= $value["Nombre"] ?></td>
                                    <td class="align-middle id"><?= $value["Identificacion"] ?></td>
                                    <td class="align-middle type"><?= $value["Tipo"] ?></td>
                                    <td class="align-middle white-space-nowrap pe-0 p-3">
                                      <button style="margin-right:10px" class="btn btn-sm btn-outline-secondary" type="button"> <i
                                          class="fas fa-eye"></i> &nbsp; Previsualizar</button>
                                      <i style="margin-right:10px" class="fas fa-down-long"></i>
                                      <i class="fas fa-bars"></i>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="mb-8" id="content-facturas-ndebito">
                  <div class=" col-12 row mb-4" id="scrollspyNotaDebito">
                    <div class="col-12 row">
                      <div class="col-6">
                        <h4 class="mb-2" id="scrollspyNotaDebito">Nota de debito</h4>
                      </div>
                      <div class="col-6 text-end">
                        <?= $dropdownNew ?>
                      </div>
                      <div class="col-2">
                        <input type="date" value="<?= date("Y-m-d") ?>" class="form-control">
                      </div>
                      <div class="col-2">
                        <input type="date" value="<?= date("Y-m-d") ?>" class="form-control">
                      </div>
                    </div>
                  </div>


                  <div class="col-12 row">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row gx-3">
                          <div class="col-12">
                            <table id="" class="table table-sm fs-9 mb-0 tableDataTableSearch">
                              <thead>
                                <tr>
                                  <th>N° de Nota</th>
                                  <th>N° de Factura</th>
                                  <th>Fecha</th>
                                  <th>Encargado</th>
                                  <th>Cliente/Proveedor</th>
                                  <th>NIT/CC</th>
                                  <th>Tipo</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                foreach ($arraytest_nd as $value) { ?>
                                  <tr>
                                    <td class="align-middle ps-3 number"><?= $value["Nota"] ?></td>
                                    <td class="align-middle ps-3 number"><?= $value["Factura"] ?></td>
                                    <td class="align-middle date"><?= date("Y-m-d") ?></td>
                                    <td class="align-middle user"><?= $value["Encargado"] ?></td>
                                    <td class="align-middle customer"><?= $value["Nombre"] ?></td>
                                    <td class="align-middle id"><?= $value["Identificacion"] ?></td>
                                    <td class="align-middle type"><?= $value["Tipo"] ?></td>
                                    <td class="align-middle white-space-nowrap pe-0 p-3">
                                      <button style="margin-right:10px" class="btn btn-sm btn-outline-secondary" type="button">
                                        <i class="fas fa-eye"></i> &nbsp; Previsualizar
                                      </button>
                                      <i style="margin-right:10px" class="fas fa-down-long"></i>
                                      <i class="fas fa-bars"></i>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>


                <!-- notas de credito -->
                <div class="mb-8" id="content-facturas-ncredito">
                  <div class=" col-12 row mb-4"
                    id="scrollspyNotaCredito">
                    <div class="col-12 row">
                      <div class="col-6">
                        <h4 class="mb-2" id="scrollspyNotaCredito">Nota de crédito</h4>
                      </div>
                      <div class="col-6 text-end">
                        <?= $dropdownNew ?>
                      </div>
                      <div class="col-2">
                        <input type="date" value="<?= date("Y-m-d") ?>" class="form-control col-md-6">
                      </div>
                      <div class="col-2">
                        <input type="date" value="<?= date("Y-m-d") ?>" class="form-control col-md-6">
                      </div>

                    </div>
                  </div>

                  <div class="col-12 row">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row gx-3">
                          <div class="col-12">
                            <table id="" class="table table-sm fs-9 mb-0 tableDataTableSearch">
                              <thead>
                                <tr>
                                  <th>N° de Nota</th>
                                  <th>N° de Factura</th>
                                  <th>Fecha</th>
                                  <th>Encargado</th>
                                  <th>Cliente/Proveedor</th>
                                  <th>NIT/CC</th>
                                  <th>Tipo</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $arraytest_nc = obtenerVentasNC();

                                foreach ($arraytest_nc as $value) { ?>
                                  <tr>
                                    <td class="align-middle ps-3 number"><?= $value["Nota"] ?></td>
                                    <td class="align-middle ps-3 number"><?= $value["Factura"] ?></td>
                                    <td class="align-middle date"><?= date("Y-m-d") ?></td>
                                    <td class="align-middle user"><?= $value["Encargado"] ?></td>
                                    <td class="align-middle customer"><?= $value["Nombre"] ?></td>
                                    <td class="align-middle id"><?= $value["Identificacion"] ?></td>
                                    <td class="align-middle type"><?= $value["Tipo"] ?></td>
                                    <td class="align-middle white-space-nowrap pe-0 p-3">
                                      <button style="margin-right:10px" class="btn btn-sm btn-outline-secondary" type="button">
                                        <i class="fas fa-eye"></i> &nbsp; Previsualizar
                                      </button>
                                      <i style="margin-right:10px" class="fas fa-down-long"></i>
                                      <i class="fas fa-bars"></i>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
                <!-- notas de credito -->


                <!-- documentos soporte -->
                <div class="mb-8" id="content-facturas-soporte">
                  <div class=" col-12 row mb-4"
                    id="scrollspyFacturacionCompras">
                    <div class="col-6">
                      <h4 class="mb-2" id="scrollspyFacturacionCompras">Documentos soporte</h4>
                    </div>
                    <div class="col-6 text-end">
                      <?= $dropdownNew ?>
                    </div>
                    <div class="col-2">
                      <input type="date" value="<?= date("Y-m-d") ?>" class="form-control col-md-6">
                    </div>
                    <div class="col-2">
                      <input type="date" value="<?= date("Y-m-d") ?>" class="form-control col-md-6">
                    </div>
                  </div>

                  <div class="col-12 row">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row gx-3">
                          <div class="col-12">
                            <table id="" class="table table-sm fs-9 mb-0 tableDataTableSearch">
                              <thead>
                                <tr>
                                  <th>N° de Documento</th>
                                  <th>Fecha</th>
                                  <th>Encargado</th>
                                  <th>Cliente/Proveedor</th>
                                  <th>NIT/CC</th>
                                  <th>Tipo</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

                                foreach ($arraytest_ds as $value) { ?>
                                  <tr>
                                    <td class="align-middle ps-3 number"><?= $value["Nota"] ?></td>
                                    <td class="align-middle date"><?= date("Y-m-d") ?></td>
                                    <td class="align-middle user"><?= $value["Encargado"] ?></td>
                                    <td class="align-middle customer"><?= $value["Nombre"] ?></td>
                                    <td class="align-middle id"><?= $value["Identificacion"] ?></td>
                                    <td class="align-middle type"><?= $value["Tipo"] ?></td>
                                    <td class="align-middle white-space-nowrap pe-0 p-3">
                                      <button style="margin-right:10px" class="btn btn-sm btn-outline-secondary" type="button">
                                        <i class="fas fa-eye"></i> &nbsp; Previsualizar
                                      </button>
                                      <i style="margin-right:10px" class="fas fa-down-long"></i>
                                      <i class="fas fa-bars"></i>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
                <!-- documentos soporte -->

                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .modal-body table * {
    font-size: 15px !important;
  }
</style>

<?php include "../footer.php"; ?>
<script>
  function showSections(idVisible) {
    let todos = ["content-facturas-facturas", "content-facturas-compras", "content-facturas-ndebito", "content-facturas-ncredito", "content-facturas-soporte"];
    todos.forEach(element => {
      if (element == idVisible) {
        document.getElementById(element).style.display = "block";
      } else {
        document.getElementById(element).style.display = "none";
      }
    });
  }

  showSections("content-facturas-facturas");

  $(document).ready(function() {
  $('#prefactura').on('click', function() {
    var idOperacion = $(this).data('id');
    console.log(idOperacion);
    $('#modalPrevisualizar').modal('show');
    //$('#modalPrevisualizar').find('.modal-body').load('Facturacion/FE_VerPdf.php?idOperacion=' + idOperacion);
    $('#modalPrevisualizar').find('.modal-body').load('Facturacion/Imprimir_Factura.php?idOperacion=' + idOperacion);

    // Agregar evento de cerrar el modal
    $('#modalPrevisualizar').on('hidden.bs.modal', function() {
      $(this).removeData('bs.modal');
    });
  });
});
</script>


<style>
  .underline-input {
    border: none;
    /* Sin borde */
    border-bottom: 2px solid #D4D4D4;
    /* Línea inferior */
    background-color: transparent;
    /* Fondo transparente */
    outline: none;
    /* Sin borde de enfoque */
    padding: 5px;
    /* Espaciado */
    width: 100%;
    /* Ancho completo */
  }

  .underline-input:focus {
    border-bottom: 2px solid #007bff;
    /* Cambia el color de la línea inferior al hacer foco */
    /* Puedes cambiar el color a lo que prefieras */
  }

  .table-modal {
    background-color: #F6F9FC !important;
    padding: 10px !important;
    border-radius: 15px !important;
  }

  .table-modal td {
    padding: 20px !important;
    margin: 20px !important;
    background-color: white !important;
  }

  .table-modal th {
    color: #767C82 !important;
    padding: 20px !important;
    margin: 20px !important;
    /* background-color: white !important; */
  }

  .table-modal-mediopago {
    background-color: #FFFFFF !important;
    padding: 10px !important;
    border-radius: 15px !important;
  }

  .table-modal-mediopago td {
    padding: 20px !important;
    margin: 20px !important;
    background-color: white !important;
  }

  .table-modal-mediopago th {
    color: #767C82 !important;
    padding: 20px !important;
    margin: 20px !important;
    /* background-color: white !important; */
  }
</style>

<?php 

include "./datosSimuladosFacturas.php";
//$dataJsonSimuladaFacturas = json_encode($dataJsonSimuladaFacturas);
$dataJsonSimuladaFacturas = obtenerDatosFacturas();
//$datosSimuladosClientes = json_encode($datosSimuladosClientes);
$datosSimuladosClientes = obtenerDatosClientes();
$dataJsonFacturasAdmision = obtenerFacturasAdmision();
//$datosSimuladosEntidades = obtenerDatosEntidades();
$datosSimuladosPersonasJuridicas = json_encode($datosSimuladosPersonasJuridicas);
$datosImpuestosC = json_encode($datosImpuestosC);
$datosImpuestosR = json_encode($datosImpuestosR);
$tiposDocumento = json_encode($tiposDocumento);
$metodosPago = json_encode($metodosPago);
$dataJsonProcedimientos = json_encode($dataJsonProcedimientos);
$datosSimuladosEspecialistas = json_encode($datosSimuladosEspecialistas);
$datosSimuladosCentrosDeCosto = json_encode($datosSimuladosCentrosDeCosto);
// $dataJsonImpuestoCargo = json_encode($dataJsonImpuestoCargo);
// $dataJsonImpuestoRetencion = json_encode($dataJsonImpuestoRetencion);
$dataJsonVendedores = json_encode($dataJsonVendedores);
$proveedores = json_encode($proveedores);
$datosSimuladosEntidades = json_encode($datosSimuladosEntidades);


$tiposDocumento = [
  "TI" => "Tarjeta de Indentidad",
  "CC" => "Cedula de Ciudadania",
  "CE" => "Cedula de Extranjeria",
  "NIT" => "NIT",
  "PA" => "Pasaporte",
];



//include "./FE_ModalFacturaCliente.php";
//include "./FE_ModalFacturaEmpresa.php";
include "./IncludeGeneralesModalFE.php";
include "./FE_ModalFacturaEmpresa_V1.php";
include "./FE_ModalFacturaCliente_V1.php";
include "./FE_ModalTipoFactura.php";
include "./FE_ModalNotaCredito.php";
include "./FE_ModalDocumentoSoporte.php";
?>