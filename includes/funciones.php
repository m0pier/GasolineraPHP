<?php
function calcularValorNeto($tipoCombustible, $cantidad, $precios)
{
    return $cantidad * $precios[$tipoCombustible];
}
function CalcularEfectivo($tipoCombustible, $montoEfectivo, $precios)
{
    $galones = 0;

    $galones = $montoEfectivo / ($precios[$tipoCombustible]);

    return $galones;
}

