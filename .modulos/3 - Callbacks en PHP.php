<?php

/*
La palabra “Callback” hace referencia a una estrategia de resolución de
problemas en código, que consiste en pasar una función como argumento a
otra función.

*/


$sumar = function($a, $b) {
    return $a + $b;
};
$restar = function ($nl, $n2) {
    return $nl - $n2;
};


function calcular($a, $b, $funcionQueUsaEstosValores) {
    return $funcionQueUsaEstosValores($a, $b);
}

calcular(1, 2,$sumar);  // 3
calcular(10, 2,$retar);  // 8