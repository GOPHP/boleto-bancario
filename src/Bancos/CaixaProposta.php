<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\{Boleto, Beneficiario};
use BoletoBancario\Bancos\Gerador\GeradorLinhaDigitavel;
use BoletoBancario\Bancos\CodigoDeBarraBuilder;
use BoletoBancario\Calculos\VerificadorNossoNumero;
use BoletoBancario\Exception\IllegalArgumentException;

class CaixaProposta extends AbstractBanco
{
    private $campoLivreDv;

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
        return 'caixaproposta';
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
    public function geraCodigoDeBarrasPara(Boleto $boleto,  bool $generateImage = false) : string
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

        $this->campoLivreDv = (new VerificadorNossoNumero)->calc($campoLivre);

        $campoLivre .= $this->campoLivreDv;

        if ($beneficiario->getCarteira() != "RG" && $beneficiario->getCarteira() != "SR") {
            throw new IllegalArgumentException("A carteira digitada não é suportada: ".$carteira);
        }

        $this->codigoDeBarrasBuilder = new CodigoDeBarraBuilder($boleto);

        $codigoDeBarras = $this->codigoDeBarrasBuilder->comCampoLivre($campoLivre);

        if ($generateImage)
            return $this->geraImagemCodigoDeBarras($codigoDeBarras);

        return $codigoDeBarras;
    }

    public function getCampoLivreDv()
    {
        return $this->campoLivreDv;
    }

    public function getNossoNumeroFormatado(Beneficiario $beneficiario) : string
    {
        return str_pad($beneficiario->getNossoNumero()[0], 17, 0, STR_PAD_LEFT);
    }

    public function getDigitoNossoNumeroFormatado(Beneficiario $beneficiario) : string
    {
        $nossoNumero = $this->getNossoNumeroFormatado($beneficiario);
        return (new VerificadorNossoNumero)->calc($nossoNumero);
    }

    public function getCarteiraFormatado(Beneficiario $beneficiario) : string
    {
        return str_pad($beneficiario->getCarteira(), 2, 0, STR_PAD_LEFT);
    }

    public function getNumeroConvenioFormatado(Beneficiario $beneficiario) : string
    {
        if ($this->convenioAntigo($beneficiario->getNumeroConvenio()))
            return str_pad($beneficiario->getNumeroConvenio(), 6, 0, STR_PAD_LEFT);

        return str_pad($beneficiario->getNumeroConvenio(), 7, 0, STR_PAD_LEFT);
    }


}
