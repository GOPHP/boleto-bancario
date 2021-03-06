<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\Boleto;
use BoletoBancario\Beneficiario;
use BoletoBancario\Bancos\Gerador\GeradorLinhaDigitavel;
use BoletoBancario\Bancos\CodigoDeBarraBuilder;
use BoletoBancario\Calculos\VerificadorNossoNumero;

class Bradesco extends AbstractBanco
{

    private $nossoNumero1;
    private $nossoNumero2;
    private $nossoNumero3;

    private $nossoNumeroConst1;
    private $nossoNumeroConst2;

    public function __construct()
    {
        $this->codigobanco = "104";
        $this->nummoeda = "0";
        $this->codigoBancoComDv = "104-0";
    }

    /**
     * Retorna o número desse banco, formatado com 3 dígitos
     *
     * @return string numero formatado
     */
    public function getNumeroBancoFormatado() : string
    {
        return $this->codigobanco;
    }

    /**
     *  Pega nome de template de boleto de banco
     */
    public function getTemplateName() : string
    {
        return 'bradesco';
    }

    //BOLETO
    /**
     * Linha digitável formatada
     * @param Boleto $boleto
     * @return string linha digitável
     */
    public function getLinhaDigitavel(Boleto $boleto) : string
    {
        $linha = $this->geraCodigoDeBarrasPara($boleto);
        return (new GeradorLinhaDigitavel())->geraLinhaDigitavelPara($linha);
    }


    /**
     * @param Boleto $boleto
     * @param bool $generateImage
     * @return string
     */
    public function geraCodigoDeBarrasPara(Boleto $boleto, bool $generateImage = false) : string
    {
        $beneficiario = $boleto->getBeneficiario();
        $campoLivre = '';
        $carteira = $boleto->getCarteira();

        $nossoNumeroCompleto = $this->getNossoNumeroFormatado($beneficiario);
        $campoLivre .= $beneficiario->getConta().$beneficiario->getContaDv();

        $campoLivre .= str_pad(substr($nossoNumeroCompleto, 2, 3), 3, 0, STR_PAD_LEFT);
        $campoLivre .= str_pad(substr($nossoNumeroCompleto, 0, 1), 1, 0, STR_PAD_LEFT);
        $campoLivre .= str_pad(substr($nossoNumeroCompleto, 5, 3), 3, 0, STR_PAD_LEFT);
        $campoLivre .= str_pad(substr($nossoNumeroCompleto, 1, 1), 1, 0, STR_PAD_LEFT);
        $campoLivre .= str_pad(substr($nossoNumeroCompleto, 8), 9, 0, STR_PAD_LEFT);

        $campoLivre .= (new VerificadorNossoNumero)->calc($campoLivre);

        $this->codigoDeBarrasBuilder = new CodigoDeBarraBuilder($boleto);
        $codigoDeBarras = $this->codigoDeBarrasBuilder->comCampoLivre($campoLivre);

        if ($generateImage) {
            return $this->geraImagemCodigoDeBarras($codigoDeBarras);
        }
        return $codigoDeBarras;
    }

    public function getNossoNumeroFormatado(Beneficiario $beneficiario) : string
    {
        return str_pad($beneficiario->getNossoNumero()[0], 11, 0, STR_PAD_LEFT);
    }

    public function getCarteiraFormatado(Beneficiario $beneficiario) : string
    {
        return str_pad($beneficiario->getCarteira(), 2, 0, STR_PAD_LEFT);
    }

    public function getNumeroConvenioFormatado(Beneficiario $beneficiario) : string
    {
        return str_pad($beneficiario->getNumeroConvenio(), 7, 0, STR_PAD_LEFT);
    }

    public function getDigitoNossoNumeroFormatado(Beneficiario $beneficiario) : string
    {
        $nossoNumero = $this->getNossoNumeroFormatado($beneficiario);
        return (new VerificadorNossoNumero)->calc($nossoNumero);
    }

    /**
     * @param int $nossoNumero1
     * @return Bradesco
     */
    public function comNossoNumero1($nossoNumero1) : Bradesco
    {
        $this->nossoNumero1 = $nossoNumero1;
        return $this;
    }

    /**
     * @param int $nossoNumero2
     * @return Bradesco
     */
    public function comNossoNumero2($nossoNumero2) : Bradesco
    {
        $this->nossoNumero2 = $nossoNumero2;
        return $this;
    }

    /**
     * @param int $nossoNumero3
     * @return Bradesco
     */
    public function comNossoNumero3($nossoNumero3) : Bradesco
    {
        $this->nossoNumero3 = $nossoNumero3;
        return $this;
    }

    /**
     * @param int $nossoNumeroConst1
     * @return Bradesco
     */
    public function comNossoNumeroConst1($nossoNumeroConst1) : Bradesco
    {
        $this->nossoNumeroConst1 = $nossoNumeroConst1;
        return $this;
    }

    /**
     * @param int $nossoNumeroConst2
     * @return Bradesco
     */
    public function comNossoNumeroConst2($nossoNumeroConst2) : Bradesco
    {
        $this->nossoNumeroConst2 = $nossoNumeroConst2;
        return $this;
    }
}
