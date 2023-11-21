<?php
/** FUNCION QUE SOLICITA UN NUMERO PARA EVALUAR SI EL MISMO ESTA DENTRO DE LOS PARAMETROS INGRESADOS Y RETORNA DICHO NUMERO
 * @param int $min
 * @param int $max
 * @return int
 */
function solicitarNumeroEntre($min, $max)
{
    //int $numero
    echo "Ingrese un número: ";
    $numero = trim(fgets(STDIN));

    if (is_numeric($numero)) { //determina si un string es un número. puede ser float como entero.
        $numero  = $numero * 1; //con esta operación convierto el string en número.
    }
    while (!(is_numeric($numero) && (($numero == (int)$numero) && ($numero >= $min && $numero <= $max)))) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
        if (is_numeric($numero)) {
            $numero  = $numero * 1;
        }
    }
    return $numero;
}
$num=solicitarNumeroEntre(8,20);