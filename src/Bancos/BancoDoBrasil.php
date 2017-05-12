<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\{Boleto, Beneficiario};
use BoletoBancario\Bancos\Gerador\{GeradorLinhaDigitavel};
use BoletoBancario\Calculos\{ FormataNumero, VerificadorNossoNumero };
use BoletoBancario\Exception\CriacaoBoletoException;

/**
 * @package Bancos
 */
class BancoDoBrasil extends AbstractBanco
{
    use \BoletoBancario\Calculos\CodigoBancoComDv;

    const ZEROS_CONVENIOS_NOVOS = "000000";
	const TIPO_MODALIDADE_COBRANCA_CARTEIRA_SEM_REGISTRO = "21";

    public function __construct()
    {
        $this->codigobanco = "001";
        $this->nummoeda = 9;
        $this->codigoBancoComDv = "001-9";
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
     * @return string
     */
    public function getTemplateName() : string
    {
        return 'bancodobrasil';
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
     * Metodo mais importante, responsavel por gerar campo livre para
     * codigo de barras
     * @param Boleto $boleto
     * @param bool $generateImage
     * @return string
     */
    public function geraCodigoDeBarrasPara(Boleto $boleto, bool $generateImage = false) : string
    {
        $beneficiario = $boleto->getBeneficiario();
        $carteira= $beneficiario->getCarteira();
        $formata = new FormataNumero;
        $campoLivre = "";

        if ( $this->convenioAntigo($beneficiario->getNumeroConvenio())) {
            if($beneficiario->getCarteira() == "16" || $beneficiario->getCarteira() == "18") {
                $campoLivre .= $this->getNumeroConvenioFormatado($beneficiario);
                $campoLivre .= $this->getNossoNumeroFormatado($beneficiario);
                $campoLivre .= self::TIPO_MODALIDADE_COBRANCA_CARTEIRA_SEM_REGISTRO;
            } else {
                $campoLivre .= $this->getNossoNumeroFormatado($beneficiario);
                $campoLivre .= $beneficiario->getAgenciaFormatada();
                $campoLivre .= $beneficiario->getCodigoBeneficiario();
                $campoLivre .= $this->getCarteiraFormatado($beneficiario);
            }
        } else if ($beneficiario->getCarteira() == "17" || $beneficiario->getCarteira() == "18") {
            $campoLivre .= self::ZEROS_CONVENIOS_NOVOS;
            $campoLivre .= $this->getNumeroConvenioFormatado($beneficiario);
            $campoLivre .= $this->getNossoNumeroParaCarteiras17e18($beneficiario);
            $campoLivre .= $this->getCarteiraFormatado($beneficiario);
        } else {
            throw new CriacaoBoletoException( "Erro na geração do código de barras. Nenhuma regra se aplica. " .
					"Verifique carteira e demais dados.");
        }

        $codigoDeBarras =  (new CodigoDeBarraBuilder($boleto))->comCampoLivre($campoLivre);

        if($generateImage)
            return $this->geraImagemCodigoDeBarras($codigoDeBarras);

        return $codigoDeBarras;
    }

    /**
     * @param Beneficiario $beneficiario
     * @return string
     */
    public function getNossoNumeroFormatado(Beneficiario $beneficiario) : string
    {
        if ($beneficiario->getCarteira() == "18" || $beneficiario->getCarteira() == "16")
			return str_pad($beneficiario->getNossoNumero()[0], 17, STR_PAD_LEFT);

		return str_pad($beneficiario->getNossoNumero()[0], 11, STR_PAD_LEFT);
    }

    /**
     * @param Beneficiario $beneficiario
     * @return string
     */
    public function getCarteiraFormatado(Beneficiario $beneficiario) : string
    {
		return str_pad($beneficiario->getCarteira(), 2, STR_PAD_LEFT);
	}

    /**
     * @param Beneficiario $beneficiario
     * @return string
     */
    public function getNumeroConvenioFormatado(Beneficiario $beneficiario) : string
    {
        if ($this->convenioAntigo($beneficiario->getNumeroConvenio()))
			return str_pad($beneficiario->getNumeroConvenio(), 6, STR_PAD_LEFT);

		return str_pad($beneficiario->getNumeroConvenio(), 7, STR_PAD_LEFT);

    }

    private function convenioAntigo($convenio) : bool
    {
        return $convenio < 1000000;
    }

	private function getNossoNumeroParaCarteiras17e18(Beneficiario $beneficiario) : string
    {
		$indice = $beneficiario->getCarteira() == "17" ? 1 : 7;
		return substr($this->getNossoNumeroFormatado($beneficiario), $indice);
	}

}
