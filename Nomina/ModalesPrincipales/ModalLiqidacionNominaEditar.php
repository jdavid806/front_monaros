<?php

$isRequiredSign = "<font class='text-primary'>*</font>";
$formulaHorasExtraPais = $datosFormula['formula'];


$diaActual = date("d");
$mesActual = date("m");
$anoActual = date("Y");
if ($diaActual > 15) {
    $fechaInicioNomina = "$anoActual-$mesActual-16";
    $fechaFinNomina = "$anoActual-$mesActual-30";
} else {
    $fechaInicioNomina = "$anoActual-$mesActual-01";
    $fechaFinNomina = "$anoActual-$mesActual-15";
}



?>

<div class="modal fade" id="modalNuevaLiquidacionNominaEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLiquidacionModalEditar" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-body-highlight p-6">
            <div class="modal-header justify-content-between border-0 p-0 mb-2">
                <h3 class="mb-0" id="header-modal-liquidacion-nomina-editar"><i class="fas fa-file-signature"></i> Nueva Liquidación de Nomina</h3>
                <button class="btn btn-sm btn-phoenix-secondary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times text-danger"></i>
                </button>
            </div>
            <div class="modal-body px-0">
                <div id="contenido-pagina">
                    <div class="pagina col-md-12 row">
                        <div class="col-md-12">
                            <h4 class="mb-2"> Informacion principal</h4>
                        </div>

                        <div class="col-md-2">
                            <label for="">Fecha Inicio</label>
                            <input readonly class="form-control-sm" style="border:0" type="date" onchange="consultarDatosNominaGrupal()" name="fechaInicio" value="<?= $fechaInicioNomina ?>" id="fechaInicio">
                        </div>

                        <div class="col-md-2">
                            <label for="">Fecha Fin</label>
                            <input readonly class="form-control-sm" style="border:0" type="date" onchange="consultarDatosNominaGrupal()" name="" value="<?= $fechaFinNomina ?>" id="fechaFin">
                        </div>

                        <div class="col-md-8">
                            <br>
                            <p class="text-muted"><i class="fas fa-wallet"></i> Salario base | <i class="fas fa-briefcase-medical"></i> Deducciones | <i class="fas fa-up-long"></i> Bonificaciones y extras | <i class="fas fa-down-long"></i> Descuentos | <i class="fas fa-plus"></i> Provisiones</p>
                        </div>

                        <input type="hidden" id="usuarioId" value="<?= $_SESSION['ID'] ?>">

                        <div class="col-md-12">
                            <h5 class="mb-2 mt-4"> Lista de trabajadores</h5>
                        </div>

                        <div id="loadingDataNomina"></div>


                        <div id="section-liquidacion-nomina-1">
                            <div id="content-slide-trabajadores" class="col-md-12">
                                <div id="accordion">
                                    <div id="datosNominaGrupal"></div>
                                </div>
                            </div>
                        </div>

                        <div id="section-liquidacion-nomina-2">
                            <div class="card col-md-12 mt-2" style="border:2px solid #F6F6F6">
                                <h5 class="card-header"> <i class="fas fa-file"></i> &nbsp; Resumen</h5>
                                <div class="card-body col-md-12 row pt-0">
                                    <table style="margin:10px" class="table table-sm">
                                        <thead>
                                            <tr>
                                                <td> <b>Total Empleados</b> </td>
                                                <td id="Nomina_totalEmpleados"> 0 </td>
                                                <input type="hidden" name="Nomina[totalEmpleados]">
                                            </tr>
                                            <tr>
                                                <td> <b>Total Base</b> </td>
                                                <td id="Nomina_totalBase"> $0.00 </td>
                                                <input type="hidden" name="Nomina[totalBase]">
                                            </tr>
                                            <tr>
                                                <td> <b>Total Extras</b> </td>
                                                <td id="Nomina_totalExtras"> $0.00 </td>
                                                <input type="hidden" name="Nomina[totalExtras]">
                                            </tr>
                                            <tr>
                                                <td> <b>Total Deducciones</b> </td>
                                                <td id="Nomina_totalDeducciones"> $0.00 </td>
                                                <input type="hidden" name="Nomina[totalDeducciones]">
                                            </tr>
                                            <tr>
                                                <td> <b>Total Descuentos</b> </td>
                                                <td id="Nomina_totalDescuentos"> $0.00 </td>
                                                <input type="hidden" name="Nomina[totalDescuentos]">
                                            </tr>
                                            <tr>
                                                <td> <b>Total Provisiones</b> </td>
                                                <td id="Nomina_totalProvisiones"> $0.00 </td>
                                                <input type="hidden" name="Nomina[totalProvisiones]">
                                            </tr>
                                            <tr>
                                                <td> <b>Costo Empresa</b> </td>
                                                <td id="Nomina_Total_Empresa"> $0.00 </td>
                                                <!-- <input type="hidden" name="Nomina[total]"> -->
                                            </tr>
                                            <tr>
                                                <td> <b>Total a pagar</b> </td>
                                                <td id="Nomina_Total"> $0.00 </td>
                                                <input type="hidden" name="Nomina[total]">
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                            <div class="card col-md-12 mt-2" style="border:2px solid #F6F6F6">
                                <h5 class="card-header"> <i class="fas fa-book-open"></i> &nbsp; Notas</h5>
                                <div class="col-md-12">
                                    <label> Observaciones, novedades o comentarios </label>
                                    <textarea class="form-control" type="hidden" name="notas" style="height: 100px" value="0"></textarea>
                                </div>
                            </div>
                        </div>





                        <input type="hidden" id="id" value="0">
                    </div>
                </div>
            </div>

            <!-- <div class="modal-footer border-0 pt-6 px-0 pb-0"> -->
            <div class="modal-footer border-0 pt-6 px-0 pb-0">
                <div class="col-md-12 row">
                    <div class="col-md-6" id="paginacionModal"></div>
                    <div class="col-md-6">
                        <button class="btn btn-link text-danger px-3 my-0" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-arrow-left"></i> &nbsp; Cerrar</button>
                        <button class="btn btn-primary my-0" id="button-save-liquidacion-nomina" onclick="guardarLiquidacionNominaEdit()"><i class="fas fa-bookmark"></i> &nbsp; Guardar Liquidación de Nomina</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

