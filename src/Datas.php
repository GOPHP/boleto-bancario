<?php
namespace BoletoBancario;

use BoletoBancario\Calculos\FatorVencimento;

class Datas
{

    private $documento;
    private $processamento;
    private $vencimento;
    private $fatorVencimento;

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

    public function comDocumento(int $dia, int $mes, int $ano) : Datas
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

    public function comProcessamento(int $dia, int $mes, int $ano) : Datas
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
        $this->fatorVencimento = (new FatorVencimento)->calc($this->vencimento);
        return $this;
    }

    public function comVencimento(int $dia, int $mes, int $ano) : Datas
    {
        $this->vencimento = $this->dataPara($dia, $mes, $ano);
        $this->fatorVencimento = (new FatorVencimento)->calc($this->vencimento);
        return $this;
    }

    public function getFatorVencimento() : string
    {
        return $this->fatorVencimento;
    }

    private function dataPara(int $dia, int $mes, int $ano) : \DateTime
    {
        return \DateTime::createFromFormat("d m Y", $dia." ".$mes." ".$ano);
    }

    public function toArray() : array
    {
        return [
            'documento' => $this->documento->format("d/m/Y"),
            'vencimento' => $this->vencimento->format("d/m/Y"),
            'processado' => $this->processamento->format("d/m/Y")
        ];
    }

}
