<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
//Carrera Bruno Abel. Legajo: FAI-4912. Carrera:TUDW. mail: brunofain2023@gmail.com. Usuario Github: R4ymundo
//Perez Aaron. Legajo: FAI-4977. Carrera:TUDW. mail: santiaaronp04@gmail.com. Usuario Github: Sanluki04


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
    $coleccionPartidas[4] = ["palabraWordix"=> "VARON" , "jugador" => "rudolf", "intentos"=> 4, "puntaje" => 14];
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
        echo "\n Menú de opciones: 
        1) Jugar al wordix con una palabra elegida 
        2) Jugar al wordix con una palabra aleatoria 
        3) Mostrar una partida
        4) Mostrar la primer partida ganadora
        5) Mostrar resumen de Jugador
        6) Mostrar listado de partidas ordenadas por jugador y por palabra
        7) Agregar una palabra de 5 letras a Wordix
        8) salir \n";
        $opcion=intval(trim(fgets(STDIN)));
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
    echo "Puntaje: ".$puntaje." puntos \n";
    If($puntaje>0){
        Echo "intentos: adivino la palabra en: ". $intentos. " Intentos \n";
    }else{
        Echo"intentos: no adivino la palabra \n";
    }
    echo "***********************************\n";
}
/**
 * Una función que dado un numero de partida muestra en pantalla los datos de la partida
 * @param INT $num
 * @param ARRAY $coleccionPartidas
 * @return INT 
 */
