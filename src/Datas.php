<?php
namespace BoletoBancario;

use BoletoBancario\Calculos\FatorVencimento;

class Datas
{

    private $documento;
    private $processamento;
    private $vencimento;
    private $fatorVencimento;

    /**
     * @return \DateTime Data de processamento
     */
    public function getDocumento() : \DateTime
    {
        $this->documento = $this->documento ?? new \DateTime;
        return $this->documento;
    }

    /**
     * @param \DateTime $documento
     * @return Datas
     */
    public function comDocumentoDateTime(\DateTime $documento) : Datas
    {
        $this->documento = $documento;
        return $this;
    }

    /**
     * @param int $dia
     * @param int $mes
     * @param int $ano
     * @return Datas
     */
    public function comDocumento(int $dia, int $mes, int $ano) : Datas
    {
        $this->documento = $this->dataPara($dia, $mes, $ano);
        return $this;
    }

    /**
     * @return \DateTime Data de processamento
     */
    public function getProcessamento() : \DateTime
    {
        $this->processamento = $this->processamento ?? new \DateTime;
        return $this->processamento;
    }

    /**
     * @param \DateTime $processamento
     * @return Datas
     */
    public function comProcessamentoDateTime(\DateTime $processamento) : Datas
    {
        $this->processamento = $processamento;
        return $this;
    }

    /**
     * @param int $dia
     * @param int $mes
     * @param int $ano
     * @return Datas
     */
    public function comProcessamento(int $dia, int $mes, int $ano) : Datas
    {
        $this->processamento = $this->dataPara($dia, $mes, $ano);
        return $this;
    }

    /**
     * @return \DateTime Data de vencimento
     */
    public function getVencimento() : \DateTime
    {
        $this->vencimento = $this->vencimento ?? new \DateTime;
        return $this->vencimento;
    }

    /**
     * @param \DateTime $vencimento
     * @return Datas
     */
    public function comVencimentoDateTime(\DateTime $vencimento) : Datas
    {
        $this->vencimento = $vencimento;
        $this->fatorVencimento = (new FatorVencimento)->calc($this->vencimento);
        return $this;
    }

    /**
     * @param int $dia
     * @param int $mes
     * @param int $ano
     * @return Datas
     */
    public function comVencimento(int $dia, int $mes, int $ano) : Datas
    {
        $this->vencimento = $this->dataPara($dia, $mes, $ano);
        $this->fatorVencimento = (new FatorVencimento)->calc($this->vencimento);
        return $this;
    }

    /**
     * @return string
     */
    public function getFatorVencimento() : string
    {
        return $this->fatorVencimento;
    }

    /**
     * @param int $dia
     * @param int $mes
     * @param int $ano
     * @return \DateTime
     */
    private function dataPara(int $dia, int $mes, int $ano) : \DateTime
    {
        return \DateTime::createFromFormat("d m Y", $dia." ".$mes." ".$ano);
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        return [
            'documento' => $this->documento->format("d/m/Y"),
            'vencimento' => $this->vencimento->format("d/m/Y"),
            'processado' => $this->processamento->format("d/m/Y")
        ];
    }

}
