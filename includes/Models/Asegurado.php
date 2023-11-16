<?php

require_once 'C:/xampp/htdocs/CuboIMSS/database/db_connection.php';

class Asegurado {

    public function detalleAsegurados() {
        // Instancia de la clase DatabaseConnection
        $dbConnection = new DatabaseConnection();

        // Crea la conexión
        $conn = $dbConnection->getConnection();

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Realizar la consulta
        $sql = "SELECT ASE.NSS AS ASE_NSS, ASE.NOMBRE AS ASE_NOMBRE, ASE.ENFERMEDAD AS ASE_ENFERMEDAD,
                    DEPE.NSS AS DEPE_NSS, DEPE.NOMBRE AS DEPE_NOMBRE, DEPE.ENFERMEDAD AS DEPE_ENFERMEDAD,
                    MUN.NOMBRE AS MUN_NOMBRE, EST.NOMBRE AS EST_NOMBRE
                FROM ASEGURADO AS ASE
                    LEFT JOIN DEPENDIENTE AS DEPE ON ASE.NSS = DEPE.ASE_NSS
                    LEFT JOIN MUNICIPIO AS MUN ON MUN.CLAVE = ASE.MUNCLAVE
                    LEFT JOIN ESTADO AS EST ON EST.CLAVE = ASE.ESTCLAVE WHERE DEPE.ASE_NSS IS NOT NULL";

        $result = $conn->query($sql);

        // Verifica si la consulta fue exitosa
        if ($result) {
            $asegurados = array();

            // Almacenar los resultados en el array
            while ($row = $result->fetch_assoc()) {
                $asegurados[] = $row;
            }

            // En caso de error, commentar esto
            // Cierrar la conexión.
            $conn->close();

            return $asegurados;
        } else {
            die("Error en la consulta: " . $conn->error);
        }
    }
}