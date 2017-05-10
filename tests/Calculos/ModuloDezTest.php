<?php
namespace BoletoBancario\Calculos;

use PHPUnit\Framework\TestCase;

class ModuloDezTest extends TestCase
{
    public function testCalc()
    {
        $moduloDez = (new ModuloDez)->calc('01230067896');
        $this->assertEquals(3, $moduloDez);
    }
}
