<?php
namespace BoletoBancario;

use BoletoBancario\Exception\UnsupportedOperationException;
use BoletoBancario\Exception\IllegalArgumentException;
use BoletoBancario\Calculos\FormataNumero;

class Boleto
{
    protected $valor = 0.0;
    protected $valorBoleto;
    protected $quantidadeMoeda;
    protected $valorMoeda;
    protected $valorDescontos;
    protected $valorDeducoes;
    protected $valorMulta;
    protected $valorAcrescimos;

    protected $espcieMoeda;
    protected $codigoEspecieMoeda;
    protected $especiDocumento;
    protected $numeroDocumento;
    protected $aceite;
    protected $banco;
    protected $datas;
    protected $pagador;
    protected $beneficiario;
    protected $instrucoes;
    protected $descricoes;
    protected $locaisDePagamento;


    /**
     * @return Boleto novo Boleto com valores default de especieMoeda R$,
     * código de espécie moeda 9 (real), aceite false e espécie DV
     */
    public static function novoBoleto() : Boleto
    {
        return (new static())->comEspecieMoeda("R$")
            ->comCodigoEspecieMoeda(9)
            ->comAceite(false)->comEspecieDocumento("DV");
    }

    /**
     * @return bool aceite do boleto que por default sempre é false
     */
    public function getAceite() : bool
    {
        return $this->aceite;
    }

    /**
     * @param bool $aceite que será associado ao boleto
     * @return Boleto este boleto
     */
    public function comAceite(bool $aceite) : Boleto
    {
        $this->aceite = $aceite;
        return $this;
    }

    /**
     * @return Datas datas do boleto
     * @see Datas
     */
    public function getDatas() : Datas
    {
        return $this->datas;
    }

    /**
     * @param Datas $datas que serão associadas ao boleto
     * @return Boleto este boleto
     */
    public function comDatas(Datas $datas) : Boleto
    {
        $this->datas = $datas;
        return $this;
    }

    /**
     * @return string espécie do documento do boleto que por default sempre é "DV"
     */
    public function getEspecieDocumento() : string
    {
        return $this->especieDocumento;
    }

    /**
     * @param string $especieDocumento que será associado ao boleto.
     * @return Boleto este boleto
     */
    public function comEspecieDocumento(string $especieDocumento) : Boleto
    {
        $this->especieDocumento = $especieDocumento;
        return $this;
    }

    /**
     * @return string número do documento. Código informado pelo banco
     */
    public function getNumeroDoDocumento() : string
    {
        return $this->numeroDocumento;
    }

    /**
     * @param string $numeroDocumento que será associado ao boleto
     * @return Boleto este boleto
     */
    public function comNumeroDoDocumento(string $numeroDocumento) : Boleto
    {
        $this->numeroDocumento = $numeroDocumento;
        return $this;
    }

    /**
     * @return float quantidade da moeda
     */
    public function getQuantidadeDeMoeda() : float
    {
        return $this->quantidadeMoeda;
    }

    /**
     * @param float $quantidadeMoeda que será associada ao boleto
     * @return Boleto este boleto
     */
    public function comQuantidadeMoeda(float $quantidadeMoeda) : Boleto
    {
        $this->quantidadeMoeda = $quantidadeMoeda;
        return $this;
    }

    /**
     * @return string valor desse boleto
     */
    public function getValorBoleto() : string
    {
        return $this->valorBoleto;
    }

    /**
     * @return float desse boleto
     */
    public function getValor() : float
    {
        return $this->valor;
    }


    /**
     * @param float $valor em double que após ser convertido pra String
     * será associado ao boleto @see Boleto#comValorBoleto(String)
     *
     * @return Boleto
     */

    public function comValorBoleto(float $valor) : Boleto
    {
        $this->valor = number_format($valor, 2, ',', '');
        $this->valorBoleto = (new FormataNumero)->calc(
            number_format($valor, 2, ',', ''),
            10,
            0,
            FormataNumero::FORMATO_VALOR
        );

        return $this;
    }

    public function getValorBoletoFormatado()
    {
        return (new FormataNumero)->calc($this->valorBoleto, 10, 0, FormataNumero::FORMATO_VALOR);
    }

    /**
     * @return string espécie da moeda que por default é "R$"
     */
    public function getEspecieMoeda() : string
    {
        return $this->especieMoeda;
    }

