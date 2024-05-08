<?php
// Inicializar CURL
$curl = curl_init();

// Configurar la URL y otras opciones
curl_setopt($curl, CURLOPT_URL, "https://api.example.com/data");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($curl);

// Cerrar la sesión CURL
curl_close($curl);

// Procesar la respuesta
echo $response;
