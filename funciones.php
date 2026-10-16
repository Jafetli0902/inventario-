<?php

/**
 * Valida el nombre de un producto.
 *
 * Comprueba que el campo no esté vacío (tras eliminar espacios en blanco)
 * y que no supere la longitud máxima permitida (100 caracteres).
 *
 * @param mixed $nombre
 * @return bool True si el nombre es válido, false en caso contrario.
 */
function validarNombre($nombre)
{
    if (!is_string($nombre)) {
        return false;
    }

    $nombreLimpio = trim($nombre);

    return $nombreLimpio !== '' && strlen($nombreLimpio) <= 100;
}

/**
 * Valida la cantidad de un producto.
 *
 * Comprueba que no esté vacía, que sea un valor numérico
 * y que sea un entero mayor o igual a 1 (según la regla del formulario).
 *
 * @param mixed $cantidad
 * @return bool True si la cantidad es válida, false en caso contrario.
 */
function validarCantidad($cantidad)
{
    if ($cantidad === '' || !is_numeric($cantidad)) {
        return false;
    }

    return (int) $cantidad >= 1;
}

