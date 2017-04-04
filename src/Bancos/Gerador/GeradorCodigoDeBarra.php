<?php
namespace BoletoBancario\Bancos\Gerador;

/**
 * base criada por Aziz Vicentini
 * azizvc@yahoo.com.br
 * http://portalfacil.zgames.com.br
 *
 * Modificado por Bruno P. Gonçalves @ Agência General de Desenvolvimento Web
 *
 * Baixado em: https://www.scriptbrasil.com.br/download/codigo/6491/
 */

class GeradorCodigoDeBarra
{
    use \BoletoBancario\Utils\ImageTrait;

    private function path(string $imageName) : string
    {
        $base = __DIR__.'/../../Transformer/Resources/images/';
        return $this->getImageData($base.$imageName);
    }

    public function comLinha($codigo)
    {
        $fino    = 1;
        $largo   = 3;
        $altura  = 50;
        $retorno = '';
        $barcodes[0] = "00110";
        $barcodes[1] = "10001";
        $barcodes[2] = "01001";
        $barcodes[3] = "11000";
        $barcodes[4] = "00101";
        $barcodes[5] = "10100";
        $barcodes[6] = "01100";
        $barcodes[7] = "00011";
        $barcodes[8] = "10010";
        $barcodes[9] = "01010";
        for ($f1 = 9; $f1 >= 0; $f1--) {
            for ($f2 = 9; $f2 >= 0; $f2--) {
                $f     = ($f1 * 10) + $f2;
                $texto = "";
                for ($i = 1; $i < 6; $i++) {
                    $texto .= substr($barcodes[$f1], ($i - 1), 1).substr($barcodes[$f2],
                            ($i - 1), 1);
                }
                $barcodes[$f] = $texto;
            }
        }
        //Desenho da barra
        //Guarda inicial

        $retorno = "<img src='".$this->path('p.png')."'  width={$fino} height={$altura} border=0 alt=\"\"><img
                    src='".$this->path('b.png')."' width={$fino} height={$altura} border=0 alt=\"\"><img
                    src='".$this->path('p.png')."' width={$fino} height={$altura} border=0 alt=\"\"><img
                    src='".$this->path('b.png')."' width={$fino} height={$altura} border=0 alt=\"\"><img".PHP_EOL;
        $texto = $codigo;
        if ((strlen($texto) % 2) <> 0) {
            $texto = "0".$texto;
        }
        // Draw dos dados
        while (strlen($texto) > 0) {
            $i     = round($this->esquerda($texto, 2));
            $texto = $this->direita($texto, strlen($texto) - 2);
            $f     = $barcodes[$i];
            for ($i = 1; $i < 11; $i+=2) {
                if (substr($f, ($i - 1), 1) == "0") {
                    $f1 = $fino;
                } else {
                    $f1 = $largo;
                }
                $retorno .= " src='".$this->path('p.png')."' width={$f1} height={$altura} border=0 alt=\"\"><img".PHP_EOL;
                if (substr($f, $i, 1) == "0") {
                    $f2 = $fino;
                } else {
                    $f2 = $largo;
                }
                $retorno .= " src='".$this->path('b.png')."' width={$f2} height={$altura} border=0 alt=\"\"><img".PHP_EOL;
            }
        }
        // Draw guarda final
        $retorno .= " src='".$this->path('p.png')."' width={$largo} height={$altura} border=0 alt=\"\"><img
                    src='".$this->path('b.png')."' width={$fino} height={$altura} border=0 alt=\"\"><img
                    src='".$this->path('p.png')."' width=1 height={$altura} border=0 alt=\"\">";
        return $retorno;
    }


    private function esquerda($entra,$comp)
    {
	       return substr($entra,0,$comp);
    }

    private function direita($entra,$comp)
    {
    	return substr($entra,strlen($entra)-$comp,$comp);
    }

}
