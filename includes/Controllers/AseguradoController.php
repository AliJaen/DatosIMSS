<?php

require_once '/xampp/htdocs/DatosIMSS/includes/Models/Asegurado.php';
require_once '/xampp/htdocs/DatosIMSS/includes/Views/AseguradoView.php';

class AseguradoController {
    
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;


        // Manejo de la acción
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'obtenerTotalEnfermedades':
                    // Lógica para obtener total de enfermedades
                    $this->obtenerTotalEnfermedades();
                    break;

                // Otros casos según sea necesario
            }
        }

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


    public function obtenerTotalEnfermedades(){
        // Obtener los datos del modelo
        $totalEnfermedades = $this->model->totalEnfermedades();
    
        // Convertir los datos a formato de cadena
        $dataString = '[';
        foreach ($totalEnfermedades as $row) {
            $dataString .= '{';
            foreach ($row as $key => $value) {
                $dataString .= "'$key': '$value', ";
            }
            $dataString = rtrim($dataString, ', ') . '}, ';
        }
        $dataString = rtrim($dataString, ', ') . ']';
    
        // Construir el script JavaScript con los datos
        $script = 'var totalEnfermedades = ' . $dataString . ';';
    
        // Imprimir el script
        echo '<script>' . $script . '</script>';
    }
    
    
    
    
}