<?php
namespace BoletoBancario\Transformer;

use BoletoBancario\Boleto;
use BoletoBancario\Utils\ImageTrait;

class TransformerBoletoHtml
{

    use ImageTrait;

    public function getImage($name) : string
    {
        return $this->getImageData(__DIR__."/Resources/images/".$name);
    }

    public function gera(Boleto $boleto) : string
    {
        $params = $boleto->toArray();
        $templateName = $boleto->getBanco()->getTemplateName().".php";

        ob_start();
        extract($params);
        require_once __DIR__."/Resources/templates/".$templateName;
        $result = ob_get_clean();

        return $result;
    }

}
