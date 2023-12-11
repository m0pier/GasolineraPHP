<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Gasolinera</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <form method="post" class="formulario">
                    <img src="images/primax.png" class="img-fluid rounded mx-auto d-block">
                    <div class="mb-3">
                        <label for="nombreCliente" class="form-label">Nombre del Cliente</label>
                        <input type="text" class="form-control" maxlength="20" id="nombreCliente" name="nombreCliente">
                    </div>
                    <div class="mb-3">
                        <label for="tipoCombustible" class="form-label">Tipo de Combustible</label>
                        <select class="form-control" id="tipoCombustible" name="tipoCombustible">
                            <option value="Extra">Extra</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Super">Super</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipoCarga" class="form-label">Tipo de Carga</label>
                        <select class="form-control" id="tipoCarga" name="tipoCarga">
                            <option value="galones">Por Galones</option>
                            <option value="efectivo">En Efectivo</option>
                        </select>
                    </div>
                    <div class="form-group" id="campoGalones" style="display: none;">
                        <label for="cantidad" class="form-label">Cantidad en Galones:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad">
                    </div>
                    <div class="form-group" id="campoEfectivo" style="display: none;">
                        <label for="montoEfectivo" class="form-label">Monto en Efectivo:</label>
                        <input type="number" class="form-control" id="montoEfectivo" name="montoEfectivo">
                    </div>
                    <div class="div">
                        <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                        <button type="button" id="btnFactura" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Factura</button>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Factura</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
                                        include("includes/proceso.php");
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#tipoCarga").change(function(event) {
                event.preventDefault();
                var seleccion = $(this).val();
                if (seleccion === "galones") {
                    $("#campoGalones").show();
                    $("#campoEfectivo").hide();
                } else {
                    $("#campoGalones").hide();
                    $("#campoEfectivo").show();
                }
            });
        });
    </script>
</body>

</html>