<?php
include "../menu.php";
include "../header.php";


$dropdownNew = '<div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-plus"></i> &nbsp; Nuevo
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEntidad">Entidad</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNuevoProcedimiento">Procedimiento</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNuevoVendedor">Vendedor</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNuevoImpuesto">Impuesto Cargo</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNuevoMetodoPago">Metodo de Pago</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNuevoImpuestoRetencion">Impuesto Retencion</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addCostsCenter">Centro de Costo</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createDoctor">Doctor</a></li>
                  </ul>
                </div>';

//<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNuevoCentroCosto">Centro de costo</a></li>

// include "./IncludeDatosTarifas.php";
// include "./IncludeDatosProcedimientos.php";
include "./funcionesJsGenerales.php";


include "./datosFEConfig.php";


?>
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
                <h2 class="mb-0">Configuracion</h2>
              </div>
              <div class="col-6 text-end" style="z-index: 999999999999999999999999999999999999999999999999999999999">

              </div>
            </div>
            <div class="col-12 col-md-auto">
              <div class="d-flex">
                <div class="flex-1 d-md-none">
                  <button class="btn px-3 btn-phoenix-secondary text-body-tertiary me-2" data-phoenix-toggle="offcanvas" data-phoenix-target="#productFilterColumn"><span class="fa-solid fa-bars"></span></button>
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
              <ul class="nav nav-underline fs-9">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" role="tab" aria-selected="true" onclick="showSections('content-facturas-entidades')">Entidades</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-facturas-procedimientos')">Procedimientos</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-facturas-vendedores')">Vendedores</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-info-metodospago')">Metodos de Pago</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-facturas-impuestoc')">Impuesto Cargo</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-facturas-impuesto_r')">Impuesto Retencion</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-centro-costos')">Centro de costos</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-info-facturacion')">Información de facturación</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false" onclick="showSections('content-info-doctores')">Información Doctores</a></li>
              </ul>
            </nav>
            <div class="scrollspy-example rounded-2" data-bs-spy="scroll" data-bs-offset="0" data-bs-target="#navbar-deals-detail" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">

              <div class="mb-8" id="content-facturas-entidades">
                <!-- Facturacion Ventas -->
                <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyFacturacionVentas">
                  <div class="col-6">
                    <h4 class="mb-1" id="scrollspyFacturacionVentas">Entidades</h4>
                  </div>
                  <div class="col-6 text-end">
                    <?= $dropdownNew ?>
                  </div>
                </div>
                <!-- =========== TABLE ========== -->
                <div class="col-12 row">
                  <div class="card mb-3">
                    <div class="card-body">



                      <!-- <h4 class="card-title mb-4"></h4> -->
                      <div class="row gx-3">
                        <div class="col-12">
                          <table class="table table-sm fs-9 mb-0 tableDataTableSearch">
                            <thead>
                              <tr>
                                <th>NIT</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Actividad Economica</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($dataEmpresas as $index => $empresa) {
                                $procedimientosEmpresa = $ControllerProcedimientosEntidad->obtenerPorEntidad($empresa['id']);
                                // var_dump($procedimientosEmpresa);
                                $datosTarifas = [];
                                foreach ($procedimientosEmpresa as $procedimiento) {
                                  $add = [
                                    "id" => $procedimiento["idProcedimiento"],
                                    "precio" => $procedimiento["precio"],
                                    "valorEntidad" => $procedimiento["valorEntidad"],
                                    "porcentajeCopago" => $procedimiento["porcentajeCopago"],
                                    "aplicaCopago" => $procedimiento["aplicaCopago"],
                                    "copagoDescuenta" => $procedimiento["copagoDescuenta"],
                                    "codigo_cups" => $ControllerProcedimientos->obtenerPorId($procedimiento["idProcedimiento"])["codigo_cups"],
                                    "nombreProcedimiento" => $ControllerProcedimientos->obtenerPorId($procedimiento["idProcedimiento"])["nombreProcedimiento"],
                                  ];

                                  array_push($datosTarifas, $add);
                                }

                                // $datosTarifas = $empresa['dataProcedimientos'];
                                $datosJson = [
                                  'procedimientosData' => $datosTarifas,
                                  "nit" => $empresa['nit'],
                                  "nombreEntidad" => reem_alreves($empresa['nombreEntidad']),
                                  "dv" => $empresa["dv"],
                                  "emailFE" => $empresa["emailFE"],
                                  "direccion" => reem_alreves($empresa["direccion"]),
                                  "telefono" => $empresa["telefono"],
                                  "celular" => $empresa["celular"],
                                  "actividadEconomica" => $empresa["actividadEconomica"],
                                  "tipoPersona" => $empresa["tipoPersona"],
                                  "ciudad" => reem_alreves($empresa["ciudad"])
                                ];

                                $datosJson = json_encode($datosJson);

                              ?>
                                <tr id="row-<?= $empresa['id'] ?>">
                                  <input type="hidden" id="data_empresa_<?= $empresa['id'] ?>" value="<?= htmlspecialchars($datosJson, ENT_QUOTES)  ?>">
                                  <td class="align-middle ps-3 number"><?= htmlspecialchars($empresa['nit']) ?></td>
                                  <td class="align-middle ps-3 number"><?= $empresa['nombreEntidad'] ?></td>
                                  <td class="align-middle user"><?= $empresa['emailFE'] ?></td>
                                  <td class="align-middle user"><?= $ControllerActividadesE->obtenerPorId($empresa['actividadEconomica'])["descripcion"] ?></td>
                                  <td class="align-middle white-space-nowrap pe-0 p-3">
                                    <i class="fas fas fa-pencil" onclick="editarEntidad( '<?= htmlspecialchars($empresa['nit']) ?>' , '<?= $empresa['id'] ?>')"></i>
                                    <i class="fas fa-trash" onclick="eliminarEntidad('<?= $empresa['id'] ?>')"></i>
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


                <!-- ========= TABLE =========== -->
              </div>


              <div class="mb-8" id="content-facturas-procedimientos">
                <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyNotaDebito">
                  <div class="col-12 row">
                    <div class="col-6">
                      <h4 class="mb-2" id="scrollspyNotaDebito">Procedimientos</h4>
                    </div>
                    <div class="col-6 text-end">
                      <?= $dropdownNew ?>
                    </div>
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
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Valor inicial</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($dataProcedimientos as $dataProcedimiento) {
                                $dataJson = [
                                  "id" => $dataProcedimiento["id"],
                                  "codigo_cups" => $dataProcedimiento["codigo_cups"],
                                  "nombreProcedimiento" => $dataProcedimiento["nombreProcedimiento"],
                                  "precio" => $dataProcedimiento["precio"],
                                ];
                                $dataJson = json_encode($dataJson);

                              ?>
                                <tr id="filaProc<?= intval($dataProcedimiento["id"]) ?>">
                                  <input type="hidden" id="data_procedimiento_<?= intval($dataProcedimiento["id"]) ?>" value="<?= htmlspecialchars($dataJson, ENT_QUOTES) ?>">
                                  <td class="align-middle ps-3 number"><?= $dataProcedimiento["codigo_cups"] ?></td>
                                  <td class="align-middle ps-3 number"><?= $dataProcedimiento["nombreProcedimiento"] ?></td>
                                  <td class="align-middle user"><?= $dataProcedimiento["precio"] ?></td>
                                  <td class="align-middle white-space-nowrap pe-0 p-3">
                                    <i class="fas fas fa-pencil" onclick="editarProcedimiento(<?= intval($dataProcedimiento['id']) ?>, <?= intval($dataProcedimiento['id']) ?>)"></i>
                                    <i class="fas fa-trash" onclick="eliminarProcedimiento(<?= intval($dataProcedimiento['id']) ?>)"></i>
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
              
              
              <div class="mb-8" id="content-info-metodospago">
                <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyNotaDebito">
                  <div class="col-12 row">
                    <div class="col-6">
                      <h4 class="mb-2" id="scrollspyNotaDebito">Metodos de Pago</h4>
                    </div>
                    <div class="col-6 text-end">
                      <?= $dropdownNew ?>
                    </div>
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
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cuenta Contable</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($metodosPago as $metodo) {
                                $dataJson = [
                                  "id" => $metodo["id"],
                                  "codigo_cups" => $metodo["codigo"],
                                  "nombreProcedimiento" => $metodo["nombre"],
                                  "precio" => $metodo["precio"],
                                ];
                                $dataJson = json_encode($metodo);

                              ?>
                                <tr id="rowmp-<?= intval($metodo["id"]) ?>">
                                  <input type="hidden" id="data_metodopago_<?= intval($metodo["id"]) ?>" value="<?= htmlspecialchars($dataJson, ENT_QUOTES) ?>">
                                  <td class="align-middle ps-3 number"><?= $metodo["id"] ?></td>
                                  <td class="align-middle ps-3 number"><?= $metodo["nombre"] ?></td>
                                  <td class="align-middle user"><?= $cuentasContables[$metodo["cuentaContable"]]["nombre"] ?></td>
                                  <td class="align-middle white-space-nowrap pe-0 p-3">
                                    <i class="fas fas fa-pencil" onclick="editarMetodoPago(<?= intval($metodo['id']) ?>, <?= intval($metodo['id']) ?>)"></i>
                                    <i class="fas fa-trash" onclick="eliminarMetodoPago(<?= intval($metodo['id']) ?>)"></i>
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



              <div class="mb-8" id="content-facturas-centroscosto">
                <!-- Facturacion Ventas -->
                <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyFacturacionVentas">
                  <div class="col-6">
                    <h4 class="mb-1" id="scrollspyFacturacionVentas">Centros de Costo</h4>
                  </div>
                  <div class="col-6 text-end">
                    <?= $dropdownNew ?>
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
                                <th>Código</th>
                                <th>Nombre</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($centrosCostos as $index => $centroCosto) {
                                $datosJson = [
                                  "codigo" => $centroCosto['codigo'],
                                  "nombre" => $centroCosto['nombre'],
                                  // Puedes agregar más datos si es necesario
                                ];

                                $datosJson = json_encode($datosJson);
                              ?>
                                <tr id="rowcc-<?= $index ?>">
                                  <input type="hidden" id="data_centro_costo_<?= $index ?>" value="<?= htmlspecialchars($datosJson, ENT_QUOTES) ?>">
                                  <td class="align-middle ps-3 number"><?= htmlspecialchars($centroCosto['codigo']) ?></td>
                                  <td class="align-middle ps-3"><?= htmlspecialchars($centroCosto['nombre']) ?></td>
                                  <td class="align-middle white-space-nowrap pe-0 p-3">
                                    <i class="fas fa-pencil" onclick="editarCentroCosto('<?= htmlspecialchars($centroCosto['codigo']) ?>', '<?= $index ?>')"></i>
                                    <i class="fas fa-trash" onclick="eliminarCentroCosto('<?= $index ?>')"></i>
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

              <div class="mb-8" id="content-facturas-vendedores">
                <!-- Facturacion Ventas -->
                <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyFacturacionVentas">
                  <div class="col-6">
                    <h4 class="mb-1" id="scrollspyFacturacionVentas">Vendedores</h4>
                  </div>
                  <div class="col-6 text-end">
                    <?= $dropdownNew ?>
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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($dataVendedores as $index => $vendedor) { ?>
                                <tr id="rowvendedor-<?= $vendedor["id"] ?>">
                                  <input type="hidden" id="data_vendedor_<?= $vendedor["id"] ?>" value='<?= htmlspecialchars(json_encode($vendedor), ENT_QUOTES) ?>'>
                                  <td class="align-middle"><?= htmlspecialchars($vendedor['id']) ?></td>
                                  <td class="align-middle"><?= htmlspecialchars($vendedor['nombre']) ?></td>
                                  <td class="align-middle">
                                    <i class="fas fa-pencil" onclick="editarVendedor('<?= htmlspecialchars($vendedor['id']) ?>', '<?= $vendedor['id'] ?>')"></i>
                                    <i class="fas fa-trash" onclick="eliminarVendedor('<?= $vendedor['id'] ?>')"></i>
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

              <div class="mb-8" id="content-facturas-impuestoc">
                <!-- Facturacion Ventas -->
                <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyFacturacionVentas">
                  <div class="col-6">
                    <h4 class="mb-1" id="scrollspyFacturacionVentas">Impuestos Cargo</h4>
                  </div>
                  <div class="col-6 text-end">
                    <?= $dropdownNew ?>
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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tasa Impuesto</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($dataJsonImpuestoCargo as $index => $impuesto) { ?>
                                <tr id="rowic-<?= $impuesto['id'] ?>">
                                  <input type="hidden" id="data_impuesto_<?= $impuesto['id'] ?>" value='<?= htmlspecialchars(json_encode($impuesto), ENT_QUOTES) ?>'>
                                  <td class="align-middle"><?= $impuesto['id'] ?></td>
                                  <td class="align-middle"><?= $impuesto['nombre'] ?></td>
                                  <td class="align-middle"><?= $impuesto['tasaImpuesto'] . "%" ?></td>
                                  <td class="align-middle">
                                    <i class="fas fa-pencil" onclick="editarImpuesto('<?= htmlspecialchars($impuesto['id']) ?>', '<?= $impuesto['id'] ?>')"></i>
                                    <i class="fas fa-trash" onclick="eliminarImpuesto('<?= $impuesto['id'] ?>')"></i>
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

              <div class="mb-8" id="content-facturas-impuesto_r">
                <!-- Facturacion Ventas -->
                <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyFacturacionVentas">
                  <div class="col-6">
                    <h4 class="mb-1" id="scrollspyFacturacionVentas">Impuestos Retencion</h4>
                  </div>
                  <div class="col-6 text-end">
                    <?= $dropdownNew ?>
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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Porcentaje</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($dataJsonImpuestoRetencion as $index => $impuesto) { ?>
                                <tr id="rowret-<?= $impuesto['id'] ?>">
                                  <input type="hidden" id="data_impuesto_retencion_<?= $impuesto['id'] ?>" value='<?= htmlspecialchars(json_encode($impuesto), ENT_QUOTES) ?>'>
                                  <td class="align-middle"><?= htmlspecialchars($impuesto['id']) ?></td>
                                  <td class="align-middle"><?= htmlspecialchars($impuesto['nombre']) ?></td>
                                  <td class="align-middle"><?= htmlspecialchars($impuesto['tasaRetencion']) . "%" ?></td>
                                  <td class="align-middle">
                                    <i class="fas fa-pencil" onclick="editarImpuestoRetencion('<?= htmlspecialchars($impuesto['id']) ?>', '<?= $impuesto['id'] ?>')"></i>
                                    <i class="fas fa-trash" onclick="eliminarImpuestoRetencion('<?= $impuesto['id'] ?>')"></i>
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

              <div class="mb-8" id="content-centro-costos">
                <!-- Centro de costos -->
                <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyFacturacionVentas">
                  <div class="col-6">
                    <h4 class="mb-1" id="scrollspyFacturacionVentas">Centro de costos</h4>
                  </div>
                  <div class="col-6 text-end mb-2">
                    <?= $dropdownNew ?>
                  </div>
                </div>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="table-responsive mb-4 mt-4">
                      <table class="table table-sm fs-9 mb-0  tableDataTableSearch">
                        <thead>
                          <tr>
                            <th class="sort border-top custom-th" data-sort="codigo">Código</th>
                            <th class="sort border-top custom-th" data-sort="descripcion">Descripción</th>
                            <th class="sort border-top custom-th" data-sort="subcentro">Subcentro de costos</th>
                            <th class="sort border-top custom-th" data-sort="maneja-presupuesto">Maneja Presupuesto</th>
                            <th class="sort border-top custom-th" data-sort="centro-movimieto">Centro de movimiento</th>
                            <th class="sort border-top custom-th" data-sort="estado">Estado</th>
                            <th class="sort text-end align-middle pe-0 border-top mb-2" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php
                          $arraytest = [
                            [
                              "Código" => "110505",
                              "Subcentro de costos" => "Si",
                              "Descripción" => "Cuenta Activa",
                              "Maneja Presupuesto" => "No",
                              "Centro de movimiento" => "No",
                              "Estado" => "Activo",
                            ],
                            [
                              "Código" => "2105",
                              "Subcentro de costos" => "No",
                              "Descripción" => "Pasivos",
                              "Maneja Presupuesto" => "Si",
                              "Centro de movimiento" => "No",
                              "Estado" => "Activo",
                            ],
                            [
                              "Código" => "410506",
                              "Subcentro de costos" => "Si",
                              "Descripción" => "Cuenta Corriente",
                              "Maneja Presupuesto" => "No",
                              "Centro de movimiento" => "Si",
                              "Estado" => "Inactivo",
                            ],
                          ];
                          
                          foreach ($datosCentroCosto as $centrocosto) { ?>
                            <tr id="filaCentroCosto<?=$centrocosto["id"]?>">
                              <input type="hidden" id="data_CentroCosto<?=$centrocosto["id"]?>" value="<?= htmlspecialchars(json_encode($centrocosto), ENT_QUOTES) ?>">
                              <td class="align-middle custom-td"><?= $centrocosto["codigo"] ?></td>
                              <td class="align-middle custom-td"><?= $centrocosto["descripcion"] ?></td>
                              <td class="align-middle custom-td"><?= $centrocosto["esSubsubcentro"] ?></td>
                              <td class="align-middle custom-td"><?= $centrocosto["manejaPresupuesto"] ?></td>
                              <td class="align-middle custom-td"><?= $centrocosto["centroMovimiento"] ?></td>
                              <td class="align-middle custom-td"><?= $centrocosto["estado"] ?></td>
                              <td class="align-middle white-space-nowrap pe-0 p-3">
                                <i class="fas fa-pencil" onclick="editarCentroCosto('<?= $centrocosto['id'] ?>')"></i>
                                <i class="fas fa-trash"  onclick="borrarCentroCosto('<?= $centrocosto['id'] ?>')"></i>
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
            <div class="mb-8" id="content-info-facturacion">
              <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyFacturacionVentas">
                <div class="col-6">
                  <h4 class="mb-1" id="scrollspyFacturacionVentas">Información de Facturación</h4>
                </div>
              </div>
              <div class="row gx-3 gy-4 mb-5">
                <div class="col-12 col-lg-6">
                  <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="prefix-dian">Prefijo DIAN</label>
                  <input class="form-control" id="prefix-dian" type="text" placeholder="FEAD" />
                </div>
                <div class="col-12 col-lg-6">
                  <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="num-desde">Número desde</label>
                  <input class="form-control" id="num-desde" type="text" placeholder="1001" />
                </div>
                <div class="col-12 col-lg-6">
                  <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="num-hasta">Número hasta</label>
                  <input class="form-control" id="num-hasta" type="text" placeholder="10000" />
                </div>
                <div class="col-12 col-lg-6">
                  <div class="row g-2 gy-lg-0">
                    <label class="form-label text-body-highlight fs-8 ps-1 text-capitalize lh-sm mb-1">Fecha de Resolución</label>
                    <input type="date" value="<?= date("Y-m-d") ?>" class="form-control col-md-6">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="row g-2 gy-lg-0">
                    <label class="form-label text-body-highlight fs-8 ps-1 text-capitalize lh-sm mb-1">Resolución expira</label>
                    <input type="date" value="<?= date("Y-m-d") ?>" class="form-control col-md-6">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="num-hasta">Resolución de factua Dian número</label>
                  <input class="form-control" id="num-hasta" type="text" placeholder="" />
                </div>
              </div>
              <button class="btn btn-primary me-4" type="button" data-bs-toggle="modal" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                <i class="fas fa-save me-2"></i> Guardar Cambios
              </button>
            </div>

            <!-- 
            
            // CRISTIAN
            <div class="modal fade" id="addCostsCenter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCostsCenter" aria-hidden="true">
              <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-body-highlight p-6">
                  <div class="modal-header justify-content-between border-0 p-0 mb-2">
                    <h3 class="mb-0">Centro de costos</h3>
                    <button class="btn btn-sm btn-phoenix-secondary" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times text-danger"></span></button>
                  </div>
                  <div class="modal-body px-0">
                    <div class="row g-4">
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Subcentro de costos
                          </label>
                          <select class="form-select">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                        </div>
                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Maneja presupuesto
                          </label>
                          <select class="form-select">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                        </div>
                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Estado
                          </label>
                          <select class="form-select">
                            <option>N/A</option>
                            <option>Activo</option>
                            <option>Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Descripción</label>
                          <input class="form-control" type="text" placeholder="Descripción" />
                        </div>
                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Centro de movimiento
                          </label>
                          <select class="form-select">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer border-0 pt-6 px-0 pb-0">
                    <button class="btn btn-link text-danger px-3 my-0" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button class="btn btn-primary my-0">Crear Costos</button>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
              <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-body-highlight p-6">
                  <div class="modal-header justify-content-between border-0 p-0 mb-2">
                    <h3 class="mb-0" id="codigo-header">Centro de Costos</h3>
                    <button class="btn btn-sm btn-phoenix-secondary" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times text-danger"></span></button>
                  </div>
                  <div class="modal-body px-0">
                    <div class="row g-4">
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Subcentro de costos</label>
                          <select class="form-select" id="subcentro-edit">
                            <option selected>Si</option>
                            <option>No</option>
                          </select>
                        </div>

                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Maneja presupuesto</label>
                          <select class="form-select" id="presupuesto-edit">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                        </div>
                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Estado</label>
                          <select class="form-select" id="estado-edit">
                            <option>N/A</option>
                            <option>Activo</option>
                            <option>Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Descripción</label>
                          <input class="form-control" type="text" id="descripcion-edit" placeholder="Descripción" />
                        </div>
                        <div class="mb-4">
                          <label class="text-body-highlight fw-bold mb-2">Centro de movimiento</label>
                          <select class="form-select" id="movimiento-edit">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer border-0 pt-6 px-0 pb-0">
                    <button class="btn btn-link text-danger px-3 my-0" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button class="btn btn-primary my-0" id="save-edit">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Delete Confirmation Modal -->
            <!-- <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-body-highlight p-6">
                  <div class="modal-header justify-content-between border-0 p-0 mb-2">
                    <h3 class="mb-0">Confirmar Eliminación</h3>
                    <button class="btn btn-sm btn-phoenix-secondary" data-bs-dismiss="modal" aria-label="Close">
                      <span class="fas fa-times text-danger"></span>
                    </button>
                  </div>
                  <div class="modal-body px-0">
                    <p>¿Está seguro de que desea eliminar este elemento <span id="codigo-to-delete"></span>?</p>
                  </div>
                  <div class="modal-footer border-0 pt-3 px-0 pb-0">
                    <button class="btn btn-link text-primary px-3 my-0" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button class="btn btn-danger my-0" id="confirm-delete">Eliminar</button>
                  </div>
                </div>
              </div>
            </div> 
            [FIN CRISTIAN]
            -->

            <div class="mb-8" id="content-info-doctores">
              <div class="d-flex justify-content-between align-items-center col-12 row mb-4" id="scrollspyFacturacionVentas">
                <div class="col-6">
                  <h4 class="mb-1" id="scrollspyFacturacionVentas">Información de Doctores</h4>
                </div>
                <div class="col-6 text-end mb-2">
                  <?= $dropdownNew ?>
                </div>
              </div>
              <div class="row gx-3 gy-4 mb-5">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="table-responsive mb-4 mt-4">
                      <table class="table table-sm fs-9 mb-0 tableDataTableSearch">
                        <thead>
                          <tr>
                            <th class="sort border-top custom-th" data-sort="nombre">Nombre</th>
                            <th class="sort border-top custom-th" data-sort="especialidad">Especialidad</th>
                            <th class="sort border-top custom-th" data-sort="genero">Género</th>
                            <th class="sort border-top custom-th" data-sort="numero-contacto">Número de contacto</th>
                            <th class="sort border-top custom-th" data-sort="correo">Correo</th>
                            <th class="sort text-end align-middle pe-0 border-top mb-2" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php
                          $arraytest = [
                            [
                              "Nombre" => "Juan Pérez",
                              "Especialidad" => "Cardiología",
                              "Género" => "Masculino",
                              "Número de contacto" => "555-1234",
                              "Correo" => "juan.perez@example.com",
                              "País" => "Colombia",
                              "Ciudad" => "Bogotá",
                              "Dirección" => "Carrera 7 # 45-20",
                              "Título" => "Médico Especialista",
                              "Idiomas" => ["Español"],
                              "Servicios o tratamientos que ofrece" => "Consulta médica, Electrocardiograma",
                              "Años de experiencia" => 10,
                              "Número de licencia médica" => "123456",
                              "Áreas donde tiene licencia para ejercer" => ["Colombia, Bogotá", "Colombia, Medellín"]
                            ],
                            [
                              "Nombre" => "María López",
                              "Especialidad" => "Dermatología",
                              "Género" => "Femenino",
                              "Número de contacto" => "555-5678",
                              "Correo" => "maria.lopez@example.com",
                              "País" => "Argentina",
                              "Ciudad" => "Buenos Aires",
                              "Dirección" => "Av. Santa Fe 1234",
                              "Título" => "Dermatóloga",
                              "Idiomas" => ["Español"],
                              "Servicios o tratamientos que ofrece" => "Tratamientos de piel, Consultas",
                              "Años de experiencia" => 8,
                              "Número de licencia médica" => "654321",
                              "Áreas donde tiene licencia para ejercer" => ["Argentina, Buenos Aires"]
                            ],
                            [
                              "Nombre" => "Carlos García",
                              "Especialidad" => "Pediatría",
                              "Género" => "Masculino",
                              "Número de contacto" => "555-8765",
                              "Correo" => "carlos.garcia@example.com",
                              "País" => "Chile",
                              "Ciudad" => "Santiago",
                              "Dirección" => "Calle Nueva 456",
                              "Título" => "Pediatra",
                              "Idiomas" => ["Español"],
                              "Servicios o tratamientos que ofrece" => "Atención infantil, Vacunación",
                              "Años de experiencia" => 5,
                              "Número de licencia médica" => "789012",
                              "Áreas donde tiene licencia para ejercer" => ["Chile, Santiago", "Chile, Concepción"]
                            ],
                          ];

                          foreach ($arraytest as $value) { ?>
                            <tr>
                              <td class="align-middle custom-td"><?= $value["Nombre"] ?></td>
                              <td class="align-middle custom-td"><?= $value["Especialidad"] ?></td>
                              <td class="align-middle custom-td"><?= $value["Género"] ?></td>
                              <td class="align-middle custom-td"><?= $value["Número de contacto"] ?></td>
                              <td class="align-middle custom-td"><?= $value["Correo"] ?></td>
                              <td class="align-middle white-space-nowrap pe-0 p-3">
                                <button
                                  style="margin-right:10px"
                                  class="btn btn-sm btn-outline-primary edit-button"
                                  type="button"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editDoctor"
                                  data-nombre="<?= $value["Nombre"] ?>"
                                  data-especialidad="<?= $value["Especialidad"] ?>"
                                  data-genero="<?= $value["Género"] ?>"
                                  data-contacto="<?= $value["Número de contacto"] ?>"
                                  data-correo="<?= $value["Correo"] ?>"
                                  data-pais="<?= $value["País"] ?>"
                                  data-ciudad="<?= $value["Ciudad"] ?>"
                                  data-direccion="<?= $value["Dirección"] ?>"
                                  data-titulo="<?= $value["Título"] ?>"
                                  data-idiomas="<?= implode(', ', $value["Idiomas"]) ?>"
                                  data-servicios="<?= $value["Servicios o tratamientos que ofrece"] ?>"
                                  data-anos-experiencia="<?= $value["Años de experiencia"] ?>"
                                  data-numero-licencia="<?= $value["Número de licencia médica"] ?>"
                                  data-areas-licencia="<?= implode(', ', $value["Áreas donde tiene licencia para ejercer"]) ?>">
                                  <i class="fas fa-pencil-alt"></i> Editar
                                </button>

                                <button
                                  style="margin-right:10px"
                                  class="btn btn-sm btn-outline-danger delete-button"
                                  type="button"
                                  data-bs-target="#"
                                  data-nombre="<?= $value["Nombre"] ?>">
                                  <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
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

            <!-- <div class="modal fade" id="createDoctor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createDoctor" aria-hidden="true">
              <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-body-highlight p-6">
                  <div class="modal-header justify-content-between border-0 p-0 mb-2">
                    <h3 class="mb-0" id="codigo-header">Crear Doctor</h3>
                    <button class="btn btn-sm btn-phoenix-secondary" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times text-danger"></span></button>
                  </div>
                  <div class="modal-body px-0">
                    <div class="row g-4">
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="nombre">Nombre</label>
                        <input class="form-control" id="nombre" type="text" placeholder="Nombre" />
                      </div>
                      Consultation Value Field 
                      First Country and City Pair 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="pais1">País</label>
                        <select id="pais1" class="form-select selectModalNuevo" style="width:100%" onchange="updateCities('pais1', 'ciudad1')">
                          <option value="" disabled selected>Selecciona un país</option>
                          <option value="argentina">Argentina</option>
                          <option value="bolivia">Bolivia</option>
                          <option value="brazil">Brasil</option>
                          <option value="chile">Chile</option>
                          <option value="colombia">Colombia</option>
                          <option value="costa-rica">Costa Rica</option>
                          <option value="cuba">Cuba</option>
                          <option value="dominican-republic">República Dominicana</option>
                          <option value="ecuador">Ecuador</option>
                          <option value="el-salvador">El Salvador</option>
                          <option value="guatemala">Guatemala</option>
                          <option value="honduras">Honduras</option>
                          <option value="mexico">México</option>
                          <option value="nicaragua">Nicaragua</option>
                          <option value="panama">Panamá</option>
                          <option value="paraguay">Paraguay</option>
                          <option value="peru">Perú</option>
                          <option value="uruguay">Uruguay</option>
                          <option value="venezuela">Venezuela</option>
                          <option value="usa">Estados Unidos</option>
                          <option value="canada">Canadá</option>
                        </select>
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="ciudad1">Ciudad</label>
                        <select id="ciudad1" class="form-select selectModalNuevo">
                          <option value="" disabled selected>Selecciona una ciudad</option>
                        </select>
                      </div>
                      Experience Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="direccion">Lugar o dirección de atención</label>
                        <div class="input-group">
                          <span class="input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                          </span>
                          <input class="form-control" id="direccion" type="text" placeholder="Ingrese la dirección de atención" aria-label="Lugar o dirección de atención" />
                        </div>
                      </div>

                      Specialty Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="especialidad">Especialidad</label>
                        <select id="especialidad" class="form-select selectModalNuevo">
                          <option value="" disabled selected>Selecciona una especialidad</option>
                          <option value="69">Óptica</option>
                          <option value="1">Alergología</option>
                          <option value="2">Ambulancia</option>
                          <option value="3">Andrología</option>
                          <option value="4">Anestesiología</option>
                          <option value="5">Asociación médica</option>
                          <option value="6">Audiología</option>
                          <option value="7">Banco de sangre</option>
                          <option value="8">Cardiología</option>
                          <option value="9">Centro de rehabilitación</option>
                          <option value="10">Centros médicos</option>
                          <option value="11">Cirugía endoscópica</option>
                          <option value="12">Cirugía laparoscópica</option>
                          <option value="13">Cirujano bariátrico</option>
                          <option value="14">Cirujano cabeza y cuello</option>
                          <option value="15">Cirujano cardiovascular</option>
                          <option value="16">Cirujano de seno y tejido blandos</option>
                          <option value="17">Cirujano de tórax</option>
                          <option value="18">Cirujano gastrointestinal</option>
                          <option value="19">Cirujano general</option>
                          <option value="20">Cirujano maxilofacial</option>
                          <option value="21">Cirujano oncólogo</option>
                          <option value="95">Cirujano Oral</option>
                          <option value="22">Cirujano pediátrico</option>
                          <option value="23">Cirujano plástico</option>
                          <option value="24">Cirujano vascular</option>
                          <option value="25">Clínica</option>
                          <option value="26">Coloproctología</option>
                          <option value="27">Dermatología</option>
                          <option value="28">Droguería</option>
                          <option value="29">Endocrinología</option>
                          <option value="94">Endodoncista</option>
                          <option value="30">Enfermera</option>
                          <option value="31">EPS</option>
                          <option value="32">Estéticas</option>
                          <option value="33">Fisiatra</option>
                          <option value="34">Fisioterapeuta</option>
                          <option value="35">Fonoaudiología</option>
                          <option value="36">Fundación</option>
                          <option value="37">Gastroenterología</option>
                          <option value="38">Genetista</option>
                          <option value="39">Geriatría</option>
                          <option value="40">Ginecología</option>
                          <option value="41">Hematología</option>
                          <option value="42">Hepatología</option>
                          <option value="43">Hospital</option>
                          <option value="44">Infectología</option>
                          <option value="45">Inmunología</option>
                          <option value="46">Internista</option>
                          <option value="47">Laboratorio clínico</option>
                          <option value="48">Laboratorio farmacéutico</option>
                          <option value="49">Médico alternativo</option>
                          <option value="50">Médico alternativo</option>
                          <option value="51">Médico biológico</option>
                          <option value="52">Médico familiar</option>
                          <option value="53">Médico general</option>
                          <option value="54">Mastología</option>
                          <option value="55">Medicina deportiva</option>
                          <option value="56">Medicina estética</option>
                          <option value="57">Medicina nuclear</option>
                          <option value="58">Medicina sexual</option>
                          <option value="59">Nefrología</option>
                          <option value="60">Neumología</option>
                          <option value="62">Neurocirujano</option>
                          <option value="63">Neurofisiología</option>
                          <option value="61">Neurología</option>
                          <option value="65">Nutricionista</option>
                          <option value="64">Nutriología</option>
                          <option value="66">Odontología</option>
                          <option value="91">Odontopediatría</option>
                          <option value="67">Oftalmología</option>
                          <option value="68">Oncología</option>
                          <option value="92">Ortodoncista</option>
                          <option value="70">Ortopedista</option>
                          <option value="71">Otorrinolaringología</option>
                          <option value="72">Patología</option>
                          <option value="73">Pediatra</option>
                          <option value="93">Periodoncista</option>
                          <option value="74">Podología</option>
                          <option value="96">Prostodoncista</option>
                          <option value="75">Psicología</option>
                          <option value="76">Psiquiatra</option>
                          <option value="77">Quiropráctico</option>
                          <option value="78">Radiología</option>
                          <option value="79">Radioterapeuta</option>
                          <option value="80">Reumatología</option>
                          <option value="81">Salud ocupacional</option>
                          <option value="82">Salud pública</option>
                          <option value="83">Suministro médico</option>
                          <option value="84">Terapia ocupacional</option>
                          <option value="85">Toxicología</option>
                          <option value="86">Trasplante de órgano</option>
                          <option value="87">Trasplante y medicina capilar</option>
                          <option value="88">Urología</option>
                          <option value="89">Vacunación</option>
                          <option value="90">Venereología</option>
                        </select>
                      </div>
                      Contact Numbers Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="titulo">Título</label>
                        <input class="form-control" id="titulo" type="text" placeholder="Ingrese el título" aria-label="Título" />
                      </div>

                      WhatsApp Numbers Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="genero">Género</label>
                        <select id="genero" class="form-select selectModalNuevo">
                          <option value="masculino">Masculino</option>
                          <option value="femenino">Femenino</option>
                          <option value="prefiero-mencionarlo">Prefiero no mencionarlo</option>
                        </select>
                      </div>
                      Languages Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="idiomas">Idiomas</label>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="espanol" />
                          <label class="form-check-label ps-2" for="espanol">
                            🇪🇸 Español
                          </label>
                        </div>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="ingles" />
                          <label class="form-check-label ps-2" for="ingles">
                            🇬🇧 Inglés
                          </label>
                        </div>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="frances" />
                          <label class="form-check-label ps-2" for="frances">
                            🇫🇷 Francés
                          </label>
                        </div>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="portugues" />
                          <label class="form-check-label ps-2" for="portugues">
                            🇧🇷 Portugués
                          </label>
                        </div>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="italiano" />
                          <label class="form-check-label ps-2" for="italiano">
                            🇮🇹 Italiano
                          </label>
                        </div>
                      </div>


                      Payment Methods Field 
                      <div class="col-12 col-lg-6 mb-3">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="servicios">
                          Servicios o tratamientos que ofrece
                        </label>
                        <input class="form-control" id="servicios" type="text" placeholder="Ingresa los servicios o tratamientos" />
                      </div>
                      Corporate Email Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="contacto">Número de contacto</label>
                        <input class="form-control" id="contacto" type="tel" placeholder="Ingrese su número de celular" pattern="[0-9]{10}" />
                      </div>

                      Google Maps URL Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="correo">Correo</label>
                        <input class="form-control" id="correo" type="email" placeholder="Ingrese su correo electrónico" />
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="experiencia">Años de experiencia</label>
                        <input class="form-control" id="experiencia" type="number" placeholder="Ingrese los años de experiencia" min="0" />
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="numLicencia">Número de licencia médica</label>
                        <input class="form-control" id="numLicencia" type="number" placeholder="Ingrese el número de licencia" min="0" />
                      </div>

                      Social Media Section 
                      <div class="col-12">
                        <h4 class="mb-1" id="scrollspyFacturacionVentas">Areas donde tiene licencia para ejercer</h4>
                      </div>
                      Second Country and City Pair 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="pais2">País</label>
                        <select id="pais2" class="form-select selectModalNuevo" style="width:100%" onchange="updateCities('pais2', 'ciudad2')">
                          <option value="" disabled selected>Selecciona un país</option>
                          <option value="argentina">Argentina</option>
                          <option value="bolivia">Bolivia</option>
                          <option value="brazil">Brasil</option>
                          <option value="chile">Chile</option>
                          <option value="colombia">Colombia</option>
                          <option value="costa-rica">Costa Rica</option>
                          <option value="cuba">Cuba</option>
                          <option value="dominican-republic">República Dominicana</option>
                          <option value="ecuador">Ecuador</option>
                          <option value="el-salvador">El Salvador</option>
                          <option value="guatemala">Guatemala</option>
                          <option value="honduras">Honduras</option>
                          <option value="mexico">México</option>
                          <option value="nicaragua">Nicaragua</option>
                          <option value="panama">Panamá</option>
                          <option value="paraguay">Paraguay</option>
                          <option value="peru">Perú</option>
                          <option value="uruguay">Uruguay</option>
                          <option value="venezuela">Venezuela</option>
                          <option value="usa">Estados Unidos</option>
                          <option value="canada">Canadá</option>
                        </select>
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="ciudad2">Ciudad</label>
                        <select id="ciudad2" class="form-select selectModalNuevo">
                          <option value="" disabled selected>Selecciona una ciudad</option>
                        </select>
                      </div>

                      <div style="text-align: right; margin-top: 10px;">
                        <button class="btn btn-link p-0 ms-3" onclick="addToTable('pais2', 'ciudad2')">
                          <span class="fa-solid fa-plus me-1"></span><span>Agregar</span>
                        </button>
                      </div>



                      <div class="card mb-3 mt-4">
                        <div class="card-body">
                          <div class="table-responsive mb-4">
                            <table class="table table-striped table-sm fs-9 mb-0 tableDataTableSearch">
                              <thead>
                                <tr>
                                  <th class="sort border-top border-translucent ps-3" data-sort="pais">País</th>
                                  <th class="sort border-top" data-sort="ciudad">Ciudad</th>
                                  <th class="sort border-top" data-sort="acciones">Acciones</th>
                                </tr>
                              </thead>
                              <tbody id="tableBody">
                                Dynamic rows will be added here 
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer border-0 pt-6 px-0 pb-0">
                    <button class="btn btn-link text-danger px-3 my-0" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button class="btn btn-primary my-0" id="save-edit">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="editDoctor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDoctor" aria-hidden="true">
              <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-body-highlight p-6">
                  <div class="modal-header justify-content-between border-0 p-0 mb-2">
                    <h3 class="mb-0" id="codigo-header">Crear Doctor</h3>
                    <button class="btn btn-sm btn-phoenix-secondary" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times text-danger"></span></button>
                  </div>
                  <div class="modal-body px-0">
                    <div class="row g-4">
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="nombre">Nombre</label>
                        <input class="form-control" id="nombre" type="text" placeholder="Nombre" />
                      </div>
                      Consultation Value Field 
                      First Country and City Pair 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="pais1">País</label>
                        <select id="pais-edit" class="form-select selectModalNuevo" style="width:100%" onchange="updateCities('pais1', 'ciudad1')">
                          <option value="" disabled selected>Selecciona un país</option>
                          <option value="argentina">Argentina</option>
                          <option value="bolivia">Bolivia</option>
                          <option value="brazil">Brasil</option>
                          <option value="chile">Chile</option>
                          <option value="colombia">Colombia</option>
                          <option value="costa-rica">Costa Rica</option>
                          <option value="cuba">Cuba</option>
                          <option value="dominican-republic">República Dominicana</option>
                          <option value="ecuador">Ecuador</option>
                          <option value="el-salvador">El Salvador</option>
                          <option value="guatemala">Guatemala</option>
                          <option value="honduras">Honduras</option>
                          <option value="mexico">México</option>
                          <option value="nicaragua">Nicaragua</option>
                          <option value="panama">Panamá</option>
                          <option value="paraguay">Paraguay</option>
                          <option value="peru">Perú</option>
                          <option value="uruguay">Uruguay</option>
                          <option value="venezuela">Venezuela</option>
                          <option value="usa">Estados Unidos</option>
                          <option value="canada">Canadá</option>
                        </select>
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="ciudad1">Ciudad</label>
                        <select id="ciudad1" class="form-select selectModalNuevo">
                          <option value="" disabled selected>Selecciona una ciudad</option>
                        </select>
                      </div>
                      Experience Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="direccion">Lugar o dirección de atención</label>
                        <div class="input-group">
                          <span class="input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                          </span>
                          <input class="form-control" id="direccion" type="text" placeholder="Ingrese la dirección de atención" aria-label="Lugar o dirección de atención" />
                        </div>
                      </div>

                      Specialty Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="especialidad">Especialidad</label>
                        <select id="especialidad" class="form-select selectModalNuevo">
                          <option value="" disabled selected>Selecciona una especialidad</option>
                          <option value="69">Óptica</option>
                          <option value="1">Alergología</option>
                          <option value="2">Ambulancia</option>
                          <option value="3">Andrología</option>
                          <option value="4">Anestesiología</option>
                          <option value="5">Asociación médica</option>
                          <option value="6">Audiología</option>
                          <option value="7">Banco de sangre</option>
                          <option value="8">Cardiología</option>
                          <option value="9">Centro de rehabilitación</option>
                          <option value="10">Centros médicos</option>
                          <option value="11">Cirugía endoscópica</option>
                          <option value="12">Cirugía laparoscópica</option>
                          <option value="13">Cirujano bariátrico</option>
                          <option value="14">Cirujano cabeza y cuello</option>
                          <option value="15">Cirujano cardiovascular</option>
                          <option value="16">Cirujano de seno y tejido blandos</option>
                          <option value="17">Cirujano de tórax</option>
                          <option value="18">Cirujano gastrointestinal</option>
                          <option value="19">Cirujano general</option>
                          <option value="20">Cirujano maxilofacial</option>
                          <option value="21">Cirujano oncólogo</option>
                          <option value="95">Cirujano Oral</option>
                          <option value="22">Cirujano pediátrico</option>
                          <option value="23">Cirujano plástico</option>
                          <option value="24">Cirujano vascular</option>
                          <option value="25">Clínica</option>
                          <option value="26">Coloproctología</option>
                          <option value="27">Dermatología</option>
                          <option value="28">Droguería</option>
                          <option value="29">Endocrinología</option>
                          <option value="94">Endodoncista</option>
                          <option value="30">Enfermera</option>
                          <option value="31">EPS</option>
                          <option value="32">Estéticas</option>
                          <option value="33">Fisiatra</option>
                          <option value="34">Fisioterapeuta</option>
                          <option value="35">Fonoaudiología</option>
                          <option value="36">Fundación</option>
                          <option value="37">Gastroenterología</option>
                          <option value="38">Genetista</option>
                          <option value="39">Geriatría</option>
                          <option value="40">Ginecología</option>
                          <option value="41">Hematología</option>
                          <option value="42">Hepatología</option>
                          <option value="43">Hospital</option>
                          <option value="44">Infectología</option>
                          <option value="45">Inmunología</option>
                          <option value="46">Internista</option>
                          <option value="47">Laboratorio clínico</option>
                          <option value="48">Laboratorio farmacéutico</option>
                          <option value="49">Médico alternativo</option>
                          <option value="50">Médico alternativo</option>
                          <option value="51">Médico biológico</option>
                          <option value="52">Médico familiar</option>
                          <option value="53">Médico general</option>
                          <option value="54">Mastología</option>
                          <option value="55">Medicina deportiva</option>
                          <option value="56">Medicina estética</option>
                          <option value="57">Medicina nuclear</option>
                          <option value="58">Medicina sexual</option>
                          <option value="59">Nefrología</option>
                          <option value="60">Neumología</option>
                          <option value="62">Neurocirujano</option>
                          <option value="63">Neurofisiología</option>
                          <option value="61">Neurología</option>
                          <option value="65">Nutricionista</option>
                          <option value="64">Nutriología</option>
                          <option value="66">Odontología</option>
                          <option value="91">Odontopediatría</option>
                          <option value="67">Oftalmología</option>
                          <option value="68">Oncología</option>
                          <option value="92">Ortodoncista</option>
                          <option value="70">Ortopedista</option>
                          <option value="71">Otorrinolaringología</option>
                          <option value="72">Patología</option>
                          <option value="73">Pediatra</option>
                          <option value="93">Periodoncista</option>
                          <option value="74">Podología</option>
                          <option value="96">Prostodoncista</option>
                          <option value="75">Psicología</option>
                          <option value="76">Psiquiatra</option>
                          <option value="77">Quiropráctico</option>
                          <option value="78">Radiología</option>
                          <option value="79">Radioterapeuta</option>
                          <option value="80">Reumatología</option>
                          <option value="81">Salud ocupacional</option>
                          <option value="82">Salud pública</option>
                          <option value="83">Suministro médico</option>
                          <option value="84">Terapia ocupacional</option>
                          <option value="85">Toxicología</option>
                          <option value="86">Trasplante de órgano</option>
                          <option value="87">Trasplante y medicina capilar</option>
                          <option value="88">Urología</option>
                          <option value="89">Vacunación</option>
                          <option value="90">Venereología</option>
                        </select>
                      </div>
                      Contact Numbers Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="titulo">Título</label>
                        <input class="form-control" id="titulo" type="text" placeholder="Ingrese el título" aria-label="Título" />
                      </div>

                      WhatsApp Numbers Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="genero">Género</label>
                        <select id="genero" class="form-select selectModalNuevo">
                          <option value="masculino">Masculino</option>
                          <option value="femenino">Femenino</option>
                          <option value="prefiero-mencionarlo">Prefiero no mencionarlo</option>
                        </select>
                      </div>
                      Languages Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="idiomas">Idiomas</label>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="espanol" />
                          <label class="form-check-label ps-2" for="espanol">
                            🇪🇸 Español
                          </label>
                        </div>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="ingles" />
                          <label class="form-check-label ps-2" for="ingles">
                            🇬🇧 Inglés
                          </label>
                        </div>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="frances" />
                          <label class="form-check-label ps-2" for="frances">
                            🇫🇷 Francés
                          </label>
                        </div>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="portugues" />
                          <label class="form-check-label ps-2" for="portugues">
                            🇧🇷 Portugués
                          </label>
                        </div>
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" id="italiano" />
                          <label class="form-check-label ps-2" for="italiano">
                            🇮🇹 Italiano
                          </label>
                        </div>
                      </div>


                      Payment Methods Field 
                      <div class="col-12 col-lg-6 mb-3">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="servicios">
                          Servicios o tratamientos que ofrece
                        </label>
                        <input class="form-control" id="servicios" type="text" placeholder="Ingresa los servicios o tratamientos" />
                      </div>
                      Corporate Email Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="contacto">Número de contacto</label>
                        <input class="form-control" id="contacto" type="tel" placeholder="Ingrese su número de celular" pattern="[0-9]{10}" />
                      </div>

                      Google Maps URL Field 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="correo">Correo</label>
                        <input class="form-control" id="correo" type="email" placeholder="Ingrese su correo electrónico" />
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="experiencia">Años de experiencia</label>
                        <input class="form-control" id="experiencia" type="number" placeholder="Ingrese los años de experiencia" min="0" />
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="numLicencia">Número de licencia médica</label>
                        <input class="form-control" id="numLicencia" type="number" placeholder="Ingrese el número de licencia" min="0" />
                      </div>

                      Social Media Section 
                      <div class="col-12">
                        <h4 class="mb-1" id="scrollspyFacturacionVentas">Areas donde tiene licencia para ejercer</h4>
                      </div>
                      Second Country and City Pair 
                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="pais2">País</label>
                        <select id="pais2" class="form-select selectModalNuevo" style="width:100%" onchange="updateCities('pais2', 'ciudad2')">
                          <option value="" disabled selected>Selecciona un país</option>
                          <option value="argentina">Argentina</option>
                          <option value="bolivia">Bolivia</option>
                          <option value="brazil">Brasil</option>
                          <option value="chile">Chile</option>
                          <option value="colombia">Colombia</option>
                          <option value="costa-rica">Costa Rica</option>
                          <option value="cuba">Cuba</option>
                          <option value="dominican-republic">República Dominicana</option>
                          <option value="ecuador">Ecuador</option>
                          <option value="el-salvador">El Salvador</option>
                          <option value="guatemala">Guatemala</option>
                          <option value="honduras">Honduras</option>
                          <option value="mexico">México</option>
                          <option value="nicaragua">Nicaragua</option>
                          <option value="panama">Panamá</option>
                          <option value="paraguay">Paraguay</option>
                          <option value="peru">Perú</option>
                          <option value="uruguay">Uruguay</option>
                          <option value="venezuela">Venezuela</option>
                          <option value="usa">Estados Unidos</option>
                          <option value="canada">Canadá</option>
                        </select>
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm" for="ciudad2">Ciudad</label>
                        <select id="ciudad2" class="form-select selectModalNuevo">
                          <option value="" disabled selected>Selecciona una ciudad</option>
                        </select>
                      </div>

                      <div style="text-align: right; margin-top: 10px;">
                        <button class="btn btn-link p-0 ms-3" onclick="addToTable('pais2', 'ciudad2')">
                          <span class="fa-solid fa-plus me-1"></span><span>Agregar</span>
                        </button>
                      </div>



                      <div class="card mb-3 mt-4">
                        <div class="card-body">
                          <div class="table-responsive mb-4">
                            <table class="table table-striped table-sm fs-9 mb-0 tableDataTableSearch">
                              <thead>
                                <tr>
                                  <th class="sort border-top border-translucent ps-3" data-sort="pais">País</th>
                                  <th class="sort border-top" data-sort="ciudad">Ciudad</th>
                                  <th class="sort border-top" data-sort="acciones">Acciones</th>
                                </tr>
                              </thead>
                              <tbody id="tableBody">
                                Dynamic rows will be added here 
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <label class="form-label text-body-highlight fs-8 ps-0 text-capitalize lh-sm">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer border-0 pt-6 px-0 pb-0">
                    <button class="btn btn-link text-danger px-3 my-0" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button class="btn btn-primary my-0" id="save-edit">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div> -->



          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "../footer.php"; ?>

<script>
  function showSections(idVisible) {
    let todos = ["content-facturas-entidades", "content-facturas-procedimientos", "content-facturas-centroscosto", "content-facturas-vendedores", "content-facturas-impuestoc", "content-facturas-impuesto_r", "content-centro-costos", "content-info-facturacion", "content-info-doctores", "content-info-metodospago"];
    todos.forEach(element => {
      if (element == idVisible) {
        document.getElementById(element).style.display = "block";
      } else {
        document.getElementById(element).style.display = "none";
      }
    });
  }

  showSections("content-facturas-entidades");

  function handleEditModal() {
    // Select all edit buttons with the class 'edit-button'
    const editButtons = document.querySelectorAll('.edit-button');

    // Loop through each button and attach a click event listener
    editButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Retrieve the data attributes from the clicked button
        const codigo = this.getAttribute('data-codigo');
        const descripcion = this.getAttribute('data-descripcion');
        const subcentro = this.getAttribute('data-subcentro');
        const presupuesto = this.getAttribute('data-presupuesto');
        const movimiento = this.getAttribute('data-movimiento');
        const estado = this.getAttribute('data-estado');

        // Populate the modal input fields with the retrieved data
        document.getElementById('descripcion-edit').value = descripcion;
        document.getElementById('subcentro-edit').value = subcentro;
        document.getElementById('presupuesto-edit').value = presupuesto;
        document.getElementById('movimiento-edit').value = movimiento;
        document.getElementById('estado-edit').value = estado;

        // Update the <h3> tag with the código value
        document.getElementById('codigo-header').textContent = `Centro de Costos: ${codigo}`;
      });
    });
  }

  function handleDeleteModal() {
    // Select all delete buttons with the class 'delete-button'
    const deleteButtons = document.querySelectorAll('.delete-button');

    // Loop through each button and attach a click event listener
    deleteButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Retrieve the 'codigo' data attribute from the clicked button
        const codigo = this.getAttribute('data-codigo');

        // Insert the 'codigo' into the modal
        const codigoSpan = document.getElementById('codigo-to-delete');
        codigoSpan.textContent = codigo;

        // Show the delete confirmation modal
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
      });
    });
  }

  // Call the function to initialize the delete modal handling
  document.addEventListener('DOMContentLoaded', handleDeleteModal);

  // Call the function to initialize the modal handling
  document.addEventListener('DOMContentLoaded', handleEditModal);

  function updateCities(countryId, cityId) {
    const country = document.getElementById(countryId).value;
    const citySelect = document.getElementById(cityId);

    // Clear previous city options
    citySelect.innerHTML = '<option value="" disabled selected>Selecciona una ciudad</option>';

    const citiesByCountry = {
      argentina: ["Buenos Aires", "Córdoba", "Rosario"],
      bolivia: ["La Paz", "Cochabamba", "Santa Cruz"],
      brazil: ["São Paulo", "Rio de Janeiro", "Brasília"],
      chile: ["Santiago", "Valparaíso", "Concepción"],
      colombia: ["Bogotá", "Medellín", "Cali"],
      "costa-rica": ["San José", "Alajuela", "Cartago"],
      cuba: ["La Habana", "Santiago de Cuba", "Camagüey"],
      "dominican-republic": ["Santo Domingo", "Santiago", "San Pedro de Macorís"],
      ecuador: ["Quito", "Guayaquil", "Cuenca"],
      "el-salvador": ["San Salvador", "Santa Ana", "San Miguel"],
      guatemala: ["Ciudad de Guatemala", "Quetzaltenango", "Escuintla"],
      honduras: ["Tegucigalpa", "San Pedro Sula", "La Ceiba"],
      mexico: ["Ciudad de México", "Guadalajara", "Monterrey"],
      nicaragua: ["Managua", "León", "Granada"],
      panama: ["Ciudad de Panamá", "Colón", "David"],
      paraguay: ["Asunción", "Ciudad del Este", "Encarnación"],
      peru: ["Lima", "Arequipa", "Trujillo"],
      uruguay: ["Montevideo", "Salto", "Paysandú"],
      venezuela: ["Caracas", "Maracaibo", "Valencia"],
      usa: ["New York", "Los Angeles", "Chicago"],
      canada: ["Toronto", "Vancouver", "Montreal"],
    };

    if (country && citiesByCountry[country]) {
      citiesByCountry[country].forEach(city => {
        const option = document.createElement('option');
        option.value = city.toLowerCase();
        option.textContent = city;
        citySelect.appendChild(option);
      });
    }
  }

  function handleEditDoctor() {
    // Select all edit buttons with the class 'edit-button'
    const editButtons = document.querySelectorAll('.edit-button');

    // Loop through each button and attach a click event listener
    editButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Declare variables for data attributes
        const nombre = this.getAttribute('data-nombre');
        const especialidad = this.getAttribute('data-especialidad');
        const genero = this.getAttribute('data-genero');
        const contacto = this.getAttribute('data-contacto');
        const correo = this.getAttribute('data-correo');
        const pais = this.getAttribute('data-pais');
        const ciudad = this.getAttribute('data-ciudad');
        const direccion = this.getAttribute('data-direccion');
        const titulo = this.getAttribute('data-titulo');
        const idiomas = this.getAttribute('data-idiomas');
        const servicios = this.getAttribute('data-servicios');
        const anosExperiencia = this.getAttribute('data-anos-experiencia');
        const numeroLicencia = this.getAttribute('data-numero-licencia');
        const areasLicencia = this.getAttribute('data-areas-licencia');

        // Populate the modal input fields with the retrieved data
        document.getElementById('nombre-edit').value = nombre;
        document.getElementById('especialidad-edit').value = especialidad;
        document.getElementById('genero-edit').value = genero;
        document.getElementById('contacto-edit').value = contacto;
        document.getElementById('correo-edit').value = correo;
        document.getElementById('pais-edit').value = pais;
        document.getElementById('ciudad-edit').value = ciudad;
        document.getElementById('direccion-edit').value = direccion;
        document.getElementById('titulo-edit').value = titulo;
        document.getElementById('idiomas-edit').value = idiomas;
        document.getElementById('servicios-edit').value = servicios;
        document.getElementById('anos-experiencia-edit').value = anosExperiencia;
        document.getElementById('numero-licencia-edit').value = numeroLicencia;
        document.getElementById('areas-licencia-edit').value = areasLicencia;

        // You can update any other elements as needed
        // For example:
        document.getElementById('header-title').textContent = `Editing: ${nombre}`;
      });
    });
  }


  function addToTable(countryId, cityId) {
    const countrySelect = document.getElementById(countryId);
    const citySelect = document.getElementById(cityId);
    const tableBody = document.getElementById('tableBody');

    // Get selected options
    const selectedCountryIndex = countrySelect.selectedIndex;
    const selectedCityIndex = citySelect.selectedIndex;

    // Check if the selections are valid
    if (selectedCountryIndex > 0 && selectedCityIndex > 0) {
      const selectedCountry = countrySelect.options[selectedCountryIndex].text;
      const selectedCity = citySelect.options[selectedCityIndex].text;

      // Check if there are existing rows
      if (tableBody.querySelectorAll('tr').length === 0) {
        // Remove "No hay datos disponibles en la tabla" message
        const noDataMessage = tableBody.querySelector('.no-data-message');
        if (noDataMessage) {
          noDataMessage.remove();
        }
      }

      // Create a new row and add it to the table
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
            <td class="border-top ps-3">${selectedCountry}</td>
            <td class="border-top">${selectedCity}</td>
            <td class="border-top">
                <button class="btn btn-danger btn-sm" onclick="removeRow(this)">Eliminar</button>
            </td>
        `;
      tableBody.appendChild(newRow);

    } else {
      alert('Por favor, selecciona un país y una ciudad antes de agregar.');
    }
  }



  function removeRow(button) {
    const row = button.closest('tr');
    row.remove();
  }
</script>

<script>
  $(document).ready(function() {
    selectToModal("modalEntidad", "select2ModalConfig");
  });

  $(document).ready(function() {
    selectToModal("createDoctor", "selectModalNuevo");
  });
</script>

<style>
  .custom-th {
    padding: 0.25rem;
    /* Adjust as needed */
    height: 40px;
    /* Set a fixed height if needed */
    font-size: 16px;
  }

  .custom-td {
    padding: 0.25rem;
    /* Adjust as needed */
    height: 40px;
    /* Set a fixed height if needed */
    font-size: 16px;
    /* Change this value to your desired font size */
  }
</style>

<?php
include "./ModalEntidad.php";
include "./ModalProcedimientos.php";
include "./ModalCentrosCosto.php";
include "./ModalVendedores.php";
include "./ModalImpuestoCargo.php";
include "./ModalImpuestoRetencion.php";
include "./ModalMetodoPago.php";
include "./ModalDoctor.php";
?>