<?php
namespace BoletoBancario;

use PHPUnit\Framework\TestCase;

class DatasTest extends TestCase
{

    public function testDatasComStrings()
    {
        $datas = new Datas();
        $datas->comDocumento('02', '05', '2017')
              ->comProcessamento('02', '05', '2017')
              ->comVencimento('25', '05', '2017');

        $this->assertInstanceOf('DateTime', $datas->getDocumento());
        $this->assertInstanceOf('DateTime', $datas->getVencimento());
        $this->assertInstanceOf('DateTime', $datas->getProcessamento());

        $this->assertEquals('02/05/2017', $datas->getDocumento()->format('d/m/Y'));
        $this->assertEquals('02/05/2017', $datas->getProcessamento()->format('d/m/Y'));
        $this->assertEquals('25/05/2017', $datas->getVencimento()->format('d/m/Y'));
    }

    public function testDatasComDateTime()
    {
        $datas = new Datas;
        $datas->comDocumentoDateTime(\DateTime::createFromFormat('d/m/Y', '02/05/2017'))
              ->comVencimentoDateTime(\DateTime::createFromFormat('d/m/Y', '25/05/2017'))
              ->comProcessamentoDateTime(\DateTime::createFromFormat('d/m/Y', '02/05/2017'));

        $this->assertEquals('02/05/2017', $datas->getDocumento()->format('d/m/Y'));
        $this->assertEquals('02/05/2017', $datas->getProcessamento()->format('d/m/Y'));
        $this->assertEquals('25/05/2017', $datas->getVencimento()->format('d/m/Y'));

    }

    public function testFatorVencimento()
    {
        $datas = (new Datas())->comVencimento('25', '05', '2017');
        $fatorVencimento = $datas->getFatorVencimento();

        $this->assertEquals('7170', $fatorVencimento);
    }

    public function testArrayDatas()
    {
        $datas = new Datas();
        $datas->comDocumento('02', '05', '2017')
              ->comProcessamento('02', '05', '2017')
              ->comVencimento('25', '05', '2017');

        $array = $datas->toArray();

        $this->assertArrayHasKey('documento', $array);
        $this->assertArrayHasKey('vencimento', $array);
        $this->assertArrayHasKey('processado', $array);

        $this->assertEquals('02/05/2017', $array['documento']);
        $this->assertEquals('02/05/2017', $array['processado']);
        $this->assertEquals('25/05/2017', $array['vencimento']);
    }

}
