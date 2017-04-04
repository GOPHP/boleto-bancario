<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\Banco;
use BoletoBancario\Boleto;
use BoletoBancario\Bancos\Gerador\GeradorCodigoDeBarra;

abstract class AbstractBanco implements Banco
{

    protected $codigobanco;
    protected $nummoeda;
    protected $codigoBancoComDv;

    public function getCodigoBanco() : int
    {
        return $this->codigobanco;
    }

    public function getNumMoeda() : int
    {
        return $this->nummoeda;
    }

    public function getCodigoBancoComDv() : string
    {
        return $this->codigoBancoComDv;
    }

    public function geraCodigoDeBarrasPara($linha) : string
    {
        return (new GeradorCodigoDeBarra())->comLinha($linha);
    }

    public function toArray() : array
    {
        return [
            'codigo_banco' => $this->getCodigoBanco(),
            'codigo_banco_com_dv' => $this->getCodigoBancoComDv(),
            'nummoeda' => $this->getNumMoeda()
        ];
    }
}
