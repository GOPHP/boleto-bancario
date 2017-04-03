<?php
namespace BoletoBancario\Bancos\Gerador;

use BoletoBancario\Calculos\ModuloDez;

class GeradorLinhaDigitavel
{
    public function gera($codigo) : string
    {
       $moduloDez = new ModuloDez;

       // Posição 	Conteúdo
       // 1 a 3    Número do banco
       // 4        Código da Moeda - 9 para Real
       // 5        Digito verificador do Código de Barras
       // 6 a 9   Fator de Vencimento
       // 10 a 19 Valor (8 inteiros e 2 decimais)
       // 20 a 44 Campo Livre definido por cada banco (25 caracteres)
       // 1. Campo - composto pelo código do banco, código da moeda, as cinco primeiras posições
       // do campo livre e DV (modulo10) deste campo
       $p1     = substr($codigo, 0, 4);
       $p2     = substr($codigo, 19, 5);
       $p3     = $moduloDez->calc("$p1$p2");
       $p4     = "$p1$p2$p3";
       $p5     = substr($p4, 0, 5);
       $p6     = substr($p4, 5);
       $campo1 = "$p5.$p6";
       // 2. Campo - composto pelas posições 6 a 15 do campo livre
       // e livre e DV (modulo10) deste campo
       $p1     = substr($codigo, 24, 10);
       $p2     = $moduloDez->calc($p1);
       $p3     = "$p1$p2";
       $p4     = substr($p3, 0, 5);
       $p5     = substr($p3, 5);
       $campo2 = "$p4.$p5";
       // 3. Campo - composto pelas posições 16 a 25 do campo livre
       // e livre e DV (modulo10) deste campo
       $p1     = substr($codigo, 34, 10);
       $p2     = $moduloDez->calc($p1);
       $p3     = "$p1$p2";
       $p4     = substr($p3, 0, 5);
       $p5     = substr($p3, 5);
       $campo3 = "$p4.$p5";
       // 4. Campo - dígito verificador do código de barras
       $campo4 = substr($codigo, 4, 1);
       // 5. Campo composto pelo fator vencimento e valor nominal do documento, sem
       // indicação de zeros à esquerda e sem edição (sem ponto e vírgula). Quando se
       // tratar de valor zerado, a representação deve ser 000 (três zeros).
       $p1     = substr($codigo, 5, 4);
       $p2     = substr($codigo, 9, 10);
       $campo5 = "$p1$p2";
       return "$campo1 $campo2 $campo3 $campo4 $campo5";
   }

}
