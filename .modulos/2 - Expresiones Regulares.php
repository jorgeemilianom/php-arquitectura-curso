<?php

/**
 * Las expresiones regulares, a menudo abreviadas como "regex" o "regexp", son secuencias de caracteres que forman un patrón de búsqueda. 
 * Se utilizan para identificar la presencia de patrones específicos en un texto, permitiendo realizar operaciones complejas de búsqueda, 
 * sustitución, y manipulación de cadenas de texto de manera eficiente y concisa. Las expresiones regulares son una herramienta indispensable 
 * en el desarrollo de software, análisis de datos, y automatización de tareas que involucran el procesamiento de texto.
 * Las expresiones regulares se basan en una sintaxis que permite representar conjuntos de cadenas mediante el uso de caracteres especiales y constructores. 
 * Estos patrones pueden incluir:
 ** -> Caracteres literales: Buscan una coincidencia exacta con el carácter especificado.
 ** -> Meta-caracteres: Son caracteres especiales que tienen un significado particular y no representan a sí mismos. 
 Por ejemplo, . (punto) coincide con cualquier carácter.
 ** -> Clases de caracteres: Permiten especificar un conjunto de caracteres entre corchetes. Por ejemplo, [a-z] coincide con cualquier letra minúscula.
 ** -> Cuantificadores: Especifican cuántas veces debe aparecer un elemento para que se considere una coincidencia. 
 Por ejemplo, * (asterisco) indica cero o más ocurrencias del elemento anterior.
 */

 $email = "user@example.com";
 
 /*
 "/^
 [a-zA-Z0-9._%+-]+
 @
 [a-zA-Z0-9.-]+
 \.[a-zA-Z]{2,}
 $/"
 */
 if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
     echo "es un correo con un patron correcto";
 } else {
     echo "no es un correo con un patron correcto";
 }

 /*
¿Cómo Funciona la Validación?
La validación de un correo electrónico mediante expresiones regulares se basa en comprobar si la cadena de texto cumple con un 
patrón específico que representa la estructura general de un correo electrónico. 
Un patrón básico para validar correos electrónicos podría ser algo así como ^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$. 


^ y $ son anclas que indican el inicio y el final de la cadena, respectivamente, asegurando que toda la cadena sea evaluada.
[a-zA-Z0-9._%+-]+ corresponde a la parte local del correo electrónico (antes del @). Puede contener letras, números, puntos, guiones bajos, porcentajes, 
signos más y guiones. El signo + indica que los caracteres anteriores pueden aparecer una o más veces.
@ es un carácter literal que debe aparecer exactamente una vez.

[a-zA-Z0-9.-]+ representa la primera parte del dominio del correo electrónico (después del @ y antes del último punto), que puede incluir letras, números, puntos y guiones. El signo + indica que estos caracteres pueden aparecer una o más veces.
\. es un punto literal. En las expresiones regulares, el punto es un metacaracter que coincide con cualquier carácter, por lo que se escapa con una barra invertida para que represente un punto literal.
[a-zA-Z]{2,} corresponde al TLD (dominio de nivel superior) del correo electrónico, como .com, .org, .net, etc. Debe tener al menos dos letras.

*/


# Buscar todas las coincidencias de una palabra en un texto
$texto = "El rápido zorro marrón salta sobre el perro perezoso.";
$patron = "/rápido/";
$coincidencias = '';
preg_match_all($patron, $texto, $coincidencias);
print_r($coincidencias);


# Modificacion por referencia
function saludar($nombre)
{
    echo "Hola $nombre";
}

$nombreAUsar = "Juan";
saludar($nombreAUsar);    //  Hola Juan
saludar($nombreAUsar);    //  Hola Pepe

# Sustituir todas las ocurrencias de un patrón por otro texto
$texto = "El rápido zorro marrón salta sobre el perro perezoso.";
$patron = "/rápido/";
$sustitucion = "lento";
$count = 0;
echo preg_replace($patron, $sustitucion, $texto, -1, $count);


$cout; // 50.000

# Extraer números de una cadena
$texto = "En el año 2023, se produjeron 150 eventos.";
$patron = "/\d+/";
preg_match_all($patron, $texto, $numeros);
print_r($numeros); // 2023 && 150


