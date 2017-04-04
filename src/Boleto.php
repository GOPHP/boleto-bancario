<?php
namespace BoletoBancario;

use BoletoBancario\Exception\{IllegalArgumentException, UnsupportedOperationException};
use BoletoBancario\Calculos\{ FormataNumero, VerificadorBarra };

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
    protected $lcaisDePagamento;


    /**
	 * @return novo Boleto com valores default de especieMoeda R$,
	 * código de espécie moeda 9 (real), aceite false e espécie DV
	 */
	public static function novoBoleto() : Boleto
    {
		return (new static())->comEspecieMoeda("R$")
			->comCodigoEspecieMoeda(9)
			->comAceite(false)->comEspecieDocumento("DV");
	}

    /**
	 * @return aceite do boleto que por default sempre é false
	 */
	public function getAceite() : bool
    {
		return $this->aceite;
	}

	/**
	 * @param aceite que será associado ao boleto
	 * @return este boleto
	 */
	public function comAceite(bool $aceite) : Boleto
    {
		$this->aceite = $aceite;
		return $this;
	}

	/**
	 * @return datas do boleto
	 * @see Datas
	 */
	public function getDatas() : Datas
    {
		return $this->datas;
	}

	/**
	 * @param datas que serão associadas ao boleto
	 * @return este boleto
	 */
	public function comDatas(Datas $datas) : Boleto
    {
		$this->datas = $datas;
		return $this;
	}

	/**
	 * @return espécie do documento do boleto que por default sempre é "DV"
	 */
	public function getEspecieDocumento() : string
    {
		return $this->especieDocumento;
	}

	/**
	 * @param especieDocumento que será associado ao boleto.
	 * @return este boleto
	 */
	public function comEspecieDocumento(string $especieDocumento) : Boleto
    {
		$this->especieDocumento = $especieDocumento;
		return $this;
	}

	/**
	 * @return número do documento. Código informado pelo banco
	 */
	public function getNumeroDoDocumento() : string
    {
		return $this->numeroDocumento;
	}

	/**
	 * @param numeroDocumento que será associado ao boleto
	 * @return este boleto
	 */
	public function comNumeroDoDocumento(string $numeroDocumento) : Boleto
    {
		$this->numeroDocumento = $numeroDocumento;
		return $this;
	}

	/**
	 * @return quantidade da moeda
	 */
	public function getQuantidadeDeMoeda() : float
    {
		return $this->quantidadeMoeda;
	}

	/**
	 * @param quantidadeMoeda que será associada ao boleto
	 * @return este boleto
	 */
	public function comQuantidadeMoeda(float $quantidadeMoeda) : Boleto
    {
		$this->quantidadeMoeda = $quantidadeMoeda;
		return $this;
	}

	/**
	 * @return valor desse boleto
	 */
	public function getValorBoleto() : string
    {
		return $this->valorBoleto;
	}

    /**
	 * @return valor desse boleto
	 */
	public function getValor() : float
    {
		return $this->valor;
	}


	/**
	 * @param valor em double que após ser convertido pra String
	 * será associado ao boleto @see Boleto#comValorBoleto(String)
	 *
	 * @return this
	 */

	public function comValorBoleto(float $valor) : Boleto
    {
        $this->valor = number_format($valor, 2, ',', '.');
        $this->valorBoleto = (new FormataNumero)->calc(number_format($valor, 2, ',', ''), 10, 0, FormataNumero::FORMATO_VALOR);
        return $this;
	}

    public function getValorBoletoFormatado()
    {
        return (new FormataNumero)->calc($this->valorBoleto, 10, 0, FormataNumero::FORMATO_VALOR);
    }

	/**
	 * @return espécie da moeda que por default é "R$"
	 */
	public function getEspecieMoeda() : string
    {
		return $this->especieMoeda;
	}

	/**
	 * @param especieMoeda que será associada ao boleto
	 * @return este boleto
	 */
	public function comEspecieMoeda(string $especieMoeda)
    {
		$this->especieMoeda = $especieMoeda;
		return $this;
	}

	/**
	 * @return código da espécie da moeda que por default é "9" (real)
	 */
	public function getCodigoEspecieMoeda() : int
    {
		return $this->codigoEspecieMoeda;
	}

	/**
	 * @param codigoEspecieMoeda que será associado ao boleto
	 * @return este boleto
	 */
	public function comCodigoEspecieMoeda(int $codigoEspecieMoeda) : Boleto
    {
		$this->codigoEspecieMoeda = $codigoEspecieMoeda;
		return $this;
	}

	/**
	 * @return valor da moeda
	 */
	public function getValorMoeda() : float
    {
		return $this->valorMoeda;
	}

	/**
	 * @param valorMoeda que será associado ao boleto
	 * @return this
	 */
	public function comValorMoeda(float $valorMoeda) : Boleto
    {
		$this->valorMoeda = $valorMoeda;
		return $this;
	}

	/**
	 * @return banco do boleto
	 */
	public function getBanco() : Banco
    {
		return $this->banco;
	}

	/**
	 * @param banco que será associado ao boleto
	 * @return este boleto
	 */
	public function comBanco(Banco $banco) : Boleto
    {
		$this->banco = $banco;
		return $this;
	}

	/**
	 * @return pagador do banco
	 */
	public function getPagador() : Pagador
    {
		return $this->pagador;
	}

	/**
	 * @param pagador que será associado ao boleto
	 * @return este boleto
	 */
	public function comPagador(Pagador $pagador) : Boleto
    {
		$this->pagador = $pagador;
		return $this;
	}

	public function getBeneficiario() : Beneficiario
    {
		return $this->beneficiario;
	}

	/**
	 * Beneficiário do boleto
	 * @param beneficiario beneficiário do Boleto
	 * @return this este boleto.
	 */
	public function comBeneficiario(Beneficiario $beneficiario) : Boleto
    {
		$this->beneficiario = $beneficiario;
		return $this;
    }

    /**
	 * @return lista de instruções do boleto
	 */
	public function getInstrucoes() : array
    {
		return $this->instrucoes;
	}

	/**
	 * @param instrucoes que serão associadas ao boleto (limite de 5)
	 * @throws IllegalArgumentException caso tenha mais de 5 instruções
	 * @return este boleto
	 */
	public function comInstrucoes(string ...$instrucoes) : Boleto
    {
		if (count($instrucoes) > 5)
			throw new IllegalArgumentException("maximo de 5 instrucoes permitidas");

		$this->instrucoes = $instrucoes;
		return $this;
	}

	/**
	 * @return lista de descrições do boleto. <br>
	 * Note que esse campo não aparece no boleto gerado em PNG
	 */
	public function getDescricoes() : array
    {
		return $this->descricoes;
	}

	/**
	 * @param descricoes que serão asociadas ao boleto (limite de 5)
	 * <br> Note que esse campo não aparece no boleto gerado em PNG
	 * @throws IllegalArgumentException caso tenha mais de 5 descrições
	 * @return este boleto
	 */
	public function comDescricoes(string ...$descricoes) : Boleto
    {
		if (count($descricoes) > 5)
			throw new IllegalArgumentException("maximo de 5 descricoes permitidas");

		$this->descricoes = $descricoes;
		return $this;
	}

    /**
     * @param descricao que será adicionada à lista de descricoes do boleto
     * <br> Note que esse campo não aparece no boleto gerado em PNG
     * @throws IllegalArgumentException caso a descrição seja nula
     * @throws UnsupportedOperationException caso a lista de descrições tenha 5 descrições
     * @return este boleto
     */
    public function comDescricao(string $descricao) : Boleto
    {
        if($descricao == null)
            throw new IllegalArgumentException("nao e permitida descricao nula");

        if(count($this->descricoes) == 5)
            throw new UnsupportedOperationException("maximo de descricoes permitidas atingido");

        $this->descricoes[] = descricao;

        return $this;
    }

	/**
	 * @return lista de locais de pagamento do boleto
	 */
	public function getLocaisDePagamento() : array
    {
		return $this->locaisDePagamento;
	}

	/**
	 * @param locaisDePagamento que serão associados ao boleto (limite de 2 locais)
	 * @throws IllegalArgumentException tiver mais de 2 locais de pagamento
	 * @return este boleto
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
	 * @return fator de vencimento do boleto. Utilizado para geração do código de barras
	 */
	public function getFatorVencimento() : string
    {
        $fatorVencimento = new \BoletoBancario\Calculos\FatorVencimento();
        return $fatorVencimento->calc($this->datas->getVencimento());
	}

	/**
	 * @return valor do boleto formatado (com 10 digitos)
	 */
	public function getValorFormatado() : string
    {
		$valor = sprintf("%011.2f", $this->getValorBoleto());
        return preg_replace("[^0-9]", "", $valor);
	}

	/**
	 * @return número do documento formatado (com 4 digitos)
	 */
	public function getNumeroDoDocumentoFormatado() : string
    {
		return str_pad($this->numeroDocumento, 4, "0", STR_PAD_LEFT);
	}

	/**
	 * @return agencia e codigo beneficiario (conta corrente) do banco
	 */
	public function getAgenciaECodigoBeneficiario() : string
    {
		return $this->banco->getAgenciaECodigoBeneficiario($this->beneficiario);
	}

	/**
	 * @return nosso numero e codigo do documento para boleto
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

	public function comValorMulta(float $valorMulta) : Boleto {
		$this->valorMulta = $valorMulta;
		return $this;
	}

	public function getValorAcrescimos() : float
    {
		return $valorAcrescimos;
	}

	public function comValorAcrescimos(float $valorAcrescimos) : Boleto {
		$this->valorAcrescimos = $valorAcrescimos;
		return $this;
	}

	public function getValorCobrado() : flaot
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
		return $this->banco->geraCodigoDeBarrasPara($this->banco->getLinha($this));
	}

	/**
	 * Carteira do boleto
	 * @return carteira
	 */
	public function getCarteira() : string
    {
		return $this->banco->getCarteiraFormatado($this->beneficiario);
	}

	/**
	 * Local de Pagamento
	 * @return local de pagamento
	 */
	public function getLocalDePagamento() : string
    {
		return $this->locaisDePagamento ? "" : locaisDePagamento[0];
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
            'nossoNumero' => $this->banco->getNNum($this->getBeneficiario()),
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
