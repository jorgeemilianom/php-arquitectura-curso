<?php

function testLocal()
{
    $variableLocal = "Solo soy visible dentro de esta función";
    echo $variableLocal;
}

testLocal(); // Funciona y muestra el mensaje

echo $variableLocal; // Error, $variableLocal es inaccesible fuera de la función


$variableGlobal = "Hola Mundo!";

function test()
{
    global $variableGlobal;
    echo $variableGlobal; // Accede a la variable global
}

test(); // Imprime "Hola Mundo!"


function contador()
{
    static $cuenta = 0; // Inicializa solo una vez
    $cuenta++;
    echo $cuenta;
}

contador(); // Imprime 1
contador(); // Imprime 2
contador(); // Imprime 3



#Ámbito de Super Globals
$_SERVER;
$_SESSION;



# functions.php
return [
    'sumar' => function ($numl, $num2) {
        return $numl + $num2;
    },
    'sumarTodos' => function ($nums) {
        return array_reduce($nums, function ($prev, $val) {
            return $prev + $val;
        }, 0);
    }
];

# principal.php
$fn = require_once 'functions.php';


sumar(1,2);    // ERROR
$fn['sumar'](1,2); // SI. Todo ok



