$optionsTiposRecargo = "";
foreach ($datosTiposRecargo as $tiposRecargo) {
    $id = $tiposR[$tiposRecargo["id"]];
    $nombre = $tiposRecargo["nombre"];
    $optionsTiposRecargo .= "<option data-tipocalculo='" . $tiposRecargo['calcularSegun'] . "' data-porcentaje='" . $tiposRecargo['valor'] . "' value='$id'>$nombre</option>";
}


?>



<script>
    let array_trabajadores_edit = [];

    function jsonToHtmlEdit(datosNomina) {
        let contenidoHTML = '';
        array_trabajadores_edit = [];

        datosNomina.forEach(nomina => {
            const empleadoId = nomina.id;
            array_trabajadores_edit.push(empleadoId);


            console.log(`La nomina es `, nomina);


            nomina.descuentos = JSON.parse(nomina.descuentos);
            nomina.bonificaciones = JSON.parse(nomina.bonificaciones);
            nomina.deducciones = JSON.parse(nomina.deducciones);
            nomina.adicionesEmpresa = JSON.parse(nomina.adicionesEmpresa);
            // nomina.adicionesTrabajador = JSON.parse(nomina.adicionesTrabajador);
            nomina.incapacidades = JSON.parse(nomina.incapacidades);


            // Cálculo de los totales, asegurando que los valores sean numéricos
            const totalDescuentos = nomina.descuentos ?
                nomina.descuentos.reduce((sum, item) => sum + (parseFloat(item.valor_descuento) || 0), 0) :
                0;
            const totalBonificaciones = nomina.bonificaciones ?
                nomina.bonificaciones.reduce((sum, item) => sum + (parseFloat(item.valor) || 0), 0) :
                0;

            const totalDeducciones = Object.values(nomina.deducciones)
                .reduce((sum, valor) => sum + (parseFloat(valor) || 0), 0);

            const totalAdicionesEmpresa = Object.values(nomina.adicionesEmpresa)
                .reduce((sum, item) => sum + (parseFloat(item.valor) || 0), 0);

            // const totalAdicionesTrabajador = Object.values(nomina.adicionesTrabajador)
            //     .reduce((sum, item) => sum + (parseFloat(item.valor) || 0), 0);

            const totalIncapacidades = Object.values(nomina.incapacidades)
                .reduce((sum, item) => sum + (parseFloat(item.valor) || 0), 0);


            contenidoHTML += `
        <div class="card">
            <div class="card-header p-1">
                <a class="btn" data-bs-toggle="collapse" href="#collapse${empleadoId}">
                    <span class="" id="Detalle_Encabezado_${empleadoId}_Nombre"><i class="fas fa-user"></i> ${nomina.nombre} </span> |
                    <span class="" id="Detalle_Encabezado_${empleadoId}_SalarioBase"><i class="fas fa-wallet"></i> ${"$ " + new Intl.NumberFormat().format(nomina.salario_base)} </span> |
                    <span class="" id="Detalle_Encabezado_${empleadoId}_Deducciones"><i class="fas fa-briefcase-medical"></i> ${"$ " + new Intl.NumberFormat().format(totalDeducciones)} </span> |
                    <span class="" id="Detalle_Encabezado_${empleadoId}_Extras"><i class="fas fa-up-long"></i> ${"$ " + new Intl.NumberFormat().format(totalBonificaciones)} </span> |
                    <span class="" id="Detalle_Encabezado_${empleadoId}_Descuentos"><i class="fas fa-down-long"></i> ${"$ " + new Intl.NumberFormat().format(totalDescuentos)} </span> |
                    <span class="" id="Detalle_Encabezado_${empleadoId}_Adiciones"><i class="fas fa-plus"></i> ${"$ " + new Intl.NumberFormat().format(totalAdicionesEmpresa)} </span> |
                </a>
            </div>
            <div id="collapse${empleadoId}" class="collapse" data-bs-parent="#accordion">
                <div class="card-body col-md-12 row">
                    <!-- Salario Base -->
                    <div class="card col-md-6" style="border:2px solid #F6F6F6">
                        <h5 class="card-header"> <i class="fas fa-wallet"></i> &nbsp; Salario base </h5>
                        <div class="card-body col-md-12 row pt-0">
                            <table style="margin:10px" class="table table-sm">
                                <thead id="tabla_generales_${empleadoId}">
                                    <tr style="margin:0; padding:0">
                                        <td><b>Salario Mensual</b></td>
                                        <td>${"$ " + new Intl.NumberFormat().format(nomina.salario_base)}</td>
                                        <input type="hidden" name="Nomina[Detalle][${empleadoId}][totalMensual]" value="${nomina.salario_base}">
                                    </tr>
                                    <tr style="margin:0; padding:0">
                                        <td><b>Salario Periodo</b></td>
                                        <!-- <td>${"$ " + new Intl.NumberFormat().format(nomina.salario_calculado)}</td> -->
                                        <td id="salario_calculado_empleado_${empleadoId}"></td>
                                        <input type="hidden" name="Nomina[Detalle][${empleadoId}][totalBase]" value="${nomina.salario_calculado}">
                                    </tr>
                                    ${Object.entries(nomina.incapacidades).map((incapacidad, index) => `
                                    <tr id="fila_incapacidad_empleado_${empleadoId}_${index}" style="margin:0; padding:0">
                                        <td><b>${incapacidad[1].motivo}</b></td>
                                        <td id="incapacidad_empleado_${empleadoId}_${index}">${"$ " + new Intl.NumberFormat().format(incapacidad[1].valor)}</td>
                                        <input type="hidden" name="Nomina[Detalle][${empleadoId}][incapacidades][${index}]" value="${incapacidad[1].valor}">
                                    </tr>
                                    `).join('')}
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- Deducciones -->
                    <div class="card col-md-6" id="contenido_deducciones_${empleadoId}" style="border:2px solid #F6F6F6">
                        <h5 class="card-header"> <i class="fas fa-briefcase-medical"></i> &nbsp; Deducciones <i data-bs-toggle="offcanvas" data-bs-target="#offcanvasNewItemViewEdit" aria-controls="offcanvasExample" onclick="agregarItemEdit('${empleadoId}', 'deducciones','${nomina.nombre}')" class="fa-solid fa-circle-plus"></i> </h5>
                        <div class="card-body col-md-12 row pt-0">
                            <table id="tabla_deducciones_${empleadoId}" style="margin:10px" class="table table-sm">
                                <thead>
                                    <tr style="margin:0; padding:0">
                                        <td colspan="3" style="padding-left:0 !important"> <input type="checkbox" checked onchange="seleccionarChecksEdit(this, 'checkboxes_deducciones_${empleadoId}')"> </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${Object.entries(nomina.deducciones).map((deduccion, index) => `
                                        <tr id="fila_deducciones_${empleadoId}_${index}">
                                            <td><input type="checkbox" class="checkboxes_deducciones_${empleadoId}" data-porcentaje="${deduccion[1].porcentaje}" ${deduccion[1].checked ? 'checked' : '' } onchange="calcularNominaEdit()" name="Nomina[Detalle][${empleadoId}][deducciones][${index}]" value='${JSON.stringify(deduccion[1])}'> </td>
                                            <td><b>${deduccion[1].motivo}</b></td>
                                            <td>${"$ " + new Intl.NumberFormat().format(deduccion[1].valor)}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"> Total </td>
                                        <td id="Nomina_Detalle_${empleadoId}_totalDeducciones"> ${"$ " + new Intl.NumberFormat().format(totalDeducciones)} </td>
                                        <input type="hidden" name="Nomina[Detalle][${empleadoId}][totalDeducciones]" value="${totalDeducciones}">
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Bonificaciones -->
                    <div class="card col-md-6" id="contenido_bonificaciones_${empleadoId}" style="border:2px solid #F6F6F6">
                        <h5 class="card-header"> <i class="fas fa-up-long"></i> &nbsp; Bonificaciones y extras <i data-bs-toggle="offcanvas" data-bs-target="#offcanvasNewItemViewEdit" aria-controls="offcanvasExample" onclick="agregarItemEdit('${empleadoId}', 'extras','${nomina.nombre}')" class="fa-solid fa-circle-plus"></i> </h5> 
                        <div class="card-body col-md-12 row pt-0">
                            <table id="tabla_bonificaciones_${empleadoId}" style="margin:10px" class="table table-sm">
                                <thead>
                                    <tr style="margin:0; padding:0">
                                        <td colspan="3" style="padding-left:0 !important"> <input type="checkbox" checked onchange="seleccionarChecksEdit(this, 'checkboxes_extras_${empleadoId}')"> </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${nomina.bonificaciones.map((bonificacion, index) => `
                                        <tr id="fila_bonificaciones_${empleadoId}_${index}">
                                            <td> <input type="checkbox" class="checkboxes_extras_${empleadoId}" ${bonificacion.checked ? 'checked' : '' } onchange="calcularNominaEdit()" name="Nomina[Detalle][${empleadoId}][extras][${index}]" value='${JSON.stringify(bonificacion)}'> </td>
                                            <td><b>${bonificacion.motivo} ${bonificacion.esSalarial == 'Si' ? '(Salarial)' : ''}</b></td>
                                            <td>${"$ " + new Intl.NumberFormat().format(bonificacion.valor)}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"> Total </td>
                                        <td id="Nomina_Detalle_${empleadoId}_totalExtras"> ${"$ " + new Intl.NumberFormat().format(totalBonificaciones)} </td>
                                        <input type="hidden" name="Nomina[Detalle][${empleadoId}][totalExtras]" value="${totalBonificaciones}">
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Descuentos -->
                    <div class="card col-md-6" id="contenido_descuentos_${empleadoId}" style="border:2px solid #F6F6F6">
                        <h5 class="card-header"> <i class="fas fa-down-long"></i> &nbsp; Descuentos <i data-bs-toggle="offcanvas" data-bs-target="#offcanvasNewItemViewEdit" aria-controls="offcanvasExample" onclick="agregarItemEdit('${empleadoId}', 'descuentos','${nomina.nombre}')" class="fa-solid fa-circle-plus"></i></h5>
                        <div class="card-body col-md-12 row pt-0">
                            <table id="tabla_descuentos_${empleadoId}" style="margin:10px" class="table table-sm">
                                <thead>
                                    <tr style="margin:0; padding:0">
                                        <td colspan="3" style="padding-left:0 !important"> <input type="checkbox" checked onchange="seleccionarChecksEdit(this, 'checkboxes_descuentos_${empleadoId}')"> </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${nomina.descuentos.map((descuento, index) => `
                                        <tr id="fila_descuentos_${empleadoId}_${index}">
                                            <td> <input type="checkbox" class="checkboxes_descuentos_${empleadoId}" ${descuento.checked ? 'checked' : '' } onchange="calcularNominaEdit()" name="Nomina[Detalle][${empleadoId}][descuentos][${index}]" value='${JSON.stringify(descuento)}'> </td>
                                            <td><b>${descuento.motivo}</b></td>
                                            <td>${"$ " + new Intl.NumberFormat().format(descuento.valor_descuento)}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"> Total </td>
                                        <td id="Nomina_Detalle_${empleadoId}_totalDescuentos"> ${"$ " + new Intl.NumberFormat().format(totalDescuentos)} </td>
                                        <input type="hidden" name="Nomina[Detalle][${empleadoId}][totalDescuentos]" value="${totalDescuentos}">
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card col-md-6" id="contenido_adiciones_${empleadoId}" style="border:2px solid #F6F6F6">
                        <h5 class="card-header"> <i class="fas fa-plus"></i> &nbsp; Provisiones </h5>
                        <div class="card-body col-md-12 row pt-0">
                            <table id="tabla_adiciones_${empleadoId}" style="margin:10px" class="table table-sm">
                                <thead>
                                    <tr style="margin:0; padding:0">
                                        <td colspan="3" style="padding-left:0 !important"><input type="checkbox" checked disabled onchange="seleccionarChecksEdit(this, 'checkboxes_adiciones_${empleadoId}')"> </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${nomina.adicionesEmpresa.map((adicion, index) => `
                                        <tr id="fila_adiciones_${empleadoId}_${index}">
                                            <td> <input type="checkbox" class="checkboxes_adiciones_${empleadoId}" ${adicion.checked ? 'checked' : '' } disabled onchange="calcularNominaEdit()" name="Nomina[Detalle][${empleadoId}][adiciones][${index}]" value='${JSON.stringify(adicion)}'> </td>
                                            <td><b>${adicion.motivo}</b></td>
                                            <td>${"$ " + new Intl.NumberFormat().format(adicion.valor)}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"> Total </td>
                                        <td id="Nomina_Detalle_${empleadoId}_totalAdiciones"> ${"$ " + new Intl.NumberFormat().format(totalAdicionesEmpresa)} </td>
                                        <input type="hidden" name="Nomina[Detalle][${empleadoId}][totalAdiciones]" value="${totalAdicionesEmpresa}">
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card col-md-6" style="border:2px solid #F6F6F6">
                        <h5 class="card-header"> <i class="fas fa-book-open"></i> &nbsp; Notas</h5>
                        <div class="card-body col-md-12 row pt-0">
                            <label>Observaciones</label>
                            <textarea class="form-control" style="height: 100px" name="Nomina[Detalle][${empleadoId}][notas]">${nomina.notas}</textarea>
                        </div>
                    </div>
                    <!-- Total Nomina -->
                    <div class="card col-md-6" style="border:2px solid #F6F6F6">
                        <h5 class="card-header"> <i class="fas fa-coins"></i> &nbsp; Total Pago Trabajador</h5>
                        <div class="card-body col-md-12 row pt-0">
                            
                            <table style="margin:10px" class="table table-sm">
                                <thead>
                                    
                                    <tr>
                                        <td> Salario Base </td>
                                        <td id="Nomina_Detalle_${empleadoId}_salario_base_2"> $0.00 </td>
                                    </tr>
                                    <tr>
                                        <td> Total Extras </td>
                                        <td id="Nomina_Detalle_${empleadoId}_total_extras_2"> $0.00 </td>
                                    </tr>
                                    <tr>
                                        <td> Total Deducciones </td>
                                        <td id="Nomina_Detalle_${empleadoId}_total_deducciones_2"> $0.00 </td>
                                    </tr>
                                    <tr>
                                        <td> Total Descuentos </td>
                                        <td id="Nomina_Detalle_${empleadoId}_total_descuentos_2"> $0.00 </td>
                                    </tr>

                                    <tr>
                                        <td> Total </td>
                                        <td id="Nomina_Detalle_${empleadoId}_total"> $0.00 </td>
                                        <input type="hidden" name="Nomina[Detalle][${empleadoId}][total]" value="0">
                                    </tr>

                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card col-md-6" style="border:2px solid #F6F6F6">
                        <h5 class="card-header"> <i class="fas fa-coins"></i> &nbsp; Total Pago Empresa</h5>
                        <div class="card-body col-md-12 row pt-0">
                            <table style="margin:10px" class="table table-sm">
                                <thead>
                                    <tr>
                                        <td> Salario Base </td>
                                        <td id="Nomina_Detalle_${empleadoId}_total_salariobase_3"> $0.00 </td>
                                    </tr>
                                    <tr>
                                        <td> Extras </td>
                                        <td id="Nomina_Detalle_${empleadoId}_total_extras_3"> $0.00 </td>
                                    </tr>
                                    <tr>
                                        <td> Provisiones </td>
                                        <td id="Nomina_Detalle_${empleadoId}_total_provisiones_3"> $0.00 </td>
                                    </tr>
                                    <tr>
                                        <td> Total </td>
                                        <td id="Nomina_Detalle_${empleadoId}_total_empresa"> $0.00 </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
        });
        return contenidoHTML;
    }


    function agregarItemEdit(idTrabajador, tipo, nombreTrabajador) {

        $("#offcanvasExampleLabelNewItemEdit").html('');
        $("#offcanvasContentNewItemEdit").html('');


        
// btnOffCanvasCloseEdit


        let dataOffCanvas = {};
        let idUsuario = <?php echo $_SESSION['ID']; ?>;
        if (tipo == 'deducciones') {
            let urlAjax = '<?= $BASE ?>Nomina/Ajax/AjaxDeduccion.php';
            dataOffCanvas = {
                title: 'Trabajador: ' + nombreTrabajador,
                html: ` <div class='col-md-12 row'>
                    <h5 class='mb-2'>Nueva deducción individual</h5>
                    <div class='col-md-12'>
                        <label class='text-muted'>Deduccion</label>
                        <input class='form-control' type='text' id="deduccion" value='' placeholder='Motivo de la deducción'>
                    </div>
                    <div class='col-md-12'>
                        <label class='text-muted'>Valor</label>
                        <input class='form-control' type='number' id="valor" value='0'>
                    </div>
                    <div class='col-md-12'>
                        <label class='text-muted'>Periocidad</label>
                        <select class='form-select' type='text' id="periocididad" value=''>
                            <option value='Unica'>Unica</option>
                            <option value='Mensual'>Mensual</option>
                            <option value='Quincenal'>Quincenal</option>
                            <option value='Trimestral'>Trimestral</option>
                            <option value='Semestral'>Semestral</option>
                            <option value='Anual'>Anual</option>
                        </select>
                    </div>
                    <div class='col-md-12'>
                        <label class='text-muted'></label>
                        <button class='btn btn-primary mt-2' onclick="guardarItemEdit('${btoa(urlAjax)}')"><i class='fas fa-bookmark'></i>Guardar</button>
                    </div>

                    <input type="hidden" id="idTrabajador" value="${idTrabajador}">
                    <input type="hidden" id="deduccionActiva" value="Si">
                    <input type="hidden" id="idUsuario" value="${idUsuario}">
                </div>`,
            }
        } else if (tipo == 'extras') {
            let urlAjax = '<?= $BASE ?>Nomina/Ajax/AjaxRecargo.php';
            dataOffCanvas = {
                title: 'Trabajador: ' + nombreTrabajador,
                html: `
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button onclick="tabsAdicionales('recargo', '${urlAjax}', '${idTrabajador}')" class="btn btn-primar active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Tipo de recargo</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button onclick="tabsAdicionales('otro', '${urlAjax}', '${idTrabajador}')" class="btn btn-primar" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Otros</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="pagina col-md-12 row">
                            <div class="col-md-12">
                                <label for="">Tipo de recargo <font class="text-primary">*</font></label>
                                <select class="form-control" style="width: 100%;" onchange="calcularRecargo();" id="tipoRecargo" >
                                    <option value="">Seleccione</option>
                                    <?= $optionsTiposRecargo ?>
                                </select>
                            </div>


                            <div class="col-md-12 mb-1 ">
                                <label class="form-label">Fecha <span class="text-primary">*</span></label>
                                <input onchange="" value="2024-11-20" class="form-control" type="date" required="" id="fechaRecargo" placeholder="Fecha">
                            </div>
                            <div class="col-md-12 mb-1 ">
                                <label class="form-label">Horas de Recargo <span class="text-primary">*</span></label>
                                <input onchange="calcularRecargo()" value="1" class="form-control" type="number" required="" id="horasRecargo" placeholder="Horas de Recargo">
                            </div>
                            <div class="col-md-12 mb-1 ">
                                <label class="form-label">Motivo <span class="text-primary">*</span></label>
                                <input onchange="" value="" class="form-control" type="text" required="" id="motivo" placeholder="Motivo">
                            </div>

                            <div class="col-md-12 mb-1 ">
                                <label class="form-label">Valor <span class="text-primary">*</span></label>
                                <input onchange="calcularRecargo()" value="100" class="form-control" type="number" required="" id="valorRecargo" placeholder="Valor">
                            </div>
                            
                            <div class="col-md-12">
                                <label for="">Observaciones</label>
                                <textarea class="form-control" style="height: 100px" id="observaciones"></textarea>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="esSalarial">
                                    <label class="form-check-label" for="esSalarial">Es salarial </label>
                                </div>
                            </div>

                            <div class='col-md-12'>
                                <label class='text-muted'></label>
                                <button class='btn btn-primary mt-2' onclick="guardarItemEdit('${btoa(urlAjax)}')"><i class='fas fa-bookmark'></i>Guardar</button>
                            </div>

                            <input type="hidden" id="pagado" value="No">
                            <input type="hidden" id="idTrabajador" value="${idTrabajador}">
                            <input type="hidden" id="idUsuario" value="${idUsuario}">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        
                    </div>
                </div>`,
            }
        } else if (tipo == 'descuentos') {
            let urlAjax = '<?= $BASE ?>Nomina/Ajax/AjaxDescuento.php';
            dataOffCanvas = {
                title: 'Trabajador: ' + nombreTrabajador,
                html: ` <div class='col-md-12 row'>
                    <h5 class='mb-2'>Nuevo descuento</h5>
                    <div class='col-md-12'>
                        <label class='text-muted'>Valor</label>
                        <input class='form-control' type='number' id="valorDescuento" value='0'>
                    </div>
                    <div class='col-md-12'>
                        <label class='text-muted'>Motivo</label>
                        <input class='form-control' type='text' id="motivo" value='' placeholder='Motivo del descuento'>
                    </div>
                    <div class='col-md-12'>
                        <label class='text-muted'>Observaciones o detalles</label>
                        <textarea class='form-control' type='text' id="detalles" style='height: 100px'></textarea>
                    </div>
                    <div class='col-md-12'>
                        <label class='text-muted'></label>
                        <button class='btn btn-primary mt-2' onclick="guardarItemEdit('${btoa(urlAjax)}')"><i class='fas fa-bookmark'></i>Guardar</button>
                    </div>

                    <input type="hidden" id="idTrabajador" value="${idTrabajador}">
                    <input type="hidden" id="descontado" value="No">
                    <input type="hidden" id="idUsuario" value="${idUsuario}">
                </div>`,
            }
        }

        console.log("dataOffCanvas", dataOffCanvas);


        $("#offcanvasExampleLabelNewItemEdit").html(dataOffCanvas.title);
        $("#offcanvasContentNewItemEdit").html(dataOffCanvas.html);



    }



    function seleccionarChecksEdit(check, claseChecks) {
        let isChecked = check.checked;
        $(`#modalNuevaLiquidacionNominaEditar .${claseChecks}`).each(function() {
            this.checked = isChecked;
        });
        calcularNominaEdit()
    }


    let jsonNominaCompletoEditar = {};


    function calcularNominaEdit() {

        let observacionesGenerales = $("modalNuevaLiquidacionNominaEditar #notas").val();
        let total = 0;
        let totalAdiciones = 0;
        let totalBase = 0;
        let totalDeducciones = 0;
        let totalDescuentos = 0;
        let totalEmpleados = 0;
        let totalEmpresa = 0;
        let totalExtras = 0;

        let detalle = [];
        for (const i in array_trabajadores_edit) {
            let idTrabajador = array_trabajadores_edit[i];

            let detalleTrabajador = {};

            let notas = $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][notas]"]`).val();
            let totalAdicionesEmpleado = 0;
            let totalBaseEmpleado = Number($(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][totalBase]"]`).val());
            let totalDeduccionesEmpleado = 0;
            let totalDescuentosEmpleado = 0;
            let totalEmpleado = 0;
            let totalExtrasEmpleado = 0;
            let totalEmpresaEmpleado = 0;

            // Calculo de extras (bonificaciones)
            let extras = {};
            $(`#modalNuevaLiquidacionNominaEditar #contenido_bonificaciones_${idTrabajador} #tabla_bonificaciones_${idTrabajador} tbody tr`).each(function() {
                let fila = $(this);
                let idFila = fila.attr('id');
                let indiceFila = idFila.split('_');
                let index = indiceFila[3];

                let checkbox = $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][extras][${index}]"]`);
                if (checkbox.is(':checked')) {
                    let datos = JSON.parse(checkbox.val());
                    extras[index] = datos;

                    if (datos.esSalarial == 'Si') {
                        totalBaseEmpleado += Number(datos.valor);
                    } else {
                        totalExtrasEmpleado += Number(datos.valor);
                    }
                }
            });

            let incapacidades = {};
            $(`#modalNuevaLiquidacionNominaEditar #tabla_generales_${idTrabajador} tr`).each(function() {
                let fila = $(this);
                let idFila = fila.attr('id');
                if (idFila) {
                    if (idFila.includes('fila_incapacidad_empleado_')) {

                        let indiceFila = idFila.split('_');
                        let index = indiceFila[4];

                        let input = $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][incapacidades][${index}]"]`);
                        let valor = input.val();
                        totalBaseEmpleado += Number(valor);
                    }
                }
            });

            // Calculo de deducciones
            let deducciones = {};
            $(`#modalNuevaLiquidacionNominaEditar #contenido_deducciones_${idTrabajador} #tabla_deducciones_${idTrabajador} tbody tr`).each(function() {
                let fila = $(this);
                let idFila = fila.attr('id');
                let indiceFila = idFila.split('_');
                let index = indiceFila[3];

                let checkbox = $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][deducciones][${index}]"]`);
                let dataporcentaje = checkbox.attr('data-porcentaje');

                console.log(`Deducciones checkbox.is(':checked') ${checkbox.is(':checked')}`);


                if (checkbox.is(':checked')) {
                    let datos = JSON.parse(checkbox.val());
                    let valor = Number((totalBaseEmpleado * Number(dataporcentaje)) / 100);

                    console.log('datos', datos);
                    console.log('valor', valor);

                    //Sobreescribimos la propiedad valor para que calcule segun el salario base con las extras salariales
                    datos.valor = valor;

                    deducciones[index] = datos;
                    totalDeduccionesEmpleado += Number(datos.valor);
                    console.log(`Total de deducciones va en `, totalDeduccionesEmpleado);

                }
            });


            // Calculo de descuentos
            let descuentos = {};
            $(`#modalNuevaLiquidacionNominaEditar #contenido_descuentos_${idTrabajador} #tabla_descuentos_${idTrabajador} tbody tr`).each(function() {
                let fila = $(this);
                let idFila = fila.attr('id');
                let indiceFila = idFila.split('_');
                let index = indiceFila[3];

                let checkbox = $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][descuentos][${index}]"]`);
                if (checkbox.is(':checked')) {
                    let datos = JSON.parse(checkbox.val());
                    descuentos[index] = datos;
                    totalDescuentosEmpleado += Number(datos.valor_descuento);
                }
            });
            // Calculo de descuentos

            let adiciones = {};
            $(`#modalNuevaLiquidacionNominaEditar #contenido_adiciones_${idTrabajador} #tabla_adiciones_${idTrabajador} tbody tr`).each(function() {
                let fila = $(this);
                let idFila = fila.attr('id');
                let indiceFila = idFila.split('_');
                let index = indiceFila[3];

                let checkbox = $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][adiciones][${index}]"]`);
                if (checkbox.is(':checked')) {
                    let datos = JSON.parse(checkbox.val());
                    adiciones[index] = datos;
                    totalAdicionesEmpleado += Number(datos.valor);
                }
            });

            // "$ " + new Intl.NumberFormat().format(nomina.salario_calculado
            $("#modalNuevaLiquidacionNominaEditar #salario_calculado_empleado_" + idTrabajador).html("$ " + numberFormatJS(totalBaseEmpleado));

            // Calculo total del empleado
            totalEmpleado = totalBaseEmpleado + totalExtrasEmpleado - totalDeduccionesEmpleado - totalDescuentosEmpleado;

            // Actualizar valores en el DOM
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_totalAdiciones`).html("$ " + numberFormatJS(totalAdicionesEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_totalExtras`).html("$ " + numberFormatJS(totalExtrasEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_totalDeducciones`).html("$ " + numberFormatJS(totalDeduccionesEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_totalDescuentos`).html("$ " + numberFormatJS(totalDescuentosEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total`).html("$ " + numberFormatJS(totalEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total_trabajador`).html("$ " + numberFormatJS(totalEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total_provisiones_2`).html("$ " + numberFormatJS(totalAdicionesEmpleado));

            $(`#modalNuevaLiquidacionNominaEditar #Detalle_Encabezado_${idTrabajador}_Extras`).html("<i class='fas fa-down-long'></i> $ " + numberFormatJS(totalExtrasEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Detalle_Encabezado_${idTrabajador}_Adiciones`).html("<i class='fas fas fa-plus'></i> $ " + numberFormatJS(totalAdicionesEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Detalle_Encabezado_${idTrabajador}_Deducciones`).html("<i class='fas fa-briefcase-medical'></i> $ " + numberFormatJS(totalDeduccionesEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Detalle_Encabezado_${idTrabajador}_Descuentos`).html("<i class='fas fa-up-long'></i> $ " + numberFormatJS(totalDescuentosEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Detalle_Encabezado_${idTrabajador}_SalarioBase`).html("<i class='fas fa-wallet '></i> $ " + numberFormatJS(totalBaseEmpleado));

            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_salario_base_2`).html("$ " + numberFormatJS(totalBaseEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total_extras_2`).html("$ " + numberFormatJS(totalExtrasEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total_deducciones_2`).html("$ " + numberFormatJS(totalDeduccionesEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total_descuentos_2`).html("$ " + numberFormatJS(totalDescuentosEmpleado));

            totalEmpresaEmpleado = totalBaseEmpleado + totalExtrasEmpleado + totalAdicionesEmpleado;


            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total_salariobase_3`).html("$ " + numberFormatJS(totalBaseEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total_extras_3`).html("$ " + numberFormatJS(totalExtrasEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total_provisiones_3`).html("$ " + numberFormatJS(totalAdicionesEmpleado));
            $(`#modalNuevaLiquidacionNominaEditar #Nomina_Detalle_${idTrabajador}_total_empresa`).html("$ " + numberFormatJS(totalEmpresaEmpleado));

            // Actualizar valores de input hidden
            $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][totalAdiciones]"]`).val(totalAdicionesEmpleado);
            $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][totalDeducciones]"]`).val(totalDeduccionesEmpleado);
            $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][totalExtras]"]`).val(totalExtrasEmpleado);
            $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][totalDescuentos]"]`).val(totalDescuentosEmpleado);
            $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[Detalle][${idTrabajador}][total]"]`).val(totalEmpleado);

            detalleTrabajador = {
                adiciones,
                deducciones,
                descuentos,
                extras,
                idTrabajador,
                notas,
                total: totalEmpleado,
                totalEmpresa: totalEmpresaEmpleado,
                totalAdiciones: totalAdicionesEmpleado,
                totalBase: totalBaseEmpleado,
                totalDeducciones: totalDeduccionesEmpleado,
                totalDescuentos: totalDescuentosEmpleado,
                totalExtras: totalExtrasEmpleado,
            };

            detalle.push(detalleTrabajador);

            totalEmpleados += 1;
            totalExtras += totalExtrasEmpleado;
            totalDeducciones += totalDeduccionesEmpleado;
            totalDescuentos += totalDescuentosEmpleado;
            totalBase += totalBaseEmpleado;
            totalAdiciones += totalAdicionesEmpleado;
            total += totalEmpleado;
            totalEmpresa += totalEmpresaEmpleado;
        }

        // Actualizar los totales generales en el DOM
        $("#modalNuevaLiquidacionNominaEditar #Nomina_totalEmpleados").html(numberFormatJS(totalEmpleados));
        $("#modalNuevaLiquidacionNominaEditar #Nomina_totalExtras").html("$ " + numberFormatJS(totalExtras));
        $("#modalNuevaLiquidacionNominaEditar #Nomina_totalDeducciones").html("$ " + numberFormatJS(totalDeducciones));
        $("#modalNuevaLiquidacionNominaEditar #Nomina_totalDescuentos").html("$ " + numberFormatJS(totalDescuentos));
        $("#modalNuevaLiquidacionNominaEditar #Nomina_totalBase").html("$ " + numberFormatJS(totalBase));
        $("#modalNuevaLiquidacionNominaEditar #Nomina_totalProvisiones").html("$ " + numberFormatJS(totalAdiciones));
        $("#modalNuevaLiquidacionNominaEditar #Nomina_Total").html("$ " + numberFormatJS(total));
        $("#modalNuevaLiquidacionNominaEditar #Nomina_Total_Empresa").html("$ " + numberFormatJS(totalExtras + totalBase + totalAdiciones));


        // Actualizar valores de input hidden para los totales generales
        $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[totalEmpleados]"]`).val(totalEmpleados);
        $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[totalExtras]"]`).val(totalExtras);
        $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[totalDeducciones]"]`).val(totalDeducciones);
        $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[totalDescuentos]"]`).val(totalDescuentos);
        $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[totalBase]"]`).val(totalBase);
        $(`#modalNuevaLiquidacionNominaEditar input[name="Nomina[total]"]`).val(total);

        // Log para debug
        let data = {
            detalle,
            notas: observacionesGenerales,
            total,
            totalAdiciones,
            totalEmpresa,
            totalBase,
            totalDeducciones,
            totalDescuentos,
            totalExtras,
            totalTrabajadores: totalEmpleados
        };

        jsonNominaCompletoEditar = data;

        console.log("Json completo");
        console.log(jsonNominaCompletoEditar);

    }

    function resetModalLiquidacionNominaEditar() {
        let keys = ["fechaInicio", "fechaFin", "usuarioId"];
        for (const key in keys) {
            let elemento = $("#modalNuevaLiquidacionNominaEditar #" + keys[key]);
            elemento.val('');
        }

        $("#modalNuevaLiquidacionNominaEditar #header-modal-liquidacion-nomina-editar").html(`<i class="fas fa-file-signature"></i> Nueva Liquidación de Nomina`);
        $("#modalNuevaLiquidacionNominaEditar #id").val("0");
        $("#modalNuevaLiquidacionNominaEditar #button-save-liquidacion-nomina").html(`<i class="fas fa-bookmark"></i> &nbsp; Guardar Liquidación de Nomina`);
    }

    function guardarLiquidacionNominaEdit() {
        let keys = ["usuarioId", "id", "notas"];
        let data = jsonNominaCompletoEditar;
        for (const key in keys) {
            let elemento = $("#modalNuevaLiquidacionNominaEditar #" + keys[key]);
            if (elemento.val() == "" && elemento.attr("required") !== undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Todos los campos obligatorios deben estar completos!'
                })
                return false;
            }
            data[keys[key]] = elemento.val();
        }

        data.action = "actualizar";

        console.log("dataEnviada ", data);
        // return;


        $.ajax({
            type: "POST",
            url: "<?= $BASE ?>Nomina/Ajax/AjaxNominaGrupal.php",
            data,
            success: function(response) {
                console.log(response);

                let dataResponse = JSON.parse(response);
                const { icon, title, text } = dataResponse;
                Swal.fire({ icon, title, text });

                if (dataResponse.error) {
                    console.log(dataResponse.error);
                    return;
                }

                if (icon == "success") {
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                }
            }
        });

        // resetModalLiquidacionNominaEditar();
        // $("#modalNuevaLiquidacionNominaEditar").modal("hide");
    }

    function editarLiquidacionNominaEdit(id) {

        $.ajax({
            type: "POST",
            url: "<?= $BASE ?>Nomina/Ajax/AjaxNominaGrupal.php",
            data: {
                action: "consultarId",
                id
            },
            success: function(response) {
                console.log(response);
                let html = jsonToHtmlEdit(JSON.parse(response));
                $(`#modalNuevaLiquidacionNominaEditar #datosNominaGrupal`).html(html);
                calcularNominaEdit();

            }
        });



        $("#modalNuevaLiquidacionNominaEditar #id").val(id);
        $("#modalNuevaLiquidacionNominaEditar #header-modal-liquidacion-nomina-editar").html(`<i class="fas fa-wrench"></i> Actualizar Liquidación de Nomina`);
        $("#modalNuevaLiquidacionNominaEditar #button-save-liquidacion-nomina").html(`<i class="fas fa-wrench"></i> &nbsp; Actualizar Liquidación de Nomina`);

        // for (const key in data) {
        //     $("#modalNuevaLiquidacionNominaEditar #" + key).val(data[key]).change();
        // }
        // console.log(data);

        $("#modalNuevaLiquidacionNominaEditar").modal("show");
    }




    function guardarItemEdit(urlAjax) {
        let offCanvas = $("#offcanvasNewItemViewEdit");
        let data = {};
        let formIsValid = true;
        urlAjax = atob(urlAjax);

        $(offCanvas).find("input, textarea").each(function() {
            if (!formIsValid) return;
            let key = $(this).attr("id");
            let isRequired = $(this).attr("required");
            let valor = $(this).val();

            if (isRequired !== undefined && valor == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Todos los campos obligatorios deben estar completos!'
                });
                return;
            }
            if ($(this).attr("type") == "checkbox") {
                if ($(this).is(":checked")) {
                    data[key] = "Si";
                } else {
                    data[key] = "No";
                }
            } else {
                data[key] = valor;
            }
        });

        if (!formIsValid) return;

        data.action = "crear";

        $.ajax({
            type: "POST",
            url: urlAjax,
            data,
            success: function(response) {
                let dataResponse = JSON.parse(response);
                const { icon, title, text } = dataResponse;
                Swal.fire({ icon, title, text});

                if (dataResponse.error) {
                    console.log(dataResponse.error);
                    return;
                }

                if (icon == "success") {
                    $("#btnOffCanvasCloseEdit").click();
                    editarLiquidacionNominaEdit( ( $("#modalNuevaLiquidacionNominaEditar #id").val() ) );
                }
            }
        });

    }


    function calcularRecargo() {
        // Obtener valores numéricos del salario y valor hora desde PHP
        const salarioEmpleado = parseFloat("<?= $datosTrabajador['salario'] ?>") || 0;
        const valorHoraConfiguracion = parseFloat("<?= $datosTrabajador['valorHora'] ?>") || 0;
        let formulaHorasExtraPais = "<?= $formulaHorasExtraPais ?>";
        // console.log("Formula " , formulaHorasExtraPais);
        // console.log("Formula " , formulaHorasExtraPais);
        formulaHorasExtraPais = formulaHorasExtraPais.replace("salarioEmpleado", salarioEmpleado);



        // Obtener valores de los campos del modal
        const horasRecargo = parseFloat($("#offcanvasNewItemViewEdit #horasRecargo").val()) || 0;
        const tipoRecargo = $("#offcanvasNewItemViewEdit #tipoRecargo option:selected");
        const tipocalculo = tipoRecargo.attr("data-tipocalculo");
        const porcentaje = parseFloat(tipoRecargo.attr("data-porcentaje")) || 0;

        console.log({
            salarioEmpleado,
            valorHoraConfiguracion,
            horasRecargo,
            tipoRecargo: tipoRecargo.text(),
            tipocalculo,
            porcentaje
        });

        // Validaciones iniciales
        if (isNaN(horasRecargo) || horasRecargo <= 0) {
            // alert("Por favor, introduce un valor válido para las horas de recargo.");
            return;
        }

        if (!tipoRecargo.length || !tipocalculo) {
            // alert("Por favor, selecciona un tipo de recargo válido.");
            return;
        }

        let valorRecargo = 0;

        // Calculo del recargo según el tipo
        if (tipocalculo === 'horaTrabajador') {
            // Calculo basado en salario del empleado
            // const valorHoraEmpleado = salarioEmpleado / 30 / 8;
            const valorHoraEmpleado = eval(formulaHorasExtraPais);
            valorRecargo = horasRecargo * valorHoraEmpleado * (porcentaje / 100);
        } else {
            // Calculo basado en la configuración general
            valorRecargo = horasRecargo * valorHoraConfiguracion * (porcentaje / 100);
        }

        // Redondear a dos decimales y establecer el valor en el campo correspondiente
        valorRecargo = Math.round(valorRecargo * 100) / 100;

        $("#offcanvasNewItemViewEdit #valorRecargo").val(valorRecargo);

        console.log("Valor del recargo calculado: ", valorRecargo);
    }


    $(document).ready(function() {


        // $("#modalNuevaLiquidacionNominaEditar").on("shown.bs.modal", function() {
        //     consultarDatosNominaGrupal();
        // })

        selectToModal("modalNuevaLiquidacionNominaEditar", "selectModalLiquidacion");
        // calcularNominaEdit()
        paginacionModal("modalNuevaLiquidacionNominaEditar", "section-liquidacion-nomina-", 2)
    });
