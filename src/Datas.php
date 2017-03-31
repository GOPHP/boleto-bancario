<?php
namespace BoletoBancario;

class Datas
{

    private $documento;
    private $processamento;
    private $vencimento;

    public function getDocumento() : \DateTime
    {
        $this->documento = $this->documento ?? new \DateTime;
        return $this->documento;
    }

    public function comDocumentoDateTime(\DateTime $documento) : Datas
    {
        $this->documento = $documento;
        return $this;
    }

    public function comDocumento(integer $dia, integer $mes, integer $ano) : Datas
    {
        $this->documento = $this->dataPara($dia, $mes, $ano);
        return $this;
    }

    public function getProcessamento() : \DateTime
    {
        $this->processamento = $this->processamento ?? new \DateTime;
        return $this->processamento;
    }

    public function comProcessamentoDateTime(\DateTime $processamento) : Datas
    {
        $this->processamento = $processamento;
        return $this;
    }

    public function comProcessamento(integer $dia, integer $mes, integer $ano) : Datas
    {
        $this->processamento = $this->dataPara($dia, $mes, $ano);
        return $this;
    }

    public function getVencimento() : \DateTime
    {
        $this->vencimento = $this->vencimento ?? new \DateTime;
        return $this->vencimento;
    }

    public function comVencimentoDateTime(\DateTime $vencimento) : Datas
    {
        $this->vencimento = $vencimento;
        return $this;
    }

    public function comVencimento(integer $dia, integer $mes, integer $ano) : Datas
    {
        $this->vencimento = $this->dataPara($dia, $mes, $ano);
        return $this;
    }

    private function dataPara(integer $dia, integer $mes, integer $ano) : \DateTime
    {
        return \DateTime::createFromFormat("d m Y", $dia." ".$mes." ".$ano);
    }

}
