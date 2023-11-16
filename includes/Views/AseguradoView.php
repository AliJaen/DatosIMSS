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
}