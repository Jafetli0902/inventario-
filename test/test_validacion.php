<?php
// Incluye el archivo de funciones donde están definidas validarNombre() y validarCantidad().
require_once __DIR__ . '/../funciones.php';

// ==========================================
// 1. PRUEBAS DE validarNombre()
// ==========================================
echo "<h3>Pruebas de validarNombre()</h3>\n";

$casosNombre = [
    ["Teclado", true],     // Texto válido con caracteres alfabéticos
    ["", false],           // Cadena vacía (campo obligatorio sin datos)
    ["     ", false],      // Cadena compuesta únicamente por espacios en blanco
    ["Mouse", true],       // Otro texto válido estándar
];

// Contadores globales de resultados de las pruebas:
$aceptadas = 0;   // Pruebas que pasaron exitosamente (resultado obtenido == esperado)
$rechazadas = 0;  // Pruebas que fallaron (resultado obtenido != esperado)

foreach ($casosNombre as [$entrada, $esperado]) {
    $resultado = validarNombre($entrada);
    $textoEntrada = $entrada === "" ? "'' (vacío)" : (trim($entrada) === "" ? "'$entrada' (espacios)" : "'$entrada'");
    
    // Si el resultado de la función coincide con el esperado, la prueba se acepta (pasa)
    if ($resultado === $esperado) {
        $aceptadas++;
        echo "Prueba de nombre $textoEntrada pasó.<br>\n";
    } else {
        $rechazadas++;
        echo "Prueba de nombre $textoEntrada falló. Resultado esperado: " . ($esperado ? 'true' : 'false') . ", resultado obtenido: " . ($resultado ? 'true' : 'false') . "<br>\n";
    }
}

// ==========================================
// 2. PRUEBAS DE validarCantidad()
// ==========================================
echo "<br><h3>Pruebas de validarCantidad()</h3>\n";

$casosCantidad = [
    [10, true],         // Cantidad entera positiva válida
    [0, false],         // Cero (no válido)
    ["abc", false],     // Cadena no numérica
    [-5, false],        // Cantidad negativa
];

foreach ($casosCantidad as [$entrada, $esperado]) {
    $resultado = validarCantidad($entrada);
    $textoEntrada = is_string($entrada) ? "'$entrada'" : var_export($entrada, true);
    
    // Si el resultado de la función coincide con el esperado, la prueba se acepta (pasa)
    if ($resultado === $esperado) {
        $aceptadas++;
        echo "Prueba de cantidad $textoEntrada pasó.<br>\n";
    } else {
        $rechazadas++;
        echo "Prueba de cantidad $textoEntrada falló. Resultado esperado: " . ($esperado ? 'true' : 'false') . ", resultado obtenido: " . ($resultado ? 'true' : 'false') . "<br>\n";
    }
}

// ==========================================
// 3. RESUMEN GLOBAL CONJUNTO
// ==========================================
echo "<br>\n";
echo "<strong>Resumen de validaciones (Nombres y Cantidades):</strong><br>\n";
echo "Aceptadas: $aceptadas<br>\n";
echo "Rechazadas: $rechazadas<br>\n";
echo "Total de pruebas ejecutadas: " . ($aceptadas + $rechazadas) . "<br>\n";

if ($rechazadas > 0) {
    echo "<br><strong>Fallaron $rechazadas prueba(s).</strong><br>\n";
    exit(1);
} else {
    echo "<br><strong>¡Todas las pruebas pasaron con éxito!</strong><br>\n";
}