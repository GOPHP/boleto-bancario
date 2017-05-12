<?php
namespace BoletoBancario\Calculos;

class VerificadorBarra
{
    public function calc($numero, $base = 9, $r = 1)
    {
        $resto = (new ModuloOnze)->calc($numero, $base, $r);
        if ($resto == 0 || $resto == 1 || $resto == 10) {
            $dv = 1;
        } else {
            $dv = 11 - $resto;
        }
        return $dv;
    }
}
