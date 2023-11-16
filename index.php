<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphics</title>
    <!-- Boxiocns CDN Link -->
    <link rel='stylesheet' href='resources/boxicons/css/boxicons.min.css'>
    <!-- Global CSS -->
    <link href="resources/css/styles_global.css" rel="stylesheet">
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="resources/bootstrap-5.3.2-dist/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap JS y dependencias Popper.js y jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
</head>
<body style="background-color: #F2F3F4;">
    <div class="container-fluid header" style="background-color: #F8F9F9;">
        <div class="row align-items-center" style="background-color: #EAEDED;">
            <div class="col-1 text-end">
                <i class='bx bx-cube-alt rounded shadow' style="font-size: 3.5em; background-color: #FFF;"></i>
            </div>
            <div class="col">
                <p class="my-0" style="font-size: 2em;">Cubo OLAP</p>
                <p class="my-0" style="font-size: 1.6em;">IMSS</p>
            </div>
        </div>
    </div>
    <section class="mt-4">
        <div class="container shadow" style="background-color: #EAEDED;">
            <div class="row pt-4 align-items-center" style="background-color: #FFFFFF;">
                <div class="col">
                    <span style="font-size: 1.4em;">Resumen por estado</span>
                    <hr>
                </div>
            </div>
            <div class="row" style="background-color: #FFFFFF;">
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <i class='bx bxs-church rounded-circle p-2' style="font-size: 3em; color: #FFFFFF; background-color: #3498DB;"></i>
                        </div>
                        <div class="col">
                            <span style="font-size: 1.4em;">Inscritos Guanajuato</span>
                            <p class="my-0" style="font-size: 3.8em;">34</p>
                            <p class="my-0" style="font-size: 0.8em;">Enfermedad popular</p>
                            <span>Diabetes</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <i class='bx bxs-factory rounded-circle p-2' style="font-size: 3em; color: #FFFFFF; background-color: #F39C12;"></i>
                        </div>
                        <div class="col">
                            <span style="font-size: 1.4em;">Inscritos Edo. México</span>
                            <p class="my-0" style="font-size: 3.8em;">34</p>
                            <p class="my-0" style="font-size: 0.8em;">Enfermedad popular</p>
                            <span>Sida</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <i class='bx bxs-city rounded-circle p-2' style="font-size: 3em; color: #FFFFFF; background-color: #A569BD;"></i>
                        </div>
                        <div class="col">
                            <span style="font-size: 1.4em;">Inscritos Michoacán</span>
                            <p class="my-0" style="font-size: 3.8em;">34</p>
                            <p class="my-0" style="font-size: 0.8em;">Enfermedad popular</p>
                            <span>Lupus</span>
                        </div>
                    </div>
                </div>
                <hr class="mt-4">
            </div>
            <div class="row pt-2 pb-4 justify-content-center" style="background-color: #FFFFFF;">
                <div class="col-3">
                    <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalAsegurados">Ver detalle de asegurados</button>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-4">
        <div class="container fluid shadow" style="background-color: #FFFFFF;">
            <div class="row pt-4">
                <div class="col">
                    <span style="font-size: 1.4em;">Graphics</span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="chart-group" style="padding: 0.2em; display: grid; grid-template-columns: 1fr 1fr; grid-gap: 0.3em;">
                    <div class="box">
                    <canvas id="chart_1"></canvas>
                </div>
                <div class="box">
                    <canvas id="chart_2"></canvas>
                </div>
                <br>
                </div>
                <div class="chart-group-2" style="padding: 0.2em; display: grid; grid-template-columns: 1fr 1fr; grid-gap: 0.3em;">
                    <div class="box">
                        <canvas id="chart_3"></canvas>
                    </div>
                    <div class="box">
                        <canvas id="chart_4"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalAsegurados" tabindex="-1" aria-labelledby="modalAseguradosLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalAseguradosLabel">Detalles de los asegurados</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive table-hover" id="tableAsegurados">
                        <tr>                            
                            <th>NSS</th>
                            <th>ASEGURADO</th>
                            <th>ENFERMEDAD</th>
                            <th>NSS</th>
                            <th>DEPENDIENTE</th>
                            <th>ENFERMEDAD</th>
                            <th>MUNICIPIO</th>
                            <th>ESTADO</th>
                        </tr>
                    <?php
                    require_once 'includes/Controllers/AseguradoController.php';
                    require_once 'includes/Models/Asegurado.php';
                    require_once 'includes/Views/AseguradoView.php';

                    // Crear instancias del modelo, vista y controlador
                    $aseguradoModel = new Asegurado();
                    $aseguradoView = new AseguradoView();
                    $aseguradoController = new AseguradoController($aseguradoModel, $aseguradoView);

                    // Llamar al método del controlador para mostrar la lista de asegurados
                    $aseguradoController->mostrarListaAsegurados();
                    ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Archivo que genera las gráficas -->
    <script src="includes/graphics.js"></script>

    <!-- Incluye jQuery y DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Script que muestra las tablas con DataTable -->
    <script>
        $(document).ready(function () {
            $('#tableAsegurados').DataTable({
                paging: true
            });
        });
    </script>
</body>
</html>