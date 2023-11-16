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
}