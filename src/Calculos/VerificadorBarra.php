<?php
namespace BoletoBancario\Calculos;

class VerificadorBarra
{
    public function calc($numero)
    {
        $resto = (new ModuloOnze)->calc($numero, 9, 1);
        if ($resto == 0 || $resto == 1 || $resto == 10) {
            $dv = 1;
        } else {
            $dv = 11 - $resto;
        }
        return $dv;
    }
}
