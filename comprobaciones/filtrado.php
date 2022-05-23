<?php

function filtrado($texto) {
    $texto = trim($texto);
    $texto = htmlspecialchars($texto);
    $texto = stripslashes($texto);
    return $texto;
}

/*Para calcular el dni sumamos los 8 numeros y dividimos entre 23. 
El resto corresponde a el nº que equivale a la letra.
LETRAS Y CORRESPONDENCIA:
0-T
1-R
2-W
3-A
4-G
5-M
6-Y
7-F
8-P
9-D
10-X
11-B
12-N
13-J
14-Z
15-S
16-Q
17-V
18-H
19-L
20-C
21-K
22-E
EJ: 12345678Z.
*/
function compruebaDni($dni){
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
          return true;
        }else{
          return false;
        }
      }



?>