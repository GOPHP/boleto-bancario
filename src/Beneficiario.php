<?php
namespace BoletoBancario;

class Beneficiario
{

    private $agencia;
    private $digitoAgencia;

    private $codigoBeneficiario;
    private $digitoCodigoBeneficiario;

    private $carteira;
    private $nossoNumero;
    private $digitoNossoNumero;

    private $nomeBeneficiario;
    private $documento;
    private $endereco;

    private $numeroConvenio;

    public function getAgenciaFormatada() : string
    {
        return str_pad($this->agencia, 4, STR_PAD_LEFT);
    }

    public function setAgencia() : string
    {
        return $agencia;
    }

    public function comAgencia(string $agencia) : Beneficiario
    {
        $this->agencia = $agencia;
        return $this;
    }

    public function getDigitoAgencia() : string
    {
        return $this->digitoAgencia;
    }

    public function comDigitoAgencia(string $digitoAgencia) : Beneficiario
    {
        $this->digitoAgencia = $digitoAgencia;
        return $this;
    }

    public function getCodigoBeneficiario() : string
    {
        return $this->digitoAgencia;
    }

    public function comCodigoBeneficiario(string $codigoBenficiario) : Beneficiario
    {
        $this->codigoBenficiario = $codigoBenficiario;
        return $this;
    }

    public function getDigitoCodigoBeneficiario() : string
    {
        return $this->digitoCodigoBeneficiario;
    }

    public function comDigitoCodigoBeneficiario(string $digitoCodigoBeneficiario) : Beneficiario
    {
        $this->digitoCodigoBeneficiario = $digitoCodigoBeneficiario;
        return $this;
    }

    public function getCarteira() : string
    {
        return $this->carteira;
    }

    public function comCarteira(string $carteira) : Beneficiario
    {
        $this->carteira = $carteira;
        return $this;
    }

    public function getNossoNumero() : string
    {
        return $this->nossoNumero;
    }

    public function comNossoNumero(string $nossoNumero) : Beneficiario
    {
        $this->nossoNumero = $nossoNumero;
        return $this;
    }

    public function getDigitoNossoNumero() : string
    {
        return $this->digitoNossoNumero;
    }

    public function comDigitoNossoNumero(string $digitoNossoNumero) : Beneficiario
    {
        $this->digitoNossoNumero = $digitoNossoNumero;
        return $this;
    }

    public function getNomeBeneficiario() : string
    {
        return $this->nomeBeneficiario;
    }

    public function comNomeBeneficiario(string $nomeBeneficiario) : Beneficiario
    {
        $this->nomeBeneficiario = $nomeBeneficiario;
        return $this;
    }

    public function getDocumento() : string
    {
        return $this->documento;
    }

    public function comDocumento(string $documento) : Beneficiario
    {
        $this->documento = $documento;
        return $this;
    }

    public function getEndereco() : Endereco
    {
        return $this->endereco;
    }

    public function comEndereco(Endereco $endereco) : Beneficiario
    {
        $this->endereco = $endereco;
        return $this;
    }

    public function getNumeroConvenio() : string
    {
        return $this->numeroConvenio;
    }

    public function comNumeroConvenio(string $numeroConvenio) : Beneficiario
    {
        $this->numeroConvenio = $numeroConvenio;
        return $this;
    }

    public function toArray() : array
    {
        return [
            'agencia' => $this->agencia,
            'digitoAgencia' => $this->digitoAgencia,
            'codigoBeneficiario' => $this->codigoBeneficiario,
            'digitoCodigoBeneficiario' => $this->digitoCodigoBeneficiario,
            'carteira' => $this->carteira,
            'nossoNumero' => $this->nossoNumero,
            'digitoNossoNumero' => $this->digitoNossoNumero,
            'nomeBeneficiario' => $this->nomeBeneficiario,
            'documento'  => $this->documento,
            'numeroConvenio' => $this->numeroConvenio,
            'endereco' => $this->endereco->toArray()
        ];
    }
}
