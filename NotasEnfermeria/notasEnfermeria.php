<?php
$arrayNotasEnfermeria = [
    "Nota 1" => "Contenido de la nota 1",
    "Nota 2" => "Contenido de la nota 2",
    "Nota 3" => "Contenido de la nota 3",
    "Nota 4" => "Contenido de la nota 4",
    "Nota 5" => "Contenido de la nota 5",
]

?>

<link rel="stylesheet" href="./NotasEnfermeria/css/notasEnfermeriaStyles.css">

<div id="menuContainer" class="menu-container">
    <!-- Botón principal -->
    <div id="mainButtonContainer" class="floating-button-container">
        <button id="mainButton" class="floating-button">
            👩‍⚕️
        </button>
        <p class="button-label">Notas de enfermería</p>
    </div>


    <div id="menuOptions" class="menu-options">
        <div class="option-menu">
            <span>Agregar notas</span>
            <button id="addNoteButton" class="menu-option-button">✅</button>
        </div>
        <div class="option-menu">
            <span>Ver notas</span>
            <button class="menu-option-button">👀</button>
        </div>
    </div>
</div>


<div id="noteSidebar" class="note-sidebar">
    <div class="note-header">
        <h3>Agregar Nota</h3>
        <button id="closeSidebarButton1" class="close-button">✖</button>
    </div>
    <div class="note-content">
        <textarea id="noteTextarea1" placeholder="Escribe tu nota aquí..."></textarea>
        <button id="saveNoteButton1" class="btn btn-secondary me-1 mb-1">Guardar Nota</button>
    </div>
</div>

<div id="showNoteSidebar" class="note-sidebar">
    <div class="note-header">
        <h3>Ver Notas</h3>
        <button id="closeSidebarButton2" class="close-button">✖</button>
    </div>
    <div class="note-content">
        <textarea id="noteTextarea2" placeholder="Escribe tu nota aquí..."></textarea>
        <button id="saveNoteButton2" class="btn btn-secondary me-1 mb-1">Guardar Nota</button>
    </div>
    <div class="accordion">
        <?php foreach ($arrayNotasEnfermeria as $nota => $contenido): ?>
            <div class="accordion-item">
                <div class="accordion-header">
                    <span class="accordion-title"><?php echo $nota; ?></span>
                    <div class="accordion-actions">
                        <button class="edit-button">✍🏻</button>
                        <button class="delete-button">❌</button>
                    </div>
                </div>
                <div class="accordion-body">
                    <p><?php echo $contenido; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>


<script src="./NotasEnfermeria/scripts/notasEnfermeriaScript.js"></script>