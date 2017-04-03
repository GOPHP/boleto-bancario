<?php
namespace BoletoBancario;

use BoletoBancario\Calculos\FormataNumero;
use BoletoBancario\Calculos\VerificadorBeneficiario;
use BoletoBancario\Exception\IllegalArgumentException;
use BoletoBancario\Calculos\{ FormataNumero, VerificadorNossoNumero };

class Beneficiario
{

    private $agencia;
    private $digitoAgencia;

    private $codigoBeneficiario;
    private $digitoCodigoBeneficiario;

    private $conta;
    private $contaDv;

    private $carteira;
    private $nossoNumero;
    private $nossoNumeroConst;
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

    public function getNossoNumero() : array
    {
        return $this->nossoNumero;
    }

    public function comNossoNumero(string ...$nossoNumero) : Beneficiario
    {
        if (count($nossoNumero) != 3)
            throw new IllegalArgumentException("É necessário nosso numero 1, 2 e 3");

        $this->nossoNumero = $nossoNumero;
        return $this;
    }

    public function getNossoNumeroConst() : array
    {
        return $this->nossoNumero;
    }

    public function comNossoNumero(string ...$nossoNumeroConst) : Beneficiario
    {
        if (count($nossoNumeroConst) != 2)
            throw new IllegalArgumentException("É necessário dois numeros const");

        $this->$nossoNumeroConst = $nossoNumeroConst;
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

    public function getConta() : string
    {
        return $this->conta;
    }

    public function comConta(string $conta) : Beneficiario
    {
        $formata = new FormataNumero();
        $this->conta = $formata->calc( $conta, 6, 0 );
        return $this;
    }

    public function getContaDv() : string
    {
        return $this->contaDv;
    }

    public function comContaDv(string $contadv) : Beneficiario
    {
        $verificador = new VerificadorBeneficiario();
        $this->contaDv = $verificador->calc($contadv);
        return $this;
    }

    public function getNNum() : string
    {
        $formata = new FormataNumero;

        return  $formata->calc($this->beneficiario->getNumeroConst1(), 1, 0).
                $formata->calc($this->beneficiario->getNumeroConst2(), 1, 0).
                $formata->calc($this->beneficiario->getNossoNumero1(), 3, 0).
                $formata->calc($this->beneficiario->getNossoNumero2(), 3, 0).
                $formata->calc($this->beneficiario->getNossoNumero3(), 9, 0);
    }

    public function getCampoLivre() : string
    {
        $formata = new FormataNumero;
        return $this->conta.$this->contaDv.
            $formata->calc($this->nossoNumero[0], 3, 0).
            $formata->calc($this->nossoNumeroConst[0], 1, 0).
            $formata->calc($this->nossoNumero[1], 3, 0).
            $formata->calc($this->nossoNumeroConst[1], 1, 0).
            $formata->calc($this->nossoNumero[2], 9, 0);
    }

    public function getCampoLivreDv() : string
    {
        $verificador = new VerificadorNossoNumero;
        return $verificador->calc($this->getCampoLivre());
    }

    public function getCampoLivreComDv() : string
    {
        return $this->getCampoLivre().$this->getCampoLivreDv();
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
            'nossoNumeroConst' => $htis->nossoNumeroConst,
            'digitoNossoNumero' => $this->digitoNossoNumero,
            'nomeBeneficiario' => $this->nomeBeneficiario,
            'documento'  => $this->documento,
            'numeroConvenio' => $this->numeroConvenio,
            'endereco' => $this->endereco->toArray()
        ];
    }
}
