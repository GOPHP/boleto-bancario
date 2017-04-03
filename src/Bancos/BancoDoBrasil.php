<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\Banco;

class BancoDoBrasil extends AbstractBanco
{
    use \BoletoBancario\Calculos\CodigoBancoComDv;

    private $codigobanco;
    private $nummoeda;
    private $codigoBancoComDv;

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

    public function getCodigoBancoComDv() : string
    {
        return $this->codigoBancoComDv;
    }
}
