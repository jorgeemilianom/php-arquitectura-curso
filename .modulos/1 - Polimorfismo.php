<?php

/**     TEORIA
 * El polimorfismo es un principio de la programación orientada a objetos (POO) que permite a los objetos de diferentes clases ser tratados como objetos de 
 * una clase común. Esto es especialmente útil cuando queremos implementar métodos que deberían funcionar de manera diferente según la clase del objeto con 
 * el que se trabaja, sin necesidad de conocer exactamente de qué clase es el objeto. En PHP, el polimorfismo se puede implementar principalmente de dos maneras: 
 * a través de interfaces y a través de clases abstractas.
 */

 interface Forma
{
    public function calcularArea();
}

class Circulo implements Forma
{
    protected $radio;

    public function __construct($radio)
    {
        $this->radio = $radio;
    }

    public function calcularArea()
    {
        return pi() * pow($this->radio, 2);
    }
}

class Cuadrado implements Forma
{
    protected $lado;

    public function __construct($lado)
    {
        $this->lado = $lado;
    }

    public function calcularArea()
    {
        return pow($this->lado, 2);
    }
}

function imprimirArea(Forma $forma)
{
    echo "El área es: " . $forma->calcularArea() . "\n";
}


$circulo = new Circulo(5);
$cuadrado = new Cuadrado(5);

imprimirArea($circulo); // El área es: 78.539816339745
imprimirArea($cuadrado); // El área es: 25


abstract class Animal
{
    private $sonidoQueEmite;
    public function hacerSonido()
    {
        $this->sonidoQueEmite;
    }

    public static function saltar($altura)
    {
        $_COOKIE['dato'] = $altura * 9.8;
    }
}

class Perro extends Animal
{
    public function __construct(string $sonidoQueEmite) {
        $this->sonidoQueEmite = $sonidoQueEmite;
    }
}

class Gato extends Animal
{
    public function __construct(string $sonidoQueEmite) {
        $this->sonidoQueEmite = $sonidoQueEmite;
    }

}

class Hamster extends Animal
{
    const ESTADO_EMOCIONAL_DEL_ANIMALITO = 'Contento';

    public function hacerSonido()
    {
        if(self::ESTADO_EMOCIONAL_DEL_ANIMALITO == 'Contento') {
            return 'Ruidito de hamster';
        }elseif(self::ESTADO_EMOCIONAL_DEL_ANIMALITO == 'Enojado'){
            return 'Ruidito de hamster Enojado';
        }else{
            return '';
        }
    }

}


# detallar sobrecarga y override
$gato = new Gato("Miau");   // Miau
$perro = new Perro("Guau"); // Guau
$hamster = new Hamster(); // Ruidito de hamster