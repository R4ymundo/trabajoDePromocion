<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "FERIA", "HIELO", "CIELO", "RATON", "VARON"
    ];

    return ($coleccionPalabras);
}

/**
 * Obtiene una colección de partidas jugadas
 * @return array
 */
function cargarPartidas(){
    $coleccionPartidas[0] = ["palabraWordix "=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0,];
    $coleccionPartidas[1] = ["palabraWordix "=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix "=> "QUESO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix "=> "VERDE" , "jugador" => "sebas", "intentos"=> 0, "puntaje" => 0,];
    $coleccionPartidas[4] = ["palabraWordix "=> "VARON" , "jugador" => "rodolfo", "intentos"=> 4, "puntaje" => 14];
    $coleccionPartidas[5] = ["palabraWordix "=> "RATON" , "jugador" => "gustavo", "intentos"=> 2, "puntaje" => 10];
    $coleccionPartidas[6] = ["palabraWordix "=> "HIELO" , "jugador" => "roberto", "intentos"=> 0, "puntaje" => 0,];
    $coleccionPartidas[7] = ["palabraWordix "=> "PISOS" , "jugador" => "sebas", "intentos"=> 3, "puntaje" => 14];
    $coleccionPartidas[8] = ["palabraWordix "=> "HIELO" , "jugador" => "nico", "intentos"=> 2, "puntaje" => 10];
    $coleccionPartidas[9] = ["palabraWordix "=> "FERIA" , "jugador" => "jere", "intentos"=> 3, "puntaje" => 14];
    return $coleccionPartidas;
}

/**
 * menu de opciones
 * @return INT 
 */
function seleccionarOpcion(){
        do{
            echo "Menú de opciones: 
            1) Jugar al wordix con una palabra elegida 
            2) Jugar al wordix con una palabra aleatoria 
            3) Mostrar una partida
            4) Mostrar la primer partida ganadora
            5) Mostrar resumen de Jugador
            6) Mostrar listado de partidas ordenadas por jugador y por palabra
            7) Agregar una palabra de 5 letras a Wordix
            8) salir \n";
            $opcion=trim(fgets(STDIN));
        }while($opcion<0 || $opcion>8);
    return $opcion;
}

 
/**
 * Una función que le pida al usuario ingresar una palabra de 5 letras y retorna la palabra
 * @return INT 
 */
function pidePalabra(){
    echo "Ingrese una palabra de 5 letras \n";
    $palabra=trim(fgets(STDIN));
    return $palabra;
}

//Una función que solicite al usuario un número entre un rango de valores. Si el número ingresado por el
//usuario no es válido, la función se encarga de volver a pedirlo. La función retorna un número válido.
function pideNumerro(){
    echo "Ingrese un numero del 1 al 10 \n";
    $numero=trim(fgets(STDIN));
    while($numero<1 || $numero>10){
        echo "Error: Numero Invalido
        Ingrese un numero del 1 al 10 \n";
        $numero=trim(fgets(STDIN));
    }
    return $numero; 
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/