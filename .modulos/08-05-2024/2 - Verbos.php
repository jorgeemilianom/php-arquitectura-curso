<?php

// Ejemplo de solicitud GET
curl_setopt($curl, CURLOPT_URL, "https://api.example.com/data");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

// Ejemplo de solicitud POST
curl_setopt($curl, CURLOPT_URL, "https://api.example.com/create");
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, "name=John&age=30");
$response = curl_exec($curl);

// Ejemplo de solicitud PUT
curl_setopt($curl, CURLOPT_URL, "https://api.example.com/update");
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($curl, CURLOPT_POSTFIELDS, "name=John&age=35");
$response = curl_exec($curl);

// Ejemplo de solicitud DELETE
curl_setopt($curl, CURLOPT_URL, "https://api.example.com/delete");
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
$response = curl_exec($curl);
