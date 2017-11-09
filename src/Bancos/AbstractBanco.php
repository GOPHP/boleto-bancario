<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\Banco;
use BoletoBancario\Bancos\Gerador\GeradorCodigoDeBarra;

abstract class AbstractBanco implements Banco
{

    protected $codigobanco;
    protected $nummoeda;
    protected $codigoBancoComDv;
    protected $codigoDeBarrasBuilder;
    protected $bancoRemessaCodigo;

    public function getBancoRemessaCodigo() : string
    {
        return $this->bancoRemessaCodigo;
    }

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

    public function getDigitoBoleto()
    {
        return $this->codigoDeBarrasBuilder->getDigitoBoleto();
    }

    public function toArray() : array
    {
        return [
            'codigo_banco' => $this->getCodigoBanco(),
            'codigo_banco_com_dv' => $this->getCodigoBancoComDv(),
            'nummoeda' => $this->getNumMoeda()
        ];
    }

    protected function geraImagemCodigoDeBarras($linha) : string
    {
        return (new GeradorCodigoDeBarra())->gerarPara($linha);
    }
}
