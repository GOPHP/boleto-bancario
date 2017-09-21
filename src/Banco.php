<?php
namespace BoletoBancario;

interface Banco
{
    /**
     * Retorna o número desse banco, formatado com 3 dígitos
     *
     * @return string numero formatado
     */
    public function getNumeroBancoFormatado() : string;

    /**
     *  Pega nome de template de boleto de banco
     * @return string
     */
    public function getTemplateName() : string;

    /**
     * Linha digitável formatada
     * @param  Boleto $boleto
     * @return string linha digitável
     */
    public function getLinhaDigitavel(Boleto $boleto) : string;

    /**
     * Gera campo livre
     * @param Boleto $boleto
     * @param bool $generateImage
     * @return string
     */
    public function geraCodigoDeBarrasPara(Boleto $boleto, bool $generateImage = false) : string;

    // /**
    //  *  Gera codigo verificador de campo livre
    //  */
    // public function getCampoLivreDv(Beneficiario $beneficiario) : string;
    //
    // /**
    //  * Gera campo livre com codigo verificador
    //  */
    // public function getCampoLivreComDv(Beneficiario $beneficiario) : string;
}
