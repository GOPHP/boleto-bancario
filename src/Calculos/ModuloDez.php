<?php
namespace BoletoBancario\Calculos;

class ModuloDez
{
    public function calc($num) : integer
    {
        $numtotal10 = 0;
        $fator      = 2;
        #Separação dos números
        for ($i = strlen($num); $i > 0; $i--) {
            #pega cada números isoladamente
            $numeros[$i] = substr($num, $i - 1, 1);
            #Efetua multiplicação do números pelo (falor 10)
            $temp        = $numeros[$i] * $fator;
            $temp0       = 0;
            foreach (preg_split('//', $temp, -1, PREG_SPLIT_NO_EMPTY) as $k => $v) {
                $temp0+=$v;
            }
            $parcial10[$i] = $temp0; #$numeros[$i] * $fator;
            #monta sequência para soma dos dígitos no (modulo 10)
            $numtotal10 += $parcial10[$i];
            if ($fator == 2) {
                $fator = 1;
            } else {
                $fator = 2; #intercala fator de multiplicação (modulo 10)
            }
        }
        #várias linhas removidas, vide função original
        #Cálculo do modulo 10
        $resto  = $numtotal10 % 10;
        $digito = 10 - $resto;
        if ($resto == 0) {
            $digito = 0;
        }
        return $digito;
    }
}
