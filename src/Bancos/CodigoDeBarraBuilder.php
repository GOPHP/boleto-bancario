<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\Boleto;
use BoletoBancario\Calculos\ModuloOnze;
use BoletoBancario\Exception\CriacaoBoletoException;

class CodigoDeBarraBuilder
{
    private $codigoDeBarras;
    private $boleto;
    private $digitoBoleto;

    public function __construct(Boleto $boleto)
    {
        $this->boleto = $boleto;
        $this->codigoDeBarras = '';
    }

    public function comCampoLivre($campoLivre)
    {
        $this->codigoDeBarras .= $this->boleto->getBanco()->getNumeroBancoFormatado();
        $this->codigoDeBarras .= $this->boleto->getBanco()->getNumMoeda();
        $this->codigoDeBarras .= $this->boleto->getDatas()->getFatorVencimento();
        $this->codigoDeBarras .= $this->boleto->getValorFormatado();
        $this->codigoDeBarras .= $campoLivre;
        $this->digitoBoleto = (new ModuloOnze())->calc($this->codigoDeBarras);
        $this->codigoDeBarras = $this->insert($this->codigoDeBarras, $this->digitoBoleto, 4);

        $this->validaTamahoDoCodigoDeBarrasCompletoGerado();

        return $this->codigoDeBarras;
    }

    public function getDigitoBoleto()
    {
        return $this->digitoBoleto;
    }

    private function insert($string, $stringInsert, $pos)
    {
        return substr($string, 0, $pos) . $stringInsert . substr($string, $pos);
    }

	private function validaTamahoDoCodigoDeBarrasCompletoGerado() {
		if (strlen($this->codigoDeBarras) != 44) {
			throw new CriacaoBoletoException("Erro na geração do código " .
				"de barras. Número de digitos diferente de 44. Verifique ".
				"se todos os dados foram preenchidos corretamente.");
		}
	}
}
