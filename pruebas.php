<?php

require_once __DIR__ . '/Usuario.php';
require_once __DIR__ . '/Solicitante.php';
require_once __DIR__ . '/Tecnico.php';
require_once __DIR__ . '/Administrador.php';

echo "===== PRUEBAS DEL SISTEMA =====" . PHP_EOL . PHP_EOL;

// 1. Solicitante
echo "--- Solicitante ---" . PHP_EOL;
$solicitante = new Solicitante("Laura Méndez", "laura@utu.edu.uy", "Docencia");
$solicitante->mostrarDatos();
$solicitante->mostrarSector();
echo PHP_EOL;

// 2. Tecnico
echo "--- Técnico ---" . PHP_EOL;
$tecnico = new Tecnico("Juan Pérez", "juan@utu.edu.uy", "Hardware");
$tecnico->mostrarDatos();
$tecnico->mostrarEspecialidad();
echo PHP_EOL;

// 3. Administrador
echo "--- Administrador ---" . PHP_EOL;
$administrador = new Administrador("Ana Rodríguez", "ana@utu.edu.uy", "Coordinador");
$administrador->mostrarDatos();
$administrador->mostrarNivel();
echo PHP_EOL;

// 4. Prueba de error: nombre vacío
echo "--- Prueba: nombre vacío ---" . PHP_EOL;
try {
    $malo1 = new Solicitante("", "test@utu.edu.uy", "Administración");
    $malo1->mostrarDatos();
} catch (InvalidArgumentException $e) {
    echo "Error capturado: " . $e->getMessage() . PHP_EOL;
}
echo PHP_EOL;

// 5. Prueba de error: email inválido
echo "--- Prueba: email incorrecto ---" . PHP_EOL;
try {
    $malo2 = new Tecnico("Pedro Gómez", "pedro-arroba-utu", "Redes");
    $malo2->mostrarDatos();
} catch (InvalidArgumentException $e) {
    echo "Error capturado: " . $e->getMessage() . PHP_EOL;
}
echo PHP_EOL;

// 6. Los atributos no se pueden modificar desde afuera.
echo "--- Prueba: acceso directo a atributos ---" . PHP_EOL;
try {
    $tecnico->nombre = "Nombre Hackeado";
} catch (Error $e) {
    echo "Error capturado: " . $e->getMessage() . PHP_EOL;
}
echo "El nombre sigue siendo: " . $tecnico->getNombre() . PHP_EOL;
