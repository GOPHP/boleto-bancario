<?php
namespace BoletoBancario;

interface Banco
{
    /**
	 * Retorna o número desse banco, formatado com 3 dígitos
	 *
	 * @return numero formatado
	 */
    public function getNumeroBancoFormatado() : string;

    /**
     *  Pega nome de template de boleto de banco
     */
    public function getTemplateName() : string;

    /**
	 * Linha digitável formatada
	 * @return linha digitável
	 */
	public function getLinhaDigitavel(Boleto $boleto) : string;

    /**
     * Gera nosso numero
     */
    public function getNNum(Beneficiario $beneficiario) : string;

    /**
     * Gera campo livre
     */
    public function getCampoLivre(Boleto $boleto) : string;

    /**
     *  Gera codigo verificador de campo livre
     */
    public function getCampoLivreDv(Beneficiario $beneficiario) : string;

    /**
     * Gera campo livre com codigo verificador
     */
    public function getCampoLivreComDv(Beneficiario $beneficiario) : string;
}
