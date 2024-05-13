<?php

/*

Autenticación en PHP

La autenticación en PHP es un proceso fundamental para verificar la identidad de los usuarios que intentan acceder a una aplicación web o a recursos protegidos. Hay varias formas de implementar la autenticación en PHP, dependiendo de los requisitos de seguridad y las necesidades específicas de tu aplicación. Algunas técnicas comunes de autenticación incluyen:
    * 1. Autenticación de formularios:
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar las credenciales en una base de datos u otro medio de almacenamiento seguro
    if ($username === "usuario" && $password === "contraseña") {
        // Credenciales válidas, iniciar sesión
        session_start();
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        $error_message = "Nombre de usuario o contraseña incorrectos";
    }
}
/*
    * 2. Autenticación basada en tokens:
        En la autenticación basada en tokens, los usuarios reciben un token de acceso después de autenticarse correctamente, que luego se utiliza para autorizar las solicitudes subsiguientes a la aplicación. Esto es común en APIs y aplicaciones de una sola página (SPA). Aquí hay un ejemplo básico de cómo podrías implementar la autenticación basada en tokens en PHP:
*/

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

/*
    * 3. Otros métodos de autenticación:
        Además de los métodos mencionados, existen otros métodos de autenticación, como OAuth, OpenID Connect, SAML, entre otros, que son utilizados en diferentes contextos y escenarios. Estos métodos pueden ser más complejos de implementar y pueden requerir el uso de bibliotecas específicas en PHP.
    
JWT:

eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiMTIzNCIsInVzZXJfbmFtZSI6IkpvcmdlIEUuIE1hbGRvbmFkbyIsInVzZXJfZW1haWwiOiJqb3JnZWVtaWxpYW5vbUBnbWFpbC5jb20iLCJ1c2VyX3VpZCI6IjEyeTEzNXIxNThhMjcyamg2NTM4MmZkZDY0In0.ltGj8SvZIWVsVzuca7ACiORACkd81Pq7jjN4jCQIxo0

sha:
https://www.tools4noobs.com/online_php_functions/sha256/
38f5ca497af3c5e0ccc0952ecf2fa8b8718e7d3cd8654fa98cd0b8076b5a3457

*/

// original password
$_password = 'Jorge_el_curioso';

$password = hash('sha512', $_password);
$password = password_hash($password, PASSWORD_DEFAULT);

var_dump($password);

$verify = hash('sha512', $_password);
$verify = password_verify($verify, $password);

var_dump($verify);
