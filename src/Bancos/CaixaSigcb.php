<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\{Boleto, Beneficiario};
use BoletoBancario\Bancos\Gerador\{GeradorLinhaDigitavel};
use BoletoBancario\Bancos\CodigoDeBarraBuilder;
use BoletoBancario\Calculos\{ VerificadorNossoNumero };
use BoletoBancario\Exception\IllegalArgumentException;

class CaixaSigcb extends AbstractBanco
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
        return 'caixasigcb';
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
        $campoLivre .= str_pad($this->nossoNumero1, 3, 0, STR_PAD_LEFT);
        $campoLivre .= str_pad($this->nossoNumeroConst1, 1, 0, STR_PAD_LEFT);
        $campoLivre .= str_pad($this->nossoNumero2, 3, 0, STR_PAD_LEFT);
        $campoLivre .= str_pad($this->nossoNumeroConst2, 1, 0, STR_PAD_LEFT);
        $campoLivre .= str_pad($this->nossoNumero3, 9, 0, STR_PAD_LEFT);
        $campoLivre .= (new VerificadorNossoNumero)->calc($campoLivre);

        if($beneficiario->getCarteira() != "RG" && $beneficiario->getCarteira() != "SR") {
            throw new IllegalArgumentException("A carteira digitada não é suportada: ".$carteira);
        }

        $codigoDeBarras = (new CodigoDeBarraBuilder($boleto))->comCampoLivre($campoLivre);

        if($generateImage)
            return $this->geraImagemCodigoDeBarras($codigoDeBarras);

        return $codigoDeBarras;
    }

    public function getNossoNumeroFormatado(Beneficiario $beneficiario) : string
    {
		return str_pad($beneficiario->getNossoNumero()[0], 17, STR_PAD_LEFT);
    }

    public function getCampoLivreDv(Beneficiario $beneficiario) : string
    {
        $verificador = new VerificadorNossoNumero;
        return $verificador->calc($this->getCampoLivre($beneficiario));
    }

    public function getCampoLivreComDv(Beneficiario $beneficiario) : string
    {
        return $this->getCampoLivre($beneficiario).$this->getCampoLivreDv($beneficiario);
    }

    public function getCarteiraFormatado(Beneficiario $beneficiario) : string
    {
		return str_pad($beneficiario->getCarteira(),2, STR_PAD_LEFT);
	}

    public function getNumeroConvenioFormatado(Beneficiario $beneficiario) : string
    {
        if ($this->convenioAntigo($beneficiario->getNumeroConvenio()))
			return str_pad($beneficiario->getNumeroConvenio(), 6, STR_PAD_LEFT);

		return str_pad($beneficiario->getNumeroConvenio(), 7, STR_PAD_LEFT);
    }

    /**
     * @param int $nossoNumero1
     * @return CaixaSigcb
     */
    public function comNossoNumero1($nossoNumero1) : CaixaSigcb
    {
        $this->nossoNumero1 = $nossoNumero1;
        return $this;
    }

    /**
     * @param int $nossoNumero2
     * @return CaixaSigcb
     */
    public function comNossoNumero2($nossoNumero2) : CaixaSigcb
    {
        $this->nossoNumero2 = $nossoNumero2;
        return $this;
    }

    /**
     * @param int $nossoNumero3
     * @return CaixaSigcb
     */
    public function comNossoNumero3($nossoNumero3) : CaixaSigcb
    {
        $this->nossoNumero3 = $nossoNumero3;
        return $this;
    }

    /**
     * @param int $nossoNumeroConst1
     * @return CaixaSigcb
     */
    public function comNossoNumeroConst1($nossoNumeroConst1) : CaixaSigcb
    {
        $this->nossoNumeroConst1 = $nossoNumeroConst1;
        return $this;
    }

    /**
     * @param int $nossoNumeroConst2
     * @return CaixaSigcb
     */
    public function comNossoNumeroConst2($nossoNumeroConst2) : CaixaSigcb
    {
        $this->nossoNumeroConst2 = $nossoNumeroConst2;
        return $this;
    }

}
