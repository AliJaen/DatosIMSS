<?php
class AseguradoView {
    public function mostrarDetalleAsegurados($asegurados) {
        foreach ($asegurados as $asegurado) {
            echo "<tr>";
                echo "<td>" . $asegurado['ASE_NSS'] . "</td>";
                echo "<td>" . $asegurado['ASE_NOMBRE'] . "</td>";
                echo "<td>" . $asegurado['ASE_ENFERMEDAD'] . "</td>";
                echo "<td>" . $asegurado['DEPE_NSS'] . "</td>";
                echo "<td>" . $asegurado['DEPE_NOMBRE'] . "</td>";
                echo "<td>" . $asegurado['DEPE_ENFERMEDAD'] . "</td>";
                echo "<td>" . $asegurado['MUN_NOMBRE'] . "</td>";
                echo "<td>" . $asegurado['EST_NOMBRE'] . "</td>";
            echo "</tr>";
        }
    }

    public function mostrarTotalAsegurados($totalAsegEdoMex, $edo) {
        foreach ($totalAsegEdoMex as $total) {
            $totalGuan = $total['ASEGURADOS_GUANAJUATO'];
            $totalEdoMex = $total['ASEGURADOS_EDOMEX'];
            $totalMich = $total['ASEGURADOS_MICH'];
        }

        switch ($edo) {
            case 1:
                echo $totalGuan;
            break;
            case 2:
                echo $totalEdoMex;
            break;
            case 3:
                echo $totalMich;
            break;
        }
    }

    public function mostrarEnfermedadPop($enfermedades) {
        foreach ($enfermedades as $enfermedad) {
            echo $enfermedad['ENFERMEDAD'];
        }
    }
}