<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\Banco;

abstract class AbstractBanco implements Banco
{

    public function toArray() : array
    {
        return [

        ];
    }
}
