<?php

require_once '/xampp/htdocs/CuboIMSS/includes/Models/Asegurado.php';
require_once '/xampp/htdocs/CuboIMSS/includes/Views/AseguradoView.php';

class AseguradoController {
    
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function mostrarListaAsegurados() {
        // Obtener datos del modelo
        $asegurados = $this->model->detalleAsegurados();

        // Mostrar los datos en al vista
        $this->view->mostrarDetalleAsegurados($asegurados);
    }

    public function mostrarTotal($edo) {
        // Obtener datos del modelo
        $total = $this->model->totalAsegurados();

        // Obtener los datos en la vista
        $this->view->mostrarTotalAsegurados($total, $edo);
    }

    public function mostrarEnfPop($edo) {
        // Obtenr los datos del model
        $enfermedad = $this->model->enfermedadPopular($edo);

        // Mostrar los datos en la vista
        $this->view->mostrarEnfermedadPop($enfermedad);
    }
}