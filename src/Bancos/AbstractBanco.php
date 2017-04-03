<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\Banco;

abstract class AbstractBanco implements Banco
{

    protected $codigobanco;
    protected $nummoeda;
    protected $codigoBancoComDv;

    public function getCodigoBanco()
    {
        $this->codigobanco;
    }

    public function getNumMoeda()
    {
        return $this->nummoeda;
    }

    public function getCodigoBancoComDv()
    {
        return $this->codigoBancoComDv;
    }

    public function toArray() : array
    {
        return [

        ];
    }
}
