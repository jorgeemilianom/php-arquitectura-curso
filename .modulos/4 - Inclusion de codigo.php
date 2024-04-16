<?php
/* 
Regla:

include             inluye un archivo. Si no puede, tira un warning pero sigue la ejecución
include_once        inluye un archivo. Si ya está incluido, no lo incluye
require             Requiere un archivo. Si no puede, larga una excepción
require_once        Requiere un archivo. Si ya fue requerido, no lo requiere.



*/

?>


<!-- header.php -->


================================================================
index.php
<?php
include 'header.php';
?>
<p>Este es el contenido principal de la página.</p>
</body>
</html>

================================================================

<!-- functions.php -->
<?php
function sayHello() {
    echo "Hola Mundo!";
}
function sayHello1() {
    echo "Hola Mundo!";
}
function sayHello2() {
    echo "Hola Mundo!";
}
?>

================================================================
<!-- pages.php -->
<?php
include_once 'functions.php';
?>


<!-- index.php -->
<?
include_once 'pages.php';
include_once 'functions.php';

sayHello(); // Imprime "Hola Mundo!"
