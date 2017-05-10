<?php
namespace BoletoBancario\Calculos;

use PHPUnit\Framework\TestCase;

class FatorVencimentoTest extends TestCase
{

    /**
     *  Teste de fator de vencimento usando Objeto \DateTime
     */
    public function testeComDateTime()
    {
        $fatorVencimento = new FatorVencimento();
        $date = \DateTime::createFromFormat('d-m-Y', '20-05-2017');
        $fatorVencimento = $fatorVencimento->calc($date);

        $this->assertEquals(7165, $fatorVencimento);
    }

    /**
     * Teste de fator de vecimento usando string de data
     */
    public function testeComDateString()
    {
        $fatorVencimento = new FatorVencimento();
        $fatorVencimento = $fatorVencimento->calc('20/05/2017');

        $this->assertEquals(7165, $fatorVencimento);
    }
}
