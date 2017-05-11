<?php
namespace BoletoBancario\Calculos;

use PHPUnit\Framework\TestCase;

/**
 * ref: http://www.banknote.com.br/module.htm
 * @package Calculos
 */
class ModulosTest extends TestCase
{
    public function testCalcModuloDez()
    {
        $moduloDez = (new ModuloDez)->calc('01230067896');
        $this->assertEquals(3, $moduloDez);
    }

    public function testeCalcModuloOnze()
    {
        $modulo = (new ModuloOnze)->calc('0185200005');
        $this->assertEquals(5, $modulo);
    }
}
