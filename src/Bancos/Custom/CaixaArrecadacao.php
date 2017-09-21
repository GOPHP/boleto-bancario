<?php
namespace BoletoBancario\Bancos\Custom;

use BoletoBancario\Boleto;
use BoletoBancario\Bancos\Gerador\GeradorCodigoDeBarra;
use BoletoBancario\Calculos\ModuloDez;
use BoletoBancario\Calculos\ModuloOnze;
use BoletoBancario\Calculos\FormataNumero;
use BoletoBancario\Exception\IllegalArgumentException;

class CaixaArrecadacao extends Boleto
{

    protected $localPagamento;
    protected $instrucoesBoleto;
    protected $identificacaoEmpresa;
    protected $nossoNumero;
    
    protected $dvGeral;
    protected $linhaDigitavel;

    protected $identificacaoSegmento = 9;
    protected $valorEfetivoReferencia = 7;
    protected $numeroConvenio;

    const PRODUTO = 8;

    public function getLinhaDigitavel() : string
    {
        if (isset($this->linhaDigitavel) && strlen($this->linhaDigitavel) == 44) {
            return $this->linhaDigitavel;
        }

        $linhaDigitavel = self::PRODUTO;
        $linhaDigitavel .= $this->identificacaoSegmento;
        $linhaDigitavel .= $this->valorEfetivoReferencia;

        $linhaDigitavel .= $this->getValorCodigoDeBarras();
        $linhaDigitavel .= $this->identificacaoEmpresa;

        $nossoNumero = substr($this->numeroConvenio, 2, 4);
        $nossoNumero .= $this->datas->getVencimento()->format('Ymd');

        $linhaDigitavel .= $nossoNumero.str_pad($this->nossoNumero, 13, "0", STR_PAD_LEFT);

        if (strlen($linhaDigitavel) <> 43) {
            throw new IllegalArgumentException("Há algum parametro inexistente 
                    na sua linha digitavel: ".$linhaDigitavel);
        }
        
        if (in_array($this->valorEfetivoReferencia, [6, 7])) {
            $this->dvGeral = (new ModuloDez)->calc($linhaDigitavel);
        } elseif (in_array($this->valorEfetivoReferencia, [8, 9])) {
            $this->dvGeral = (new ModuloOnze)->calc($linhaDigitavel);
        } else {
            throw new IllegalArgumentException("Identificador de Valor Efetivo ou Referência inválido, 
                                                deve ser de: 6 a 9 (Verificar documentação)");
        }
        
        $this->linhaDigitavel = substr($linhaDigitavel, 0, 3).$this->dvGeral.substr($linhaDigitavel, 3, 40);

        return $this->linhaDigitavel;
    }

    public function getDvGeral()
    {
        return $this->dvGeral;
    }

    public function getCodigoDeBarras() : string
    {
        return (new GeradorCodigoDeBarra())->gerarPara($this->getLinhaDigitavel());
    }

    public function getLinhaDigitavelComVerificadores() : array
    {
        $linhaDigitavel = $this->getLinhaDigitavel();

        $result = [];
        $result[] = substr($linhaDigitavel, 0, 11);
        $result[] = substr($linhaDigitavel, 11, 11);
        $result[] = substr($linhaDigitavel, 22, 11);
        $result[] = substr($linhaDigitavel, 33, 11);

        foreach ($result as $key => $numero) {
            if (in_array($this->valorEfetivoReferencia, [6, 7])) {
                $result[$key] = $numero."-".(new ModuloDez)->calc($numero);
            } elseif (in_array($this->valorEfetivoReferencia, [8, 9])) {
                $result[$key] = $numero."-".(new ModuloOnze)->calc($numero);
            }
        }

        return $result;
    }

    public function getTemplateName() : string
    {
        return 'caixaarrecadacao';
    }

    public function comNumeroConvenio($numeroConvenio)
    {
        $this->numeroConvenio = $numeroConvenio;
        return $this;
    }
    
    public function comValorEfetivoReferencia($valorEfetivoReferencia)
    {
        $this->valorEfetivoReferencia = $valorEfetivoReferencia;
        return $this;
    }

    public function comIdentificacaoSegmento($identificacaoSegmento)
    {
        $this->identificacaoSegmento = $identificacaoSegmento;
        return $this;
    }

    public function comIdentificacaoEmpresa($identificacaoEmpresa)
    {
        $this->identificacaoEmpresa = $identificacaoEmpresa;
        return $this;
    }

    public function comLocalPagamento(string $localPagamento)
    {
        $this->localPagamento = $localPagamento;
        return $this;
    }

    public function comInstrucoesBoleto(string $instrucoesBoleto)
    {
        $this->instrucoesBoleto = $instrucoesBoleto;
        return $this;
    }
    
    public function comNossoNumero($nossoNumero)
    {
        $this->nossoNumero = $nossoNumero;
        return $this;
    }

    public function toArray() : array
    {
        return [
            'valor_boleto' => $this->valor,
            'numero_documento' => $this->numeroDocumento,
            'linha_digitavel' => $this->getLinhaDigitavel(),
            'linha_boleto'    => $this->getLinhaDigitavelComVerificadores(),
            'codigo_barras' => $this->getCodigoDeBarras(),
            'local_pagamento' => $this->localPagamento,
            'identificacao' => $this->identificacao ?? 'BoletoBancario GOPHP',
            'instrucoes' => $this->instrucoes,
            'descricoes' => $this->descricoes,
            'beneficiario' => $this->beneficiario->toArray(),
            'pagador'      => $this->pagador->toArray(),
            'datas'        => $this->datas->toArray()
        ];
    }

    private function getValorCodigoDeBarras()
    {
        if (in_array($this->valorEfetivoReferencia, [7, 9])) {
            return str_pad('', 11, 0, STR_PAD_LEFT);
        } elseif (in_array($this->valorEfetivoReferencia, [6, 8])) {
            return (new FormataNumero)->calc(
                number_format((float) $this->valor, 2, ',', ''),
                11,
                0,
                FormataNumero::FORMATO_VALOR
            );
        } else {
            throw new IllegalArgumentException("Identificador de Valor 
                Efetivo ou Referência inválido, 
                deve ser de: 6 a 9 (Verificar documentação)");
        }
    }
}
