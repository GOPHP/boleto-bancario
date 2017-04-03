<?php
namespace BoletoBancario\Utils;

trait ImageTrait
{

    private function getImageData( $pathImage ) : string
    {
        $type = pathinfo($pathImage, PATHINFO_EXTENSION);
        $data = file_get_contents($pathImage);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

}
