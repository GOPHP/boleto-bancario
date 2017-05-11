<?php
namespace BoletoBancario\Calculos;

use PHPUnit\Framework\TestCase;

class VerificadorNossoNumeroTest extends TestCase
{
    public function testeCalcVerificadorNossoNumero()
    {
        $modulo = (new VerificadorNossoNumero)->calc('0185200005');
        $this->assertEquals(5, $modulo);
    }
}