function jugadorPartida($num,$coleccionPartidas,$nombre){
    //STRING $palabra, $jugador
    //INT $intentos, puntajes
  
        $palabra = $coleccionPartidas[$num]["palabraWordix"];
        $intentos = $coleccionPartidas[$num]["intentos"];
        $puntaje = $coleccionPartidas[$num]["puntaje"];
        echo "***********************************\n";
        echo "Partida WORDIX ".$num.": palabra ".$palabra."\n";
        echo "Jugador: ".$nombre."\n";
        echo "Puntaje: ".$puntaje." puntos \n";
        If($puntaje>0){
            Echo "intentos: adivino la palabra en: ". $intentos. " Intentos \n";
        }else{
            Echo"intentos: no adivino la palabra \n";
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

    While($i<$num && $unaPalabra==false){
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
 * Una función que busca la primera partida ganada
 * @param ARRAY $coleccionPartidas
 * @param STRING $nombreJugador
 * @return INT
 */
function primeraGanada($coleccionPartidas, $nombreJugador) {
    //INT indice, $i, $num
    $indice=-1;
    $i=0;
    $num=count($coleccionPartidas);
    While($i<$num && $indice==-1){
        if ($coleccionPartidas [$i]["jugador"] == $nombreJugador){
            if($coleccionPartidas [$i]["puntaje"] > 0){
                $indice=$i;
            }
        }  
      $i++;
    }
    return $indice;
}
//Una función que dada la colección de partidas y el nombre de un jugador, retorne el resumen del jugador
//utilizando la estructura c) de la sección EXPLICACIÓN 2.
/**
 * Una función que almacena y crea arreglo del Resumen de un Jugador
 * @param ARRAY $coleccionPartidas
 * @param STRING $nombreJugador
 * @return ARRAY $resumen  
 */
function ColeccionResumen($coleccionPartidas, $nombreJugador) {
    // INT $cPartidas,$cVictorias,$sumaPuntaje,$cInt1,$cInt2,$cInt3,$cInt4,$cInt4,$cInt5,$cInt6,$porcVictorias
    $cPartidas=0;
    $cVictorias=0;
    $sumaPuntaje=0;
    $cInt1=0;
    $cInt2=0;
    $cInt3=0;
    $cInt4=0;
    $cInt5=0;
    $cInt6=0;
    foreach ($coleccionPartidas as $partida) {
        if ($partida['jugador'] === $nombreJugador) {
            $cPartidas = $cPartidas + 1;
            if($partida['puntaje']>0){
                $cVictorias=$cVictorias+1;
                $sumaPuntaje=$sumaPuntaje+$partida['puntaje'];
            }
            if($partida['intentos']==1){
                $cInt1=$cInt1+1;
            }elseif($partida['intentos']==2){
                $cInt2=$cInt2+1;
            }elseif($partida['intentos']==3){
                $cInt3=$cInt3+1;
            }elseif($partida['intentos']==4){
                $cInt4=$cInt4+1;
            }elseif($partida['intentos']==5){
                $cInt5=$cInt5+1;
            }elseif($partida['intentos']==6){
                $cInt6=$cInt6+1;
            }
        }
    }
    if($cVictorias>0){
        $porcVictorias=$cVictorias*100/$cPartidas;
    }else{
        $porcVictorias=0;
    }
    $resumen = [
        'jugador' => $nombreJugador,
        'partidas' => $cPartidas,
        'puntaje' => $sumaPuntaje,
        'victorias' => $cVictorias,
        'porcentaje' => $porcVictorias,
        'intento1' => $cInt1,
        'intento2' => $cInt2,
        'intento3' => $cInt3,
        'intento4' => $cInt4,
        'intento5' => $cInt5,
        'intento6' => $cInt6,
    ];
    return $resumen;
}
/**
 * una funcion para mostrar el resumen de un jugador
 * @param array $resumen
 */
function formatoResumen($resumen){
    echo "***********************************\n";
    echo "jugador: ". $resumen['jugador']. "\n";
    echo "partidas: ". $resumen['partidas']. "\n";
    echo "puntaje total: ".$resumen['puntaje']. "\n";
    echo "victorias: ".$resumen['victorias']."\n";
    echo "el porcentaje de victorias es: ".$resumen['porcentaje']. "%\n";
    echo "adivinadas:\n";
            echo "intento 1: " .$resumen['intento1']. "\n";
            echo "intento 2: ".$resumen['intento2']. "\n";
            echo "intento 3: " .$resumen['intento3']. "\n";
            echo "intento 4: " .$resumen['intento4']. "\n";
            echo "intento 5: " .$resumen['intento5']. "\n";
            echo "intento 6: " .$resumen['intento6']. "\n";
    echo "***********************************\n";
}
 //Una función solicitarJugador sin parámetros formales que solicite al usuario el nombre de un jugador y
//retorne el nombre en minúsculas. La función debe asegurar que el nombre del jugador comience con una
//letra. (Utilice funciones predefinidas de string).
/**
 * Una función que pide un nombre y lo retorna en minuscula
 * @return STRING $nombreJugador 
 */
function solicitarJugador(){
    //STRING $nombreJugador
    echo "Ingrese Nombre del Jugador\n";
    $nombreJugador=strtolower(trim(fgets(STDIN)));//strtolower lo pasa a minusculas
    while(strlen($nombreJugador)<1){//strlen obtiene la longitud de un string
        echo "Error: no ingreso caracteres\n";
        echo "Ingrese Nombre del Jugador\n";
        $nombreJugador=strtolower(trim(fgets(STDIN)));
    }
    return $nombreJugador;
}
//Una función sin retorno que, dada una colección de partidas, muestre la colección de partidas ordenada
//por el nombre del jugador y por la palabra. Utilice la función predefinida uasort de php y print_r
/**
 * Una función que ordena por nombre del jugador y luego por palabra
 * @param ARRAY $coleccionPartidas 
 */
function partidasOrdenadas($coleccionPartidas) {
    //INT $nombreComparacion
    //STRING $palabraA, $palabraB
    uasort($coleccionPartidas, function($palabraA, $palabraB) {//uasort 
        $nombreComparacion = strcmp($palabraA['jugador'], $palabraB['jugador']);//strcmp compara los nombres de jugadores y dice que si la primera cadena es menor que, igual a, o mayor que la segunda, entregando num negativo,0 o num positivo.
        return ($nombreComparacion === 0)?strcmp($palabraA['palabraWordix'], $palabraB['palabraWordix']):$nombreComparacion;//strcmp compara las palabras y dice que si la primera cadena es menor que, igual a, o mayor que la segunda, entregando num negativo,0 o num positivo.
    });
    print_r($coleccionPartidas);
}

/**FUNCION PALABRA ELEGIDA
 * Verifica si el jugador ya jugó con una palabra wordix
 * @param ARRAY $coleccionPartidas
 * @param STRING $llamaNombre
 * @param STRING $palabra
 * @return BOOLEAN
 */

 function PalabraElegida($coleccionPartidas, $llamaNombre, $palabra) {
    // INT $i, $n 
    //BOOLEAN $jugada
    $i=0;
    $num=count($coleccionPartidas);
    $jugada= false;
    while ($i<$num && $jugada==false) {
        if ($coleccionPartidas[$i]["palabraWordix"]==$palabra){
            if ($coleccionPartidas[$i]["jugador"]==$llamaNombre) {
                $jugada= true;
            }
        }
        $i++;
    }
    return $jugada;
}
/**
 * Una función que ordena por nombre del jugador y luego por palabra
 * @param ARRAY $coleccionPartidas 
 */
function jugarPalabra($coleccionPalabras){
    $num=count($coleccionPalabras);
    echo "Ingrese un numero entre 1 y ".$num."\n";
    $indice=trim(fgets(STDIN));
    while($indice<1 || $indice>$num){
        echo "Error: Numero Invalido
        Ingrese un numero del 1 al ".$num." \n";
        $indice=trim(fgets(STDIN));
    }
    return strtoupper($coleccionPalabras[$indice-1]);
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$llamaCargarPartidas=cargarPartidas();
$llamaColeccionPalabras=cargarColeccionPalabras();

do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: 
            //Jugar al wordix con una palabra elegida
            $llamaNombre=solicitarJugador();
            echo"El juego posee ". count($llamaColeccionPalabras)." palabras para poder adivinar\n";
            $llamaJugarPalabra=jugarPalabra($llamaColeccionPalabras);
            $seJugo=palabraElegida($llamaCargarPartidas, $llamaNombre , $llamaJugarPalabra);
            if ($seJugo==true) {
                echo "Esta palabra ya ha sido utilizada para jugar\n";
                echo "Por favor, vuelve a elegir otra palabra\n";
            }else{
                $partida = jugarWordix($llamaJugarPalabra,$llamaNombre);
                $llamaCargarPartidas[count($llamaCargarPartidas)] = $partida;
            }
            break;

        case 2: 
            //Jugar al wordix con una palabra aleatoria
            $llamaNombre=solicitarJugador();
            $aleatoriaPalabra=$llamaColeccionPalabras[array_rand($llamaColeccionPalabras)];//te trae una palabra random de coleccion palabras
            $seJugo=PalabraElegida($llamaCargarPartidas,$llamaNombre,$aleatoriaPalabra);
            if ($seJugo==true) {
                echo "Esta palabra ya ha sido utilizada para jugar\n";
            }else{
                $partida = jugarWordix($aleatoriaPalabra,$llamaNombre);
                $llamaCargarPartidas[count($llamaCargarPartidas)] = $partida;
            }
            break;
        case 3: 
            //Mostrar una partida
            $llamaPideNumero=pideNumero($llamaCargarPartidas);
            $llamaNumeroPartida=numeroPartida($llamaPideNumero,$llamaCargarPartidas);
            echo $llamaNumeroPartida;

            break;
        
        case 4:
            //Mostrar la primer partida ganadora
            $llamaNombre=solicitarJugador();
            $llamaPrimerGanada=primeraGanada($llamaCargarPartidas,$llamaNombre);
            if ($llamaPrimerGanada !== -1) {
                $llamaNumeroPartida = numeroPartida($llamaPrimerGanada + 1, $llamaCargarPartidas);
            } else {
                echo "El jugador no ha ganado ninguna partida.\n";
            }
            break;
        case 5:
            //Mostrar estadísticas jugador
            $llamaNombre=solicitarJugador();
            $llamaResumen=ColeccionResumen($llamaCargarPartidas,$llamaNombre);
            $llamarFormato=formatoResumen($llamaResumen);
            break;
        case 6:
            //Mostrar listado de partidas ordenadas por jugador y por palabra
            $llamarPartidasOrdenadas=partidasOrdenadas($llamaCargarPartidas);
            break;
        case 7:
            //Agregar una palabra de 5 letras a Wordix
            $llamaleerPalabra5Letras=agregarPalabra5Letras();
            $llamaPalabraEncontrar=palabraEncontrar($llamaColeccionPalabras,$llamaleerPalabra5Letras);
            If($llamaPalabraEncontrar==true){
                echo "La palabra ya existe \n"; 
            }else{ 
                  $llamaColeccionPalabras=agregarPalabra($llamaleerPalabra5Letras,$llamaColeccionPalabras);
                  //print_r($llamaColeccionPalabras);
            }
            
            break;
    }
} while ($opcion != 8);
