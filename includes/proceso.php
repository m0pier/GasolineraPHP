<?php
include('funciones.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreCliente = $_POST["nombreCliente"];
    $tipoCombustible = $_POST["tipoCombustible"];
    $cantidad = floatval($_POST["cantidad"]);
    $montoEfectivo = $_POST["montoEfectivo"];
    $tipoCarga = $_POST["tipoCarga"];
    $precios = [
        "Diesel" => 1.75,
        "Super" => 4.37,
        "Extra" => 2.40
    ];
    if (empty($nombreCliente) || empty($tipoCombustible || empty($tipoCarga))) {

        echo '<script> Swal.fire({
            title: "Estan incompletos los campos?",
            text: "Asegurate de llenarlos bien!",
            icon: "question"
          }); </script>';
    } elseif ($tipoCarga == "galones") {
        $galones = 0;
        if (isset($_POST["cantidad"])) {
            // Calcular valor neto 
            $valorTotal = calcularValorNeto($tipoCombustible, $cantidad, $precios);
            echo '<script>Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Esta lista para facturar",
                showConfirmButton: false,
                timer: 1500
              });</script>';
        }
    } elseif ($tipoCarga == "efectivo") {
        $galones = 0;
        if (isset($_POST["montoEfectivo"])) { // Cambiado de montoEfectivo a cantidadEfectivo

            $galones = calcularEfectivo($tipoCombustible, $montoEfectivo, $precios); // Cambiado de CalcularEfectivo a calcularCantidadGalones
            $valorTotal = calcularValorNeto($tipoCombustible, $galones, $precios);
            echo '<script>Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Esta lista para facturar",
                showConfirmButton: false,
                timer: 1500
              });</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>factura</title>
</head>

<body>
    <div class="container">
        <h1><strong>FACTURA</strong></h1>
        <p><strong>Nombre del Cliente:</strong> <?php echo $nombreCliente; ?></p>
        <p><strong>Tipo de Combustible:</strong> <?php echo $tipoCombustible; ?></p>
        <p><strong>Cantidad en Galones ingresados:</strong> <?php echo $cantidad; ?></p>
        <p><strong>Cantidad en Galones por efectivo:</strong> <?php echo $galones; ?></p>
        <p><strong>Valor Total:</strong> $<?php echo number_format($valorTotal, 2); ?></p>
    </div>
</body>

</html>