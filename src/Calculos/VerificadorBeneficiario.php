<?php
namespace BoletoBancario\Calculos;

class VerificadorBeneficiario
{
    public function calc($numero)
    {
        $resto2 = (new ModuloOnze)->calc($numero, 9, 1);
        $digito = 11 - $resto2;
        if ($digito == 10 || $digito == 11) {
            $digito = 0;
        }
        $dv     = $digito;
        return $dv;
    }
}
