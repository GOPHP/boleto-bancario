<?php
namespace BoletoBancario;

use PHPUnit\Framework\TestCase;

class EnderecoTest extends TestCase
{

    /**
     * @var Endereco
     */
    private $endereco;

    public function setUp()
    {
        $this->endereco = new Endereco;
        $this->endereco->comLogradouro('Rua 20, 100')
                       ->comBairro('Bairro Anonimo')
                       ->comCep('74000000')
                       ->comCidade('Goiânia')
                       ->comUf('GO');

    }

    public function testEnderecoCompleto()
    {
        $enderecoCompleto = $this->endereco->getEnderecoCompleto();
        $this->assertEquals('Rua 20, 100, Bairro Anonimo 74000000 - Goiânia - GO', $enderecoCompleto);
    }

    public function testArrayEndereco()
    {
        $array = $this->endereco->toArray();

        $this->assertArrayHasKey('logradouro', $array);
        $this->assertArrayHasKey('bairro', $array);
        $this->assertArrayHasKey('cep', $array);
        $this->assertArrayHasKey('cidade', $array);
        $this->assertArrayHasKey('uf', $array);

        $this->assertEquals('Rua 20, 100', $array['logradouro']);
        $this->assertEquals('Bairro Anonimo', $array['bairro']);
        $this->assertEquals('74000000', $array['cep']);
        $this->assertEquals('Goiânia', $array['cidade']);
        $this->assertEquals('GO', $array['uf']);
    }
}
