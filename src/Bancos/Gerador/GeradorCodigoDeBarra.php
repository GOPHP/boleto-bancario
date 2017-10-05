<?php
namespace BoletoBancario\Bancos\Gerador;

use BoletoBancario\Exception\IllegalArgumentException;

class GeradorCodigoDeBarra
{
    use \BoletoBancario\Utils\ImageTrait;

    private function path(string $imageName) : string
    {
        $base = __DIR__.'/../../Transformer/Resources/images/';
        return $this->getImageData($base.$imageName);
    }

    public function gerarPara($codigo) : string
    {
        $cbinicio = "NNNN";
        $cbfinal = "WNN";
        $cbnumeros = array("NNWWN", "WNNNW", "NWNNW", "WWNNN", "NNWNW", "WNWNN", "NWWNN", "NNNWW", "WNNWN", "NWNWN");
        if (is_numeric($codigo)&(!(strlen($codigo)&1))) {
            $cbresult = '';
            for ($i = 0; $i < strlen($codigo); $i = $i+2) {
                $cbvar1 = $cbnumeros[$codigo[$i]];
                $cbvar2 = $cbnumeros[$codigo[$i+1]];
                for ($j = 0; $j <= 4; $j++) {
                    $cbresult .= $cbvar1[$j].$cbvar2[$j];
                }
            }

            return $this->pintarBarras($cbinicio.$cbresult.$cbfinal, 55, 1.0);
        }

        return $this->pintarBarras('');
    }

    public function pintarbarras($mapaI25, $altura, $espmin) : string
    {
        $espmin--;
        if ($espmin < 0) {
            $espmin = 0;
        }

        if ($altura < 8) {
            $altura = 8;
        }
        $largura = (strlen($mapaI25)/5*((($espmin+1)*3)+(($espmin+3)*2)))+20;
        $im = imagecreate($largura, $altura);
        imagecolorallocate($im, 255, 255, 255);
        $spH = 10;
        for ($k = 0; $k < strlen($mapaI25); $k++) {
            if (!($k&1)) {
                $corbarra = ImageColorAllocate($im, 0, 0, 0);
            } else {
                $corbarra = ImageColorAllocate($im, 255, 255, 255);
            }

            if ($mapaI25[$k] == 'N') {
                ImageFilledRectangle($im, $spH, $altura-3, $spH+$espmin, 2, $corbarra);
                $spH = $spH+$espmin+1;
            } else {
                ImageFilledRectangle($im, $spH, $altura-3, $spH+$espmin+2, 2, $corbarra);
                $spH = $spH+$espmin+3;
            }
        }

        ob_start();
        imagepng($im);
        $image_data = ob_get_contents();
        ob_end_clean();

        $base64 = 'data:image/' . 'png' . ';base64,' . base64_encode($image_data);
        return "<img style='margin-left: -10px;' src='".$base64."' alt='Código de barras' />";
    }
}
