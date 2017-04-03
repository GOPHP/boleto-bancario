<?php
namespace BoletoBancario\Calculos;

use  BoletoBancario\Calculos\ModuloOnze;

trait CodigoBancoComDv
{
    private function geraCodigoBanco($numero)
    {
        $parte1 = substr($numero, 0, 3);
        $parte2 = (new ModuloOnze)->calc($parte1);
        return $parte1."-".$parte2;
    }
}
