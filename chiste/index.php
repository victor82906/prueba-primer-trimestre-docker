<?php

$metodo = $_SERVER['REQUEST_METHOD'];

if($metodo == "GET"){
    $chistes = [
        "Hay 10 tipos de personas en el mundo: las que saben binario y las que no.",
        "Un optimista ve la rosquilla, un pesimista ve el agujero, un programador ve un NullPointerException.",
        "¿Por qué los programadores prefieren el modo oscuro? Porque la luz atrae a los bugs.",
        "Mi código no tiene bugs, solo características inesperadas.",
        "Un SQL entró a un bar, se acercó a dos mesas y les preguntó: '¿Puedo unirme a ustedes?'",
        "Un informático le dice a su amigo: '¿Sabes por qué no he ido a la iglesia?' 'Porque no había wifi'.",
        "¿Cuál es el animal más antiguo? La cebra. ¡Está en blanco y negro!",
        "¿Cuál es el lenguaje de programación favorito de los vampiros? El BloodScript.",
        "Un cliente le pide un cambio de última hora a un desarrollador. El desarrollador le devuelve la mirada y le dice: '¡Eso es un feature, no un bug!'",
        "¿Qué le dice un GIF a un JPEG? ¡Anímate un poco!",
        "La mujer de un programador le dice: 'Ve a la tienda y tráeme un cartón de leche. Si tienen huevos, trae 6.' El hombre regresa con 6 cartones de leche.",
        "¿Qué hace un terapeuta con un programador? Le dice: 'Háblame de tu madre... Clase'.",
        "Un byte entró a un bar. El camarero le preguntó: '¿Qué quiere?' Y el byte respondió: 'Un bit más, por favor'.",
        "Un programador entra al mar y se ahoga. ¿Por qué? Porque no pudo hacer un 'float'.",
        "¿Por qué los ingenieros de software usan gafas? Porque no ven Sharp.",
        "Mi código funciona, no sé por qué. ¡A modificarlo!",
        "¿Cuál es el sonido más aterrador para un desarrollador? 'Funciona en mi máquina'.",
        "La mejor parte de usar booleano es que si te equivocas, estás a un solo bit de la respuesta correcta.",
        "El hardware: la parte de la computadora que puedes patear. El software: la parte que solo puedes maldecir.",
        "Si algo puede ir mal, lo hará. (Ley de Murphy) Si algo no puede ir mal, lo hará de todos modos. (Ley de Murphy del desarrollador)"    
    ];
    echo $chistes[array_rand($chistes)];
    // array_rand metodo que devuelve un indice aleatorio del array que se le pase por parametro
}

?>