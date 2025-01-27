<?
include "../menu.php";
include "../header.php";
?>

<div class="componete mt-5">
    <div class="content">
        <div class="container-small">
            <nav class="mb-3 mt-5" aria-label="breadcrumb">
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="Dashboard">Inicio</a></li>
                    <li class="breadcrumb-item active" onclick="location.reload()">Pacientes</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-5">
            <div class="row">
                <!-- Panel izquierdo -->
                <h1 class="text-center mb-4">Creador de exámenes</h1>
                <div class="col-md-4">

                    <div class="card">
                        <div class="card-body">
                            <div class="form-builder">
                                <h2 class="mb-3">Agregar Campo</h2>
                                <select id="fieldType" class="form-select mb-2">
                                    <option value="text">Texto</option>
                                    <option value="number">Numérico</option>
                                    <option value="select">Lista</option>
                                </select>
                                <input type="text" id="fieldLabel" class="form-control mb-2" placeholder="Etiqueta del campo" />

                                <div id="selectOptionsContainer" class="mb-2" style="display: none;">
                                    <input type="text" id="selectOption" class="form-control mb-2" placeholder="Opción para el select" />
                                    <button id="addSelectOption" class="btn btn-secondary btn-sm mb-2">Agregar opción</button>
                                    <ul id="selectOptionsList" class="list-unstyled"></ul>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" id="isRequired" class="form-check-input" />
                                    <label for="isRequired" class="form-check-label">Requerido</label>
                                </div>
                                <button id="addField" class="btn btn-primary">Agregar Campo</button>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- Panel derecho -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h2>Vista Previa del Formulario</h2>
                            <div id="formPreview" class="form-preview">
                                <!-- Aquí se renderizan los campos -->
                                <div id="resizeHandle" style="width: 10px; height: 10px; background-color: #ccc; position: absolute; bottom: 0; right: 0; cursor: se-resize;"></div>
                            </div>
                            <button id="saveForm" class="btn btn-primary mt-3">Guardar Formulario</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>





<script>
    const fieldTypeSelect = document.getElementById('fieldType');
    const fieldLabelInput = document.getElementById('fieldLabel');
    const isRequiredCheckbox = document.getElementById('isRequired');
    const addFieldButton = document.getElementById('addField');
    const formPreview = document.getElementById('formPreview');
    const saveFormButton = document.getElementById('saveForm');
    const selectOptionsContainer = document.getElementById('selectOptionsContainer');
    const selectOptionInput = document.getElementById('selectOption');
    const addSelectOptionButton = document.getElementById('addSelectOption');
    const selectOptionsList = document.getElementById('selectOptionsList');
    const checkboxLabelContainer = document.getElementById('checkboxLabelContainer');

    let formStructure = [];
    let selectOptions = [];

    fieldTypeSelect.addEventListener('change', () => {
        const fieldType = fieldTypeSelect.value;

        // Mostrar u ocultar los campos adicionales dependiendo del tipo de campo
        if (fieldType === 'select') {
            selectOptionsContainer.style.display = 'block';
            checkboxLabelContainer.style.display = 'none';
        } else if (fieldType === 'checkbox') {
            checkboxLabelContainer.style.display = 'block';
            selectOptionsContainer.style.display = 'none';
        } else {
            selectOptionsContainer.style.display = 'none';
            checkboxLabelContainer.style.display = 'none';
        }
    });

    addSelectOptionButton.addEventListener('click', () => {
        const optionText = selectOptionInput.value.trim();
        if (optionText) {
            selectOptions.push(optionText);
            renderSelectOptions();
            selectOptionInput.value = ''; // Limpiar el campo de opción
        }
    });

    function renderSelectOptions() {
        selectOptionsList.innerHTML = '';
        selectOptions.forEach(option => {
            const li = document.createElement('li');
            li.textContent = option;
            selectOptionsList.appendChild(li);
        });
    }

    addFieldButton.addEventListener('click', () => {
        const fieldType = fieldTypeSelect.value;
        const fieldLabel = fieldLabelInput.value.trim();
        const isRequired = isRequiredCheckbox.checked;

        if (!fieldLabel) {
            alert('Por favor, ingresa una etiqueta para el campo.');
            return;
        }

        const field = {
            type: fieldType,
            label: fieldLabel,
            required: isRequired,
            options: selectOptions // Solo se usará para el select
        };
        formStructure.push(field);

        // Limpiar opciones del select si es necesario
        selectOptions = [];

        // Limpiar la vista previa y las opciones para el siguiente campo
        selectOptionInput.value = '';
        selectOptionsList.innerHTML = '';

        renderForm();
    });

    function renderForm() {
        formPreview.innerHTML = '';

        formStructure.forEach((field, index) => {
            const fieldElement = document.createElement('div');
            fieldElement.className = 'field';
            fieldElement.draggable = true;
            fieldElement.dataset.index = index;

            fieldElement.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text/plain', index);
            });

            fieldElement.addEventListener('dragover', (e) => {
                e.preventDefault();
                fieldElement.classList.add('drag-over');
            });

            fieldElement.addEventListener('dragleave', () => {
                fieldElement.classList.remove('drag-over');
            });

            fieldElement.addEventListener('drop', (e) => {
                e.preventDefault();
                const draggedIndex = e.dataTransfer.getData('text/plain');
                const targetIndex = fieldElement.dataset.index;

                const [draggedField] = formStructure.splice(draggedIndex, 1);
                formStructure.splice(targetIndex, 0, draggedField);
                renderForm();
            });

            // Renderizar según el tipo de campo
            if (field.type === 'select') {
                const selectElement = document.createElement('select');
                selectElement.className = 'form-select';
                field.options.forEach(optionText => {
                    const option = document.createElement('option');
                    option.textContent = optionText;
                    selectElement.appendChild(option);
                });
                fieldElement.appendChild(selectElement);
            } else if (field.type === 'checkbox') {
                const checkboxElement = document.createElement('input');
                checkboxElement.type = 'checkbox';
                checkboxElement.className = 'form-check-input';
                const label = document.createElement('label');
                label.textContent = field.label;
                fieldElement.appendChild(checkboxElement);
                fieldElement.appendChild(label);
            } else {
                const inputElement = document.createElement('input');
                inputElement.type = field.type;
                inputElement.className = 'form-control';
                inputElement.placeholder = field.label;
                if (field.required) {
                    inputElement.required = true;
                }
                fieldElement.appendChild(inputElement);
            }

            // Agregar la etiqueta del campo
            const labelElement = document.createElement('label');
            labelElement.innerText = `${field.label} ${field.required ? '*' : ''}`;
            fieldElement.prepend(labelElement);

            formPreview.appendChild(fieldElement);
        });
    }

    saveFormButton.addEventListener('click', () => {
        const formData = JSON.stringify(formStructure, null, 2);
        const blob = new Blob([formData], {
            type: 'application/json'
        });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'formulario.json';
        link.click();
    });
</script>
<style>
    .field {
        padding: 10px;
        border: 1px solid #ccc;
        margin: 5px;
        border-radius: 5px;
        background-color: #f9f9f9;
        cursor: grab;
    }

    .field.drag-over {
        border: 2px dashed #0d6efd;
        background-color: #e9f5ff;
    }

    .row-container {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
    }

    #resizable {
        position: relative;
        width: 300px;
        height: 400px;
        border: 2px solid #ccc;
        overflow: hidden;
    }

    #resizeHandle {
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: #ccc;
        bottom: 0;
        right: 0;
        cursor: se-resize;
    }
</style>

<?php
include "../footer.php";
?>