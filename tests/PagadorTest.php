<?php
namespace BoletoBancario;

use PHPUnit\Framework\TestCase;

class PagadorTest extends TestCase
{

    public function testArrayPagador()
    {
        $pagador = new Pagador;
        $endereco = new Endereco('Rua xxx', 'centro', '74669200', 'Goiania', 'GO');
        $pagador->comEndereco($endereco)
                ->comNome('Breno Douglas')
                ->comDocumento('112.111.223-64');

        $array = $pagador->toArray();

        $this->assertArrayHasKey('nome', $array);
        $this->assertArrayHasKey('documento', $array);
        $this->assertArrayHasKey('endereco', $array);

        $this->assertArrayHasKey('logradouro', $array['endereco']);
        $this->assertArrayHasKey('bairro', $array['endereco']);
        $this->assertArrayHasKey('cep', $array['endereco']);
        $this->assertArrayHasKey('cidade', $array['endereco']);
        $this->assertArrayHasKey('uf', $array['endereco']);

    }
}
