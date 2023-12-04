<?php

require_once '/xampp/htdocs/DatosIMSS/database/db_connection.php';

class Asegurado {
    
    // Agrega una propiedad para almacenar la conexión
    private $conn;
    
    public function __construct() {
        // LLamar a la función de conexón al crear una instacia de la clase
        $this->conn = $this->getDatabaseConnection();
    }
    
    // Función para obtener la conexión
    private function getDatabaseConnection() {
        $dbConnection = new DatabaseConnection();
        return $dbConnection->getConnection();
    }

    public function detalleAsegurados() {
        // Realizar la consulta
        $sql = "SELECT ASE.NSS AS ASE_NSS, ASE.NOMBRE AS ASE_NOMBRE, ASE.ENFERMEDAD AS ASE_ENFERMEDAD,
                    DEPE.NSS AS DEPE_NSS, DEPE.NOMBRE AS DEPE_NOMBRE, DEPE.ENFERMEDAD AS DEPE_ENFERMEDAD,
                    MUN.NOMBRE AS MUN_NOMBRE, EST.NOMBRE AS EST_NOMBRE
                FROM ASEGURADO AS ASE
                    LEFT JOIN DEPENDIENTE AS DEPE ON ASE.NSS = DEPE.ASE_NSS
                    LEFT JOIN MUNICIPIO AS MUN ON MUN.CLAVE = ASE.MUNCLAVE
                    LEFT JOIN ESTADO AS EST ON EST.CLAVE = ASE.ESTCLAVE WHERE DEPE.ASE_NSS IS NOT NULL";

        $result = $this->conn->query($sql);

        // Verifica si la consulta fue exitosa
        if ($result) {
            $asegurados = array();

            // Almacenar los resultados en el array
            while ($row = $result->fetch_assoc()) {
                $asegurados[] = $row;
            }

            // En caso de error, commentar esto
            // Cierrar la conexión.
            $this->conn->close();

            return $asegurados;
        } else {
            die("Error en la consulta: " . $this->conn->error);
        }
    }

    public function totalAsegurados() {
        // Consulta
        $sql = "SELECT
                    SUM(CASE WHEN ESTCLAVE = 06 THEN 1 ELSE 0 END) AS ASEGURADOS_GUANAJUATO,
                    SUM(CASE WHEN ESTCLAVE = 016 THEN 1 ELSE 0 END) AS ASEGURADOS_EDOMEX,
                    SUM(CASE WHEN ESTCLAVE = 015 THEN 1 ELSE 0 END) AS ASEGURADOS_MICH
                FROM (
                    SELECT NSS, ESTCLAVE FROM ASEGURADO
                    UNION ALL
                    SELECT DEP.NSS, ASE.ESTCLAVE
                    FROM DEPENDIENTE AS DEP
                    LEFT JOIN ASEGURADO AS ASE ON DEP.ASE_NSS = ASE.NSS 
                ) AS TOTAL_ASEGURADOS";

        $result = $this->conn->query($sql);

        // Verifica si la consulta fue exitosa
        if ($result) {
            $totalAseguradosEdoMex = array();

            // Almacenar los resultados en el array
            while ($row = $result->fetch_assoc()) {
                $totalAseguradosEdoMex[] = $row;
            }

            // Cerrar la conexión
            $this->conn->close();

            return $totalAseguradosEdoMex;
        } else {
            die("Error en la consulta: " . $this->conn->error);
        }
    }

    public function enfermedadPopular($edo) {
        // Consulta
        $sql = "SELECT ENFERMEDAD, SUM(CANTIDAD) AS TOTAL_CANTIDAD
                FROM (
                    SELECT ASE.ENFERMEDAD, COUNT(*) AS CANTIDAD 
                    FROM ASEGURADO AS ASE WHERE ESTCLAVE = ?
                    GROUP BY ASE.ENFERMEDAD
                
                    UNION ALL
                
                    SELECT DEP.ENFERMEDAD, COUNT(*) AS CANTIDAD
                        FROM DEPENDIENTE AS DEP
                    INNER JOIN ASEGURADO AS ASE ON DEP.ASE_NSS = ASE.NSS
                    WHERE ASE.ESTCLAVE = ?
                    GROUP BY DEP.ENFERMEDAD
                ) AS EnfermedadesTotales
                GROUP BY ENFERMEDAD
                ORDER BY TOTAL_CANTIDAD DESC
                LIMIT 1;";

        // Preparar la consulta
        $selectByEdo = $this->conn->prepare($sql);

        // Vincular los valores proporcionados
        $selectByEdo->bind_param("ss", $edo, $edo);
        
        // Ejecutar la consulta
        if ($selectByEdo->execute()) {
            // Almacenar los resultados en el lado del cliente
            $selectByEdo->store_result();
            
            $enfermedadPop = array();

            // Vincular los resultados
            $selectByEdo->bind_result($enfermedad, $total_cantidad);

            // Almacenar los resultados en el array
            while ($selectByEdo->fetch()) {
                $enfermedadPop[] = array('ENFERMEDAD' => $enfermedad, 'TOTAL_CANTIDAD' => $total_cantidad);
            }

            $selectByEdo->close();

            // Cerrar la conexión
            $this->conn->close();

            return $enfermedadPop;
        } else {
            echo ("Error al consultar: " . $this->conn->error . " (" . $this->conn->errno . ")");
        }

    }
}