<?php
namespace BoletoBancario\Calculos;

class FormataNumero
{

    const FORMATO_GERAL    = "geral";
    const FORMATO_CONVENIO = "convenio";
    const FORMATO_VALOR    = "valor";

    public function calc($numero, $loop, $insert, $tipo = "geral")
    {
        if ($tipo == self::FORMATO_GERAL) {
            $numero = str_replace(",", "", $numero);
            while (strlen($numero) < $loop) {
                $numero = $insert.$numero;
            }
        }
        if ($tipo == self::FORMATO_VALOR) {
            $numero = str_replace(",", "", $numero);
            while (strlen($numero) < $loop) {
                $numero = $insert.$numero;
            }
        }
        if ($tipo == self::FORMATO_CONVENIO) {
            while (strlen($numero) < $loop) {
                $numero = $numero.$insert;
            }
        }

        return $numero;
    }
}
