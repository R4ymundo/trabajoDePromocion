<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
//Carrera Bruno Abel. Legajo: FAI-4912. Carrera:TUDW. mail: brunofain2023@gmail.com. Usuario Github: R4ymundo
//Perez Aaron. Legajo: FAI-4977. Carrera:TUDW. mail: . Usuario Github: Sanluki04


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/** FUNCION COLECCION DE PALABRAS
 * Obtiene una colección de palabras de cinco letras en mayúsculas
 * @return array
 */
function cargarColeccionPalabras()
{
    //ARRAY $coleccionPalabras
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "FERIA", "HIELO", "CIELO", "RATON", "VARON"
    ];

    return ($coleccionPalabras);
}

/** FUNCION CARGAR PARTIDAS
 * Obtiene una colección de partidas jugadas
 * @return array
 */
function cargarPartidas(){
    //ARRAY $coleccionPartidas
    $coleccionPartidas[0] = ["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0,];
    $coleccionPartidas[1] = ["palabraWordix"=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix"=> "QUESO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix"=> "VERDE" , "jugador" => "sebas", "intentos"=> 0, "puntaje" => 0,];
    $coleccionPartidas[4] = ["palabraWordix"=> "VARON" , "jugador" => "rodolfo", "intentos"=> 4, "puntaje" => 14];
    $coleccionPartidas[5] = ["palabraWordix"=> "RATON" , "jugador" => "gustavo", "intentos"=> 2, "puntaje" => 10];
    $coleccionPartidas[6] = ["palabraWordix"=> "HIELO" , "jugador" => "roberto", "intentos"=> 0, "puntaje" => 0,];
    $coleccionPartidas[7] = ["palabraWordix"=> "PISOS" , "jugador" => "sebas", "intentos"=> 3, "puntaje" => 14];
    $coleccionPartidas[8] = ["palabraWordix"=> "HIELO" , "jugador" => "nico", "intentos"=> 2, "puntaje" => 10];
    $coleccionPartidas[9] = ["palabraWordix"=> "FERIA" , "jugador" => "jere", "intentos"=> 3, "puntaje" => 14];
    return $coleccionPartidas;
}

/**FUNCION OPCIONES
 * Funcion que muestra opciones al usuario y retorna el valor de la opción elegida
 * @return INT 
 */
function seleccionarOpcion(){
    //INT $opcion
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
function agregarPalabra5Letras()
{
    //string $palabra
    echo "Ingrese una palabra de 5 letras: ";
    $palabra = trim(fgets(STDIN));
    $palabra  = strtoupper($palabra);

    while ((strlen($palabra) != 5) || !esPalabra($palabra)) {
        echo "Debe ingresar una palabra de 5 letras: ";
        $palabra = strtoupper(trim(fgets(STDIN)));
    }
    return $palabra;
}

//Una función que solicite al usuario un número entre un rango de valores. Si el número ingresado por el
//usuario no es válido, la función se encarga de volver a pedirlo. La función retorna un número válido.
/**
 * Una función que le pida al usuario un numero de rango de valores y retorna el numero  
 * @param INT $partidas
 * @return INT 
 */
function pideNumero($coleccionPartidas){
    $max=count($coleccionPartidas);
    echo "Ingrese un numero del 1 al ".$max." \n";
    $numero=trim(fgets(STDIN));
    while($numero<1 || $numero>$max){
        echo "Error: Numero Invalido
        Ingrese un numero del 1 al ".$max." \n";
        $numero=trim(fgets(STDIN));
    }
    return $numero; 
}

//Una función que dado un número de partida, muestre en pantalla los datos
// de la partida como lo indica la sección EXPLICACIÓN 1
/**
 * Una función que dado un numero de partida muestra en pantalla los datos de la partida
 * @param INT $num
 * @param ARRAY $coleccionPartidas
 * @return INT 
 */
function numeroPartida($num,$coleccionPartidas){
    //STRING $palabra, $jugador
    //INT $intentos, puntajes
    $palabra = $coleccionPartidas[$num-1]["palabraWordix"];
    $jugador = $coleccionPartidas[$num-1]["jugador"];
    $intentos = $coleccionPartidas[$num-1]["intentos"];
    $puntaje = $coleccionPartidas[$num-1]["puntaje"];
    echo "***********************************\n";
    echo "Partida WORDIX ".$num.": palabra ".$palabra."\n";
    echo "Jugador: ".$jugador."\n";
    echo "Puntaje: ".$puntaje."puntos \n";
    If($puntaje>0){
        Echo "intentos: adivino la palabra en: ". $intentos. " Intentos \n";
    }else{
        Echo"intentos: no adivino la plabra \n";
    }
    echo "***********************************\n";
}

//Una función agregarPalabra cuya entrada sea la colección de palabras y una palabra, y la función retorna
//la colección modificada al agregarse la nueva palabra. 
/**
 * Una función que agrega una palabra de 5 letras a la coleccion de palabras
 * @param ARRAY $coleccionPalabras
 * @param STRING $unaPalabra
 * @return INT 
 */
function agregarPalabra ($unaPalabra, $coleccionPalabras){
    //INT $ind
    $ind=count($coleccionPalabras);
    $coleccionPalabras[$ind] = strtoupper($unaPalabra);
    return $coleccionPalabras;
}
/**
 * Una función que busca si ya existe la palabra en la coleccion de palabras
 * @param ARRAY $coleccionPalabras
 * @param STRING $unaPalabra
 * @return INT 
 */
function palabraEncontrar($coleccionPalabras,$unaPalabra){
    //INT $i, $num
    $i=0;
    $unaPalabra=false;
    $num=count($coleccionPalabras);

    While($i>$num && $unaPalabra==false){
        if ($coleccionPalabras [$i] == $unaPalabra){
                $unaPalabra= true;
            }   
      $i++;
    }

    return $unaPalabra;
}

//Una función que dada una colección de partidas y el nombre de un jugador, retorne el índice de la primer
//partida ganada por dicho jugador. Si el jugador ganó ninguna partida, la función debe retornar el valor -1.
//(debe utilizar las instrucciones vistas en la materia, no utilizar funciones predefinidas de php).
/**
 * Una función que dado un numero de partida muestra en pantalla los datos de la partida
 * @return INT 
 */

//Una función que dada la colección de partidas y el nombre de un jugador, retorne el resumen del jugador
//utilizando la estructura c) de la sección EXPLICACIÓN 2.
/**
 * Una función que dado un numero de partida muestra en pantalla los datos de la partida
 * @return INT 
 */

 //Una función solicitarJugador sin parámetros formales que solicite al usuario el nombre de un jugador y
//retorne el nombre en minúsculas. La función debe asegurar que el nombre del jugador comience con una
//letra. (Utilice funciones predefinidas de string).
/**
 * Una función que dado un numero de partida muestra en pantalla los datos de la partida
 * @return INT 
 */

//Una función sin retorno que, dada una colección de partidas, muestre la colección de partidas ordenada
//por el nombre del jugador y por la palabra. Utilice la función predefinida uasort de php y print_r
/**
 * Una función que dado un numero de partida muestra en pantalla los datos de la partida
 * @return INT 
 */

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:
 /**Un Programa Principal que deberá seguir los siguientes pasos:
a. Precargar las estructuras de partidas.
b. Precargar la estructura de palabras.
c. Repetir el menú de opciones mientras la opción seleccionada no sea la opción Salir.
d. Cuando el usuario selecciona la opción del menú, debe invocar a la/s función/es necesarias.
Salvo algunas excepciones, debe contar con funciones con parámetros formales y retorno.
Asesorarse con la Cátedra para implementar las funciones correctamente de modo que los
resultados de las funciones puedan ser reusados.
e. Investigar la instrucción switch en el manual de PHP. ¿a qué tipo de estructura de control vista
en teoría corresponde? Escriba un comentario sobre la instrucción en el código fuente.
*/

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);

$llamaCargarPartidas=cargarPartidas();
$llamaColeccionPalabras=cargarColeccionPalabras();

do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            break;
        case 3: 
            $llamaPideNumero=pideNumero($llamaCargarPartidas);
            $llamaNumeroPartida=numeroPartida($llamaPideNumero,$llamaCargarPartidas);
            echo $llamaNumeroPartida;

            break;
        
        case 4:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 4

            break;
        case 5:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 5
    
            break;
        case 6:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 6
        
            break;
        case 7:
            $llamaleerPalabra5Letras=agregarPalabra5Letras();
            $llamaPalabraEncontrar=palabraEncontrar($llamaColeccionPalabras,$llamaleerPalabra5Letras);
            If($llamaPalabraEncontrar==true){
                echo "La palabra ya existe \n"; 
            }else{ 
                  $llamaColeccionPalabras=agregarPalabra($llamaleerPalabra5Letras,$llamaColeccionPalabras);
                  print_r($llamaColeccionPalabras);
            }
            
            break;
    }
} while ($opcion != 8);