</script>

<style>
    .displayNone {
        display: none;
    }

    .offcanvas-zindex {
        z-index: 1000000000 !important;
        /* Asegúrate de que sea mayor que el z-index del modal Bootstrap */
    }

    #content-slide-trabajadores {
        max-height: 500px;
        overflow-y: auto;
        /* Scroll vertical */
        overflow-x: hidden;
        /* Ocultar scroll horizontal */
        scrollbar-width: thin;
        /* Estilo para navegadores compatibles */
        scrollbar-color: #B3B3B3 transparent;
        /* Color de la barra y fondo transparente */
    }

    /* Estilo para navegadores basados en Webkit (Chrome, Edge, Safari) */
    #content-slide-trabajadores::-webkit-scrollbar {
        width: 10px;
        /* Ancho de la barra */
    }

    #content-slide-trabajadores::-webkit-scrollbar-track {
        background: transparent;
        /* Fondo transparente */
    }

    #content-slide-trabajadores::-webkit-scrollbar-thumb {
        background-color: #B3B3B3;
        /* Color de la barra */
        border-radius: 10px;
        /* Bordes redondeados */
        border: 2px solid transparent;
        /* Espaciado entre la barra y el track */
    }

    #content-slide-trabajadores::-webkit-scrollbar-thumb:hover {
        background-color: #999;
        /* Color más oscuro al pasar el mouse */
    }
</style>

<style>
    #datosNominaGrupal table * {
        font-size: 13px !important;
    }
</style>

<div class="offcanvas offcanvas-end offcanvas-zindex" tabindex="-1" id="offcanvasNewItemViewEdit" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h4 class="offcanvas-title" id="offcanvasExampleLabelNewItemEdit"></h4>
        <button type="button" id="btnOffCanvasCloseEdit" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div id="offcanvasContentNewItemEdit">

        </div>
    </div>
</div>