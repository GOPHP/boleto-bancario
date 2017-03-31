<?php
namespace BoletoBancario;

interface Banco
{
    /**
	 * Retorna o número desse banco, formatado com 3 dígitos
	 *
	 * @return numero formatado
	 */
    public function getNumeroFormatado() : string;

    /**
	 * Pega a URL com a imagem de um banco
	 *
	 * @return logo do banco
	 */
    public function getImage() : string;

    /**
	 * Gera o código de barras para determinado boleto
	 * @param boleto boleto
	 * @return código de barras (texto)
	 */
    public function geraCodigoDeBarrasPara(Boleto $boleto) : string;

    public function getCodigoBeneficiarioFormatado(Beneficiario $beneficiario) : string;

	public function getCarteiraFormatado(Beneficiario $beneficiario) : string;

	public function getNossoNumeroFormatado(Beneficiario $beneficiario) : string;

	public function getAgenciaECodigoBeneficiario(Beneficiario $beneficiario) : string;

	public function getNumeroFormatadoComDigito() : string;

	public function getGeradorDeDigito() : GeradorDeDigito;

	public function getNossoNumeroECodigoDocumento(Boleto $boleto) : string;
}
