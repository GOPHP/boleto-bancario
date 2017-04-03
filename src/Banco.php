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
	 * Pega a URL com a imagem de um banco
	 *
	 * @return logo do banco
	 */
    public function getImage() : string;

    /**
     *  Pega nome de template de boleto de banco
     */
    public function getTemplateName() : string;

    /**
	 * Gera o código de barras para determinado boleto
	 * @param boleto boleto
	 * @return código de barras (texto)
	 */
    // public function geraCodigoDeBarrasPara(Boleto $boleto) : string;
    //
	// public function getAgenciaECodigoBeneficiario(Beneficiario $beneficiario) : string;
    //
	// public function getNumeroFormatadoComDigito() : string;
    //
	// public function getGeradorDeDigito() : GeradorDeDigito;
    //
	// public function getNossoNumeroECodigoDocumento(Boleto $boleto) : string;

    /**
     * Pega do 0 ao 3 digito do codigo do banco gera o modulo onze e concatena
     * (codigo banco com dv construtor banco)
     */
    public function getCodigoBancoComDv() : string;

     //
    //  # Gera agencia fomatada com classe BoletoBancario\Calculos\FormataNumero (4, 0)
    //  $this->geraAgencia();
     //
    //  # Gera conta fomatada com classe BoletoBancario\Calculos\FormataNumero (4, 0)
    //  $this->geraConta();
     //
    //  # Gera conta DV
    //  $this->geraContaDv();
    //  $this->geraCarteira();
     //
    //  $this->geraNNum();
    //  $this->geraNossoNumeroDv();
     //
    //  $this->geraDv();
    //  $this->geraLinha();
    //  $this->geraAgenciaCodigo();
     //
    //  /** DOIS METODOS PRINCIPAIS **/
    //  $this->geraLinhaDigitavel();
    //  $this->geraCodigoDeBarras();
     //
     //
    //  $codigo_banco_com_dv - ok
    //  $beneficiario - ok
    //  $cpf_cnpj - ok
    //  $agencia_codigo - ok
    //  $endereco - ok
    //  $uf - ok
    //  $cep - ok
    //  $data_documento - ok
    //  $numero_documento - ok
    //  $aceite - ok
    //  $data_processamento - ok
    //  $nosso_numero - ok
    //  $demonstrativo1 - ok
    //  $demonstrativo2 - ok
    //  $demonstrativo3 - ok
    //  $pagador - ok
    //  $carteira - ok
    //  $valor_boleto - ok
    //  $linha_digitavel
    //  $data_vencimento - ok
    //  $especie_doc - ok
    //  $especie - ok (R$)
    //  $quantidade - ok
    //  $valor_unitario - ok
    //  $instrucoes1 - ok
    //  $instrucoes2 - ok
    //  $instrucoes3 - ok
    //  $instrucoes4 - ok
    //  $pagador - ok
    //  $pagador_documento - ok
    //  $endereco1 - ok
    //  $endereco2 - ok
     //
    //  $codigo_barras
    //  $linha_digitavel
}
