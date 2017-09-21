<?php
namespace BoletoBancario;

use BoletoBancario\Exception\IllegalArgumentException;
use BoletoBancario\Calculos\FormataNumero;
use BoletoBancario\Calculos\VerificadorNossoNumero;
use BoletoBancario\Calculos\VerificadorBeneficiario;

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
        $this->codigoBeneficiario = $codigoBenficiario;
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
        if (count($nossoNumero) != 3 && count($nossoNumero) != 1) {
            throw new IllegalArgumentException("É necessário nosso numero 1, 2 e 3");
        }
        $this->nossoNumero = $nossoNumero;
        return $this;
    }

    public function getNossoNumeroConst() : array
    {
        return $this->nossoNumeroConst ?? [];
    }

    public function comNossoNumeroConst(string ...$nossoNumeroConst) : Beneficiario
    {
        if (count($nossoNumeroConst) != 2) {
            throw new IllegalArgumentException("É necessário dois numeros const");
        }
        $this->nossoNumeroConst = $nossoNumeroConst;
        return $this;
    }

    public function getDigitoNossoNumero() : string
    {
        if (! $this->digitoNossoNumero) {
            $this->digitoNossoNumero = (new VerificadorNossoNumero)->calc($this->getNossoNumero()[0]);
        }
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
        $this->conta = $formata->calc($conta, 6, 0);
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

    private function getAgenciaCodigo() : string
    {
        return sprintf(
            "%d/%s-%d",
            $this->agencia,
            $this->codigoBeneficiario,
            $this->digitoCodigoBeneficiario
        );
    }

    public function toArray() : array
    {
        return [
            'agencia' => $this->agencia,
            'digitoAgencia' => $this->digitoAgencia,
            'agenciaCodigo' => $this->getAgenciaCodigo(),
            'codigoBeneficiario' => $this->codigoBeneficiario,
            'digitoCodigoBeneficiario' => $this->digitoCodigoBeneficiario,
            'carteira' => $this->carteira,
            'nossoNumeroConst' => $this->nossoNumeroConst,
            'nomeBeneficiario' => $this->nomeBeneficiario,
            'documento'  => $this->documento,
            'numeroConvenio' => $this->numeroConvenio,
            'endereco' => $this->endereco->toArray()
        ];
    }
}
