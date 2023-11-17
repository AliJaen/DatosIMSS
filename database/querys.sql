SELECT ASE.NSS AS ASE_NSS, ASE.NOMBRE AS ASE_NOMBRE, ASE.ENFERMEDAD AS ASE_ENFERMEDAD,
       DEPE.NSS AS DEPE_NSS, DEPE.NOMBRE AS DEPE_NOMBRE, DEPE.ENFERMEDAD AS DEPE_ENFERMEDAD,
       MUN.NOMBRE AS MUN_NOMBRE, EST.NOMBRE AS EST_NOMBRE
FROM ASEGURADO AS ASE
LEFT JOIN DEPENDIENTE AS DEPE ON ASE.NSS = DEPE.ASE_NSS
LEFT JOIN MUNICIPIO AS MUN ON MUN.CLAVE = ASE.MUNCLAVE
LEFT JOIN ESTADO AS EST ON EST.CLAVE = ASE.ESTCLAVE;


-- RESULTADO
-- +-------------+----------------------------+----------------+-------------+-----------------------------+-----------------+-------------------------------+------------------+
-- | ASE_NSS     | ASE_NOMBRE                 | ASE_ENFERMEDAD | DEPE_NSS    | DEPE_NOMBRE                 | DEPE_ENFERMEDAD | MUN_NOMBRE                    | EST_NOMBRE       |
-- +-------------+----------------------------+----------------+-------------+-----------------------------+-----------------+-------------------------------+------------------+
-- | 01234446780 | Andrea Pérez Rodríguez     | diabetes       | 01244526780 | Javier Martínez López       | diabetes        | Ecuandureo                    | MICHOACÁN        |
-- | 01239460780 | Marta Martínez García      | gastritis      | 01444526780 | Andrea Pérez Rodríguez      | diabetes        | Cuitzeo                       | MICHOACÁN        |
-- | 01263446789 | Roberto Sánchez Rodríguez  | gastritis      | 01244426780 | Marta Pérez García          | gastritis       | Arteaga                       | MICHOACÁN        |
-- | 06013498275 | Mateo Mendoza López        | Gastritis      | NULL        | NULL                        | NULL            | SANTA CRUZ DE JUVENTINO ROSAS | GUANAJUATO       |
-- | 06015629784 | Sofía Soto Rodríguez       | Cirrosis       | NULL        | NULL                        | NULL            | SAN FELIPE                    | GUANAJUATO       |
-- | 06021379584 | Camila González López      | Gastritis      | NULL        | NULL                        | NULL            | OCAMPO                        | GUANAJUATO       |
-- | 06021834795 | Camila Morales Pérez       | Cirrosis       | NULL        | NULL                        | NULL            | SANTA CATARINA                | GUANAJUATO       |

SELECT ENFERMEDAD, SUM(CANTIDAD) AS TOTAL_CANTIDAD
FROM (
    SELECT ASE.ENFERMEDAD, COUNT(*) AS CANTIDAD 
    FROM ASEGURADO AS ASE WHERE ESTCLAVE = 06
    GROUP BY ASE.ENFERMEDAD

    UNION ALL

    SELECT DEP.ENFERMEDAD, COUNT(*) AS CANTIDAD 
    FROM DEPENDIENTE AS DEP
    GROUP BY DEP.ENFERMEDAD
) AS EnfermedadesTotales
GROUP BY ENFERMEDAD
ORDER BY TOTAL_CANTIDAD DESC
LIMIT 1;





