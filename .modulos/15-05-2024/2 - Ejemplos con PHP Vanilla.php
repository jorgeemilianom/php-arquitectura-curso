<?php
/*
Nivel 0: El Swamp of POX (Plain Old XML)
En este nivel, las APIs no utilizan los principios de REST y generalmente se basan en RPC (Comunicación entre Procedimientos Remotos) o en servicios web SOAP. Las interacciones con la API se basan en llamadas a métodos remotos, generalmente a través de HTTP POST, y los recursos no están identificados mediante URLs.
*/

// Ejemplo de una API en el nivel 0
// Este es un ejemplo ficticio de una API que sigue el modelo RPC
function getUser($userId) {
    // Lógica para obtener un usuario de la base de datos
    return $user;
}

// Llamada a la función getUser
$user = getUser(123);


/*
Nivel 1: Recursos Individuales
En este nivel, las APIs comienzan a utilizar recursos individuales identificados por URLs. Sin embargo, las URLs no siguen una convención uniforme y pueden incluir verbos HTTP en la URL, lo que indica operaciones CRUD (Crear, Leer, Actualizar, Eliminar) en los recursos.
*/


// Ejemplo de una API en el nivel 1
// Recurso: usuarios
// Operación: obtener información de un usuario específico
$user = file_get_contents('http://api.example.com/users/123');





/*
Nivel 2: Utilización de Verbos HTTP
En este nivel, las APIs utilizan los verbos HTTP correctamente para las operaciones CRUD en los recursos. Se utilizan los métodos estándar HTTP (GET, POST, PUT, DELETE) para interactuar con los recursos, lo que hace que la API sea más consistente y predecible.

*/

// Ejemplo de una API en el nivel 2
// Recurso: usuarios
// Operación: actualizar información de un usuario específico
$userId = 123;
$userData = array('name' => 'Nuevo Nombre', 'email' => 'nuevo@email.com');
$ch = curl_init('http://api.example.com/users/' . $userId);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($userData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);


/*
Nivel 3: Hipertexto como Motor del Estado de la Aplicación
En este nivel, la API explota los enlaces entre recursos y proporciona información adicional a través de hipervínculos (HATEOAS: Hypermedia As The Engine Of Application State). Esto permite una navegación más dinámica y autodescriptiva de la API.
*/


// Ejemplo de una API en el nivel 3
// Recurso: usuarios
// Operación: obtener información de un usuario específico y sus relaciones
$user = file_get_contents('http://api.example.com/users/123');

// Decodificar la respuesta JSON
$userData = json_decode($user, true);

// Obtener enlaces relacionados
$relatedLinks = $userData['_links'];

// Por ejemplo, seguir el enlace para obtener los amigos del usuario
$friends = file_get_contents($relatedLinks['friends']['href']);

