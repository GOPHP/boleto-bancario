<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\Banco;
use BoletoBancario\Boleto;
use BoletoBancario\Beneficiario;
use BoletoBancario\Bancos\Gerador\{GeradorLinhaDigitavel, GeradorCodigoDeBarra};
use BoletoBancario\Calculos\{ FormataNumero, VerificadorBarra, VerificadorNossoNumero };


class BancoDoBrasil extends AbstractBanco
{
    use \BoletoBancario\Calculos\CodigoBancoComDv;

    public function __construct()
    {
        $this->codigobanco = 1;
        $this->nummoeda = 9;
        $this->codigoBancoComDv = $this->geraCodigoBanco($this->codigobanco);
    }

    /**
	 * Retorna o número desse banco, formatado com 3 dígitos
	 *
	 * @return numero formatado
	 */
    public function getNumeroBancoFormatado() : string
    {
        return $codigobanco;
    }

    /**
	 * Pega a URL com a imagem de um banco
	 *
	 * @return logo do banco
	 */
    public function getImage() : string
    {
        return 'banco-do-brasil.png';
    }

    /**
     *  Pega nome de template de boleto de banco
     */
    public function getTemplateName() : string
    {
        return 'bancodobrasil';
    }


    //BOLETO
	/**
	 * Linha digitável formatada
	 * @return linha digitável
	 */
	public function getLinhaDigitavel(Boleto $boleto) : string
    {
        $linha = $this->getLinha($boleto);
		return (new GeradorLinhaDigitavel())->gera($linha);
	}

    public function getLinha(Boleto $boleto) : string
    {
        return  $boleto->getBanco()->getCodigoBanco().
                $boleto->getBanco()->getNumMoeda().
                $this->getDv($boleto).
                $boleto->getDatas()->getFatorVencimento().
                $boleto->getValorBoleto().
                $this->getCampoLivreComDv($boleto->getBeneficiario());
    }

    public function getDv(Boleto $boleto) : string
    {
        $dv = (new VerificadorBarra)->calc(
            $boleto->getBanco()->getCodigoBanco().
            $boleto->getBanco()->getNumMoeda().
            $boleto->getDatas()->getFatorVencimento().
            $boleto->getValorBoleto().
            $this->getCampoLivreComDv($boleto->getBeneficiario())
        );
        return $dv;
    }

    public function getNNum(Beneficiario $beneficiario) : string
    {
        $formata = new FormataNumero;
        $nossoNumero = $beneficiario->getNossoNumero();
        $nossoNumeroConst = $beneficiario->getNossoNumeroConst();
        return  $formata->calc($nossoNumeroConst[0], 1, 0).
                $formata->calc($nossoNumeroConst[1], 1, 0).
                $formata->calc($nossoNumero[0], 3, 0).
                $formata->calc($nossoNumero[1], 3, 0).
                $formata->calc($nossoNumero[2], 9, 0);
    }

    public function getCampoLivre(Beneficiario $beneficiario) : string
    {
        $nossoNumero = $beneficiario->getNossoNumero();
        $nossoNumeroConst = $beneficiario->getNossoNumeroConst();
        $formata = new FormataNumero;
        $campoLivre = $beneficiario->getConta().$beneficiario->getContaDv().
            $formata->calc($nossoNumero[0],      3, 0).
            $formata->calc($nossoNumeroConst[0], 1, 0).
            $formata->calc($nossoNumero[1],      3, 0).
            $formata->calc($nossoNumeroConst[1], 1, 0).
            $formata->calc($nossoNumero[2],      9, 0);

        return $campoLivre;
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

}
