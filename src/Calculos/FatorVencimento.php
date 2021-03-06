<?php
namespace BoletoBancario\Calculos;

use DateTime;

class FatorVencimento
{
    public function calc($data, $baseData = "07/10/1997") : string
    {
        if ($data != "") {
            $date     = $data instanceof DateTime ? $data : DateTime::createFromFormat("d/m/Y", $data);
            $dateBase = \DateTime::createFromFormat("d/m/Y", $baseData);
            $diff     = $dateBase->diff($date);
            return $diff->format("%a");
        } else {
            return "0000";
        }
    }
}
