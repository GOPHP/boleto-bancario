<?php
namespace BoletoBancario\Bancos\Gerador;

use BoletoBancario\Calculos\ModuloDez;

class GeradorLinhaDigitavel
{
    /**
     * Gera a linha digitavel do boleto de acordo com normas
     * da carta circular n. 2926 do banco central do Brasil.
     * Disponível para consulta em caelum.stella.boleto.doc
     *
     * @param string gerado pelo boleto
     * @return string digitavel já formatada de acordo com padrao
     */
    public function geraLinhaDigitavelPara(string $codigoDeBarras)
    {
        $moduloDez = new ModuloDez();
        $builder = '';
        $builder .= substr($codigoDeBarras, 0, 4);
        $builder .= substr($codigoDeBarras, 19, 5);
        $builder .= $moduloDez->calc($builder);
        $builder .= substr($codigoDeBarras, 24, 10);
        $builder .= $moduloDez->calc(substr($builder, 10, 10));
        $builder .= substr($codigoDeBarras, 34);
        $builder .= $moduloDez->calc(substr($builder, 21, 10));
        $builder .= substr($codigoDeBarras, 4, 1);
        $builder .= substr($codigoDeBarras, 5, 4);
        $builder .= substr($codigoDeBarras, 9, 10);

        return $this->formata($builder);
    }


    private function formata(string $linhaDigitavel) {
        $linhaDigitavel = $this->insert($linhaDigitavel, '.', 5);
        $linhaDigitavel = $this->insert($linhaDigitavel, "  ", 11);
        $linhaDigitavel = $this->insert($linhaDigitavel, '.', 18);
        $linhaDigitavel = $this->insert($linhaDigitavel, "  ", 25);
        $linhaDigitavel = $this->insert($linhaDigitavel, '.', 32);
        $linhaDigitavel = $this->insert($linhaDigitavel, "  ", 39);
        $linhaDigitavel = $this->insert($linhaDigitavel, "  ", 42);
        return $linhaDigitavel;
    }

    private function insert($string, $stringInsert, $pos)
    {
        return substr($string, 0, $pos) . $stringInsert . substr($string, $pos);
    }
}
