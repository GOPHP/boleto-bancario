<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\{Boleto, Beneficiario};
use BoletoBancario\Bancos\Gerador\{GeradorLinhaDigitavel};
use BoletoBancario\Calculos\{ FormataNumero, VerificadorNossoNumero, ModuloOnze };
use BoletoBancario\Exception\CriacaoBoletoException;


class Caixa extends AbstractBanco
{

    public function __construct()
    {
        $this->codigobanco = "104";
        $this->nummoeda = "0";
        $this->codigoBancoComDv = $this->geraCodigoBanco($this->codigobanco);
    }

    /**
	 * Retorna o número desse banco, formatado com 3 dígitos
	 *
	 * @return numero formatado
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
        return 'caixa';
    }

    //BOLETO
	/**
	 * Linha digitável formatada
	 * @return linha digitável
	 */
	public function getLinhaDigitavel(Boleto $boleto) : string
    {
        $linha = $this->geraCodigoDeBarrasPara($boleto);
        return (new GeradorLinhaDigitavel())->geraLinhaDigitavelPara($linha);
	}


    public function geraCodigoDeBarrasPara(Boleto $boleto,  bool $generateImage = false) : string
    {
        $beneficiario = $boleto->getBeneficiario();
        $campoLivre = '';
        $carteira = $boleto->getCarteira();


        if ($carteira == "1") {
            $campoLivre .= $carteira;
            $campoLivre .= str_pad($beneficiario->getCodigoBeneficiario(), 6, STR_PAD_LEFT);
            $campoLivre .= $this->getNossoNumeroFormatado($beneficiario);
        } else if ($carteira == "2") {
            $nossoNumeroCompleto = $this->getNossoNumeroFormatado($beneficiario);
            $campoLivre .= str_pad($beneficiario->getCodigoBeneficiario(), 6, STR_PAD_LEFT);
            $campoLivre .= $beneficiario->getDigitoCodigoBeneficiario();
            $campoLivre .= substr($nossoNumeroCompleto, 2, 3);
            $campoLivre .= substr($nossoNumeroCompleto, 0, 1);
            $campoLivre .= substr($nossoNumeroCompleto, 5, 3);
            $campoLivre .= substr($nossoNumeroCompleto, 1, 2);
            $campoLivre .= substr($nossoNumeroCompleto, 8);
            $campoLivre .= (new ModuloOnze)->calc($campoLivre);
        }
        // Migrar função geraDigitoMod11AceitandoRestoZero()
        // else if ( $carteira == "24") {
        //     String nossoNumeroCompleto = getNossoNumeroFormatado(beneficiario);
        //     campoLivre.append(leftPadWithZeros(beneficiario.getCodigoBeneficiario(), 6));
        //     campoLivre.append(beneficiario.getDigitoCodigoBeneficiario());
        //     campoLivre.append(nossoNumeroCompleto.substring(2, 5));
        //     campoLivre.append(nossoNumeroCompleto.substring(0, 1));
        //     campoLivre.append(nossoNumeroCompleto.substring(5, 8));
        //     campoLivre.append(nossoNumeroCompleto.substring(1, 2));
        //     campoLivre.append(nossoNumeroCompleto.substring(8));
        //     campoLivre.append(geradorDeDigito.geraDigitoMod11AceitandoRestoZero(campoLivre.toString()));
        // }
        else {
            throw new IllegalArgumentException("A carteira digitada não é suportada: ".$carteira);
        }

        if($generateImage)
            return $this->geraImagemCodigoDeBarras($codigoDeBarras);

        return new CodigoDeBarrasBuilder($boleto).comCampoLivre($campoLivre);
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

}
