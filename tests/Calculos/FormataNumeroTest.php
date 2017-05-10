<?php
namespace BoletoBancario\Calculos;

use PHPUnit\Framework\TestCase;

class FormataNumeroTest extends TestCase
{

    /**
     * @var FormataNumero $formatador
     */
    private $formatador;

    protected function setUp()
    {
        $this->formatador = new FormataNumero();
    }
    
    public function testFormataNumeroGeralComZero()
    {
        $numeroFormatado = $this->formatador->calc(20.00, 5, 0, FormataNumero::FORMATO_GERAL);
        $this->assertEquals('00020', $numeroFormatado);
    }

    public function testeFormataNumeroConvenio()
    {
        $numeroFormatado = $this->formatador->calc(20.00, 5, 0, FormataNumero::FORMATO_CONVENIO);
        $this->assertEquals('20000', $numeroFormatado);
    }

    public function testeFormataValor()
    {
        $numeroFormatado = $this->formatador->calc(20, 5, 0, FormataNumero::FORMATO_VALOR);
        $this->assertEquals('00020', $numeroFormatado);
    }

}