    /**
     * @param string $especieMoeda que será associada ao boleto
     * @return Boleto este boleto
     */
    public function comEspecieMoeda(string $especieMoeda) : Boleto
    {
        $this->especieMoeda = $especieMoeda;
        return $this;
    }

    /**
     * @return int código da espécie da moeda que por default é "9" (real)
     */
    public function getCodigoEspecieMoeda() : int
    {
        return $this->codigoEspecieMoeda;
    }

    /**
     * @param int $codigoEspecieMoeda que será associado ao boleto
     * @return Boleto este boleto
     */
    public function comCodigoEspecieMoeda(int $codigoEspecieMoeda) : Boleto
    {
        $this->codigoEspecieMoeda = $codigoEspecieMoeda;
        return $this;
    }

    /**
     * @return float valor da moeda
     */
    public function getValorMoeda() : float
    {
        return $this->valorMoeda;
    }

    /**
     * @param float $valorMoeda que será associado ao boleto
     * @return Boleto
     */
    public function comValorMoeda(float $valorMoeda) : Boleto
    {
        $this->valorMoeda = $valorMoeda;
        return $this;
    }

    /**
     * @return Banco banco do boleto
     */
    public function getBanco() : Banco
    {
        return $this->banco;
    }

    /**
     * @param Banco $banco que será associado ao boleto
     * @return Boleto este boleto
     */
    public function comBanco(Banco $banco) : Boleto
    {
        $this->banco = $banco;
        return $this;
    }

    /**
     * @return Pagador pagador do banco
     */
    public function getPagador() : Pagador
    {
        return $this->pagador;
    }

    /**
     * @param Pagador $pagador que será associado ao boleto
     * @return Boleto este boleto
     */
    public function comPagador(Pagador $pagador) : Boleto
    {
        $this->pagador = $pagador;
        return $this;
    }

    /**
     * @return Beneficiario
     */
    public function getBeneficiario() : Beneficiario
    {
        return $this->beneficiario;
    }

    /**
     * Beneficiário do boleto
     * @param Beneficiario $beneficiario do Boleto
     * @return Boleto este boleto.
     */
    public function comBeneficiario(Beneficiario $beneficiario) : Boleto
    {
        $this->beneficiario = $beneficiario;
        return $this;
    }

    /**
     * @return array lista de instruções do boleto
     */
    public function getInstrucoes() : array
    {
        return $this->instrucoes;
    }

    /**
     * @param string[] $instrucoes que serão associadas ao boleto (limite de 5)
     * @throws IllegalArgumentException caso tenha mais de 5 instruções
     * @return Boleto este boleto
     */
    public function comInstrucoes(string ...$instrucoes) : Boleto
    {
        if (count($instrucoes) > 5) {
            throw new IllegalArgumentException("maximo de 5 instrucoes permitidas");
        }
        
        $this->instrucoes = $instrucoes;
        return $this;
    }

    /**
     * @return array lista de descrições do boleto. <br>
     * Note que esse campo não aparece no boleto gerado em PNG
     */
    public function getDescricoes() : array
    {
        return $this->descricoes;
    }

    /**
     * @param string[] $descricoes que serão asociadas ao boleto (limite de 5)
     * <br> Note que esse campo não aparece no boleto gerado em PNG
     * @throws IllegalArgumentException caso tenha mais de 5 descrições
     * @return Boleto este boleto
     */
    public function comDescricoes(string ...$descricoes) : Boleto
    {
        if (count($descricoes) > 5) {
            throw new IllegalArgumentException("maximo de 5 descricoes permitidas");
        }
        
        $this->descricoes = $descricoes;
        return $this;
    }

    /**
     * @param string $descricao que será adicionada à lista de descricoes do boleto
     * <br> Note que esse campo não aparece no boleto gerado em PNG
     * @throws IllegalArgumentException caso a descrição seja nula
     * @throws UnsupportedOperationException caso a lista de descrições tenha 5 descrições
     * @return Boleto este boleto
     */
    public function comDescricao(string $descricao) : Boleto
    {
        if ($descricao == null) {
            throw new IllegalArgumentException("nao e permitida descricao nula");
        }

        if (count($this->descricoes) == 5) {
            throw new UnsupportedOperationException("maximo de descricoes permitidas atingido");
        }

        $this->descricoes[] = $descricao;

        return $this;
    }

    /**
     * @return array lista de locais de pagamento do boleto
     */
    public function getLocaisDePagamento() : array
    {
        return $this->locaisDePagamento;
    }

