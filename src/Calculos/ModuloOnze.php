<?php
namespace BoletoBancario\Calculos;

class ModuloOnze
{

    public function calc($num, $base = 9, $r = 0) : int
    {
        $fator = 2;

        #Transforma string de numeros em array
        $numerosArray = str_split((string) $num);

        #Reverte o array, pois, as o calculo é feito de trás pra frente
        $arrayReverso = array_reverse($numerosArray);

        #Varre todo array remapeando para um array com a multiplicações dos fatores
        $resultadoMultiplicacao = array_map(function($item) use($base, &$fator) {
           if ($fator > $base) $fator = 2;
           return (int) $item * $fator++;
        }, $arrayReverso);

        #Efetua a soma do array
        $soma = array_sum($resultadoMultiplicacao);

        if ($r == 1) return $soma % 11;

        #Calculo do modulo 11
        $soma *= 10;
        $digito = $soma % 11;
        return $digito == 10 ? 0 : $digito;
    }
}
