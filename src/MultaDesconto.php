<?php
namespace BoletoBancario;

class MultaDesconto
{
    private $valorMulta;
    private $valorDesconto;
    private $dataDesconto;
    private $dataMulta;
    private $diasParaBaixa;
    private $valorJuros;

    public function __construct()
    {
        $this->valorMulta = 0.00;
        $this->valorDesconto = 0.00;
        $this->dataDesconto = (new \DateTime())->format('Y-m-d');
        $this->dataMulta = (new \DateTime())->format('Y-m-d');
        $this->diasParaBaixa = 0;
        $this->valorJuros = 0.00;
    }

    public function comValorMulta(float $valorMulta)
    {
        $this->valorMulta = $valorMulta;
        return $this;
    }

    public function getValorMulta() : float
    {
        return $this->valorMulta;
    }

    public function comValorDesconto(float $valorDesconto)
    {
        $this->valorDesconto = $valorDesconto;
        return $this;
    }

    public function getValorDesconto() : float
    {
        return $this->valorDesconto;
    }

    public function comDataDesconto(\DateTime $dataDesconto)
    {
        $this->dataDesconto = $dataDesconto;
        return $this;
    }

    public function getDataDesconto()
    {
        return $this->dataDesconto;
    }

    public function comDataMulta(\DateTime $dataMulta)
    {
        $this->dataMulta = $dataMulta;
        return $this;
    }

    public function getDataMulta()
    {
        return $this->dataMulta;
    }

    public function comDiasParaBaixa(int $diasParaBaixa)
    {
        $this->diasParaBaixa = $diasParaBaixa;
        return $this;
    }

    public function getDiasParaBaixa() : int
    {
        return $this->diasParaBaixa;
    }

    public function comValorJuros(float $valorJuros)
    {
        $this->valorJuros = $valorJuros;
        return $this;
    }

    public function getValorJuros() : float
    {
        return $this->valorJuros;
    }
}