    /**
     * @param string[] $locaisDePagamento que serão associados ao boleto (limite de 2 locais)
     * @throws IllegalArgumentException tiver mais de 2 locais de pagamento
     * @return Boleto este boleto
     */
    public function comLocaisDePagamento(string ...$locaisDePagamento) : Boleto
    {
        if (count($locaisDePagamento) > 2) {
            throw new IllegalArgumentException("maximo de 2 locais de pagamento permitidos");
        }

        $this->locaisDePagamento = $locaisDePagamento;
        return $this;
    }

    /**
     * @return string fator de vencimento do boleto. Utilizado para geração do código de barras
     */
    public function getFatorVencimento() : string
    {
        return $this->datas->getFatorVencimento();
    }

    /**
     * @return string valor do boleto formatado (com 10 digitos)
     */
    public function getValorFormatado() : string
    {
        return $this->getValorBoleto();
    }

    /**
     * @return string número do documento formatado (com 4 digitos)
     */
    public function getNumeroDoDocumentoFormatado() : string
    {
        return str_pad($this->numeroDocumento, 4, "0", STR_PAD_LEFT);
    }

    /**
     * @return string agencia e codigo beneficiario (conta corrente) do banco
     */
    public function getAgenciaECodigoBeneficiario() : string
    {
        return $this->banco->getAgenciaECodigoBeneficiario($this->beneficiario);
    }

    /**
     * @return string nosso numero e codigo do documento para boleto
     */
    public function getNossoNumeroECodDocumento() : string
    {
        return $this->banco->getNossoNumeroECodigoDocumento($this);
    }

    public function getValorDescontos() : float
    {
        return $this->valorDescontos;
    }

    public function comValorDescontos(float $valorDescontos) : Boleto
    {
        $this->valorDescontos = $valorDescontos;
        return $this;
    }

    public function getValorDeducoes() : float
    {
        return $this->valorDeducoes;
    }

    public function comValorDeducoes(float $valorDeducoes) : Boleto
    {
        $this->valorDeducoes = $valorDeducoes;
        return $this;
    }

    public function getValorMulta() : float
    {
        return $this->valorMulta;
    }

    public function comValorMulta(float $valorMulta) : Boleto
    {
        $this->valorMulta = $valorMulta;
        return $this;
    }

    public function getValorAcrescimos() : float
    {
        return $valorAcrescimos;
    }

    public function comValorAcrescimos(float $valorAcrescimos) : Boleto
    {
        $this->valorAcrescimos = $valorAcrescimos;
        return $this;
    }

    public function getValorCobrado() : float
    {
        return $this->valorBoleto - $this->valorDescontos
                                  - $this->valorDeducoes
                                  + $this->valorMulta
                                  + $this->valorAcrescimos;
    }

    /**
     * Valor numérico do código de barras
     * @return código de barras
     */
    public function getCodigoDeBarras() : string
    {
        return $this->banco->geraCodigoDeBarrasPara($this, true);
    }

    /**
     * Carteira do boleto
     * @return string carteira
     */
    public function getCarteira() : string
    {
        return $this->banco->getCarteiraFormatado($this->beneficiario);
    }

    public function getTemplateName() : string
    {
        return $this->banco->getTemplateName();
    }

    /**
     * Local de Pagamento
     * @return string local de pagamento
     */
    public function getLocalDePagamento() : string
    {
        return $this->locaisDePagamento ? "" : $this->locaisDePagamento[0];
    }

    public function toArray() : array
    {
        return [
            'aceite' => $this->aceite,
            'valor_boleto' => $this->valor,
            'valor_unitario' => 0,
            'especie' => "R$",
            'especie_doc' => $this->especiDocumento,
            'quantidade' => 0,
            'nossoNumero' => $this->banco->getNossoNumeroFormatado($this->getBeneficiario()),
            'nossoNumero_dv' => $this->banco->getDigitoNossoNumeroFormatado($this->getBeneficiario()),
            'numero_documento' => $this->numeroDocumento,
            'linha_digitavel' => $this->banco->getLinhaDigitavel($this),
            'codigo_barras' => $this->getCodigoDeBarras(),
            'identificacao' => 'BoletoBancario GOPHP',
            'instrucoes' => $this->instrucoes,
            'descricoes' => $this->descricoes,
            'beneficiario' => $this->beneficiario->toArray(),
            'pagador'      => $this->pagador->toArray(),
            'datas'        => $this->datas->toArray(),
            'banco'        => $this->banco->toArray()
        ];
    }
}
