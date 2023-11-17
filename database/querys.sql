--  Detalle de asegurados que tienen dependientes
SELECT ASE.NSS AS ASE_NSS, ASE.NOMBRE AS ASE_NOMBRE, ASE.ENFERMEDAD AS ASE_ENFERMEDAD,
       DEPE.NSS AS DEPE_NSS, DEPE.NOMBRE AS DEPE_NOMBRE, DEPE.ENFERMEDAD AS DEPE_ENFERMEDAD,
       MUN.NOMBRE AS MUN_NOMBRE, EST.NOMBRE AS EST_NOMBRE
FROM ASEGURADO AS ASE
LEFT JOIN DEPENDIENTE AS DEPE ON ASE.NSS = DEPE.ASE_NSS
LEFT JOIN MUNICIPIO AS MUN ON MUN.CLAVE = ASE.MUNCLAVE
LEFT JOIN ESTADO AS EST ON EST.CLAVE = ASE.ESTCLAVE WHERE DEPE.ASE_NSS IS NOT NULL;


-- RESULTADO
-- +-------------+----------------------------+----------------+-------------+-----------------------------+-----------------+-------------------------------+------------------+
-- | ASE_NSS     | ASE_NOMBRE                 | ASE_ENFERMEDAD | DEPE_NSS    | DEPE_NOMBRE                 | DEPE_ENFERMEDAD | MUN_NOMBRE                    | EST_NOMBRE       |
-- +-------------+----------------------------+----------------+-------------+-----------------------------+-----------------+-------------------------------+------------------+
-- | 01234446780 | Andrea Pérez Rodríguez     | diabetes       | 01244526780 | Javier Martínez López       | diabetes        | Ecuandureo                    | MICHOACÁN        |
-- | 01239460780 | Marta Martínez García      | gastritis      | 01444526780 | Andrea Pérez Rodríguez      | diabetes        | Cuitzeo                       | MICHOACÁN        |
-- | 01263446789 | Roberto Sánchez Rodríguez  | gastritis      | 01244426780 | Marta Pérez García          | gastritis       | Arteaga                       | MICHOACÁN        |

-- Enfermedad popular por estado
WITH EnfermedadesTotalesCTE AS (
    SELECT 
        ENFERMEDAD, 
        ESTCLAVE,
        COUNT(*) AS CANTIDAD,
        ROW_NUMBER() OVER (PARTITION BY ESTCLAVE ORDER BY COUNT(*) DESC) AS RowNum
    FROM 
        (
            SELECT ASE.ENFERMEDAD, ASE.ESTCLAVE
            FROM ASEGURADO AS ASE 
            WHERE ESTCLAVE IN (006, 015, 016)

            UNION ALL

            SELECT DEP.ENFERMEDAD, ASE.ESTCLAVE
            FROM DEPENDIENTE AS DEP
            INNER JOIN ASEGURADO AS ASE ON DEP.ASE_NSS = ASE.NSS
            WHERE ASE.ESTCLAVE IN (006, 015, 016)
        ) AS EnfermedadesTotales
    GROUP BY ENFERMEDAD, ESTCLAVE
)
SELECT 
    ENFERMEDAD, 
    ESTCLAVE, 
    CANTIDAD AS TOTAL_CANTIDAD
FROM EnfermedadesTotalesCTE
WHERE RowNum = 1;


-- RESULTADO
-- +--------------+----------+----------------+
-- | ENFERMEDAD   | ESTCLAVE | TOTAL_CANTIDAD |
-- +--------------+----------+----------------+
-- | Cirrosis     | 06       |             81 |
-- | Hipertensión | 016      |             63 |
-- | sida         | 015      |             76 |
-- +--------------+----------+----------------+

----------------------------------------------------------------------------
----------------------------------------------------------------------------
-- CASO 2 
-- Enfermedad popular por estado
SELECT ENFERMEDAD, SUM(CANTIDAD) AS TOTAL_CANTIDAD
FROM (
    SELECT ASE.ENFERMEDAD, COUNT(*) AS CANTIDAD 
    FROM ASEGURADO AS ASE WHERE ESTCLAVE = 015
    GROUP BY ASE.ENFERMEDAD

    UNION ALL

    SELECT DEP.ENFERMEDAD, COUNT(*) AS CANTIDAD
        FROM DEPENDIENTE AS DEP
    INNER JOIN ASEGURADO AS ASE ON DEP.ASE_NSS = ASE.NSS
    WHERE ASE.ESTCLAVE = 015
    GROUP BY DEP.ENFERMEDAD
) AS EnfermedadesTotales
GROUP BY ENFERMEDAD
ORDER BY TOTAL_CANTIDAD DESC
LIMIT 1;

-- RESULTADO
-- +------------+----------------+
-- | ENFERMEDAD | TOTAL_CANTIDAD |
-- +------------+----------------+
-- | sida       |             76 |
-- +------------+----------------+

----------------------------------------------------------------------------
----------------------------------------------------------------------------

-- Enfermedad popular del total de asegurados
SELECT ENFERMEDAD, SUM(CANTIDAD) AS TOTAL_CANTIDAD
FROM (
    SELECT ASE.ENFERMEDAD, COUNT(*) AS CANTIDAD 
    FROM ASEGURADO AS ASE
    GROUP BY ASE.ENFERMEDAD

    UNION ALL

    SELECT DEP.ENFERMEDAD, COUNT(*) AS CANTIDAD
    FROM DEPENDIENTE AS DEP
    GROUP BY DEP.ENFERMEDAD
) AS EnfermedadesTotales
GROUP BY ENFERMEDAD
ORDER BY TOTAL_CANTIDAD DESC
LIMIT 1;

-- Cantidad de asegurados y dependientes por estado
SELECT
    SUM(CASE WHEN ESTCLAVE = 06 THEN 1 ELSE 0 END) AS ASEGURADOS_GUANAJUATO,
    SUM(CASE WHEN ESTCLAVE = 016 THEN 1 ELSE 0 END) AS ASEGURADOS_EDOMEX,
    SUM(CASE WHEN ESTCLAVE = 015 THEN 1 ELSE 0 END) AS ASEGURADOS_MICH
FROM (
    SELECT NSS, ESTCLAVE FROM ASEGURADO
    UNION ALL
    SELECT DEP.NSS, ASE.ESTCLAVE
    FROM DEPENDIENTE AS DEP
    LEFT JOIN ASEGURADO AS ASE ON DEP.ASE_NSS = ASE.NSS 
) AS TOTAL_ASEGURADOS;


-- RESULTADO
-- +-----------------------+-------------------+-----------------+
-- | ASEGURADOS_GUANAJUATO | ASEGURADOS_EDOMEX | ASEGURADOS_MICH |
-- +-----------------------+-------------------+-----------------+
-- |                   294 |               292 |             274 |
-- +-----------------------+-------------------+-----------------+
