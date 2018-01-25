<?php


namespace AppBundle\Service;


class Conversor
{
    /**
     * Conversor de números a representación romana
     * Fuente: https://stackoverflow.com/a/15023547
     *
     * @param int $numero
     * @return string
     */
    function aFormatoRomano($numero) {
        $mapa = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $resultado = '';
        while ($numero > 0) {
            foreach ($mapa as $romano => $entero) {
                if($numero >= $entero) {
                    $numero -= $entero;
                    $resultado .= $romano;
                    break;
                }
            }
        }
        return $resultado;
    }
}