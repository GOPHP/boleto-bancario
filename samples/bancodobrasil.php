<?php
require_once __DIR__.'/../vendor/autoload.php';

use BoletoBancario\{ Datas, Endereco, Pagador, Beneficiario, Boleto };
use BoletoBancario\Bancos\BancoDoBrasil;

$datas = (new Datas())->comDocumento(1, 5, 2008)
                      ->comProcessamento(1, 5, 2008)
                      ->comVencimento(2, 5, 2008);

$enderecoBeneficiario = (new Endereco)->comLogradouro("Av das empresas, 555")
                                      ->comBairro('Bairro Grande')
                                      ->comCep("02134-555")
                                      ->comCidade("São Paulo")
                                      ->comUf("SP");

$beneficiario = (new Beneficiario)->comNomeBeneficiario("Fulano de Tal")
                                  ->comAgencia("1824")->comDigitoAgencia("4")
                                  ->comConta('123')->comContaDv('0')
                                  ->comCodigoBeneficiario("76000")
                                  ->comDigitoCodigoBeneficiario("5")
                                  ->comNumeroConvenio("1207113")
                                  ->comCarteira("18")
                                  ->comEndereco($enderecoBeneficiario)
                                  ->comNossoNumero("000", '000', '000000019')
                                  ->comNossoNumeroConst('1', '4');

$enderecoPagador = (new Endereco)->comLogradouro("Av. dos testes, 111 apto 333")
                                 ->comBairro("Bairro Teste")
                                 ->comCep("01234-111")
                                 ->comCidade("São Paulo")
                                 ->comUf("SP");

$pagador = (new Pagador)->comNome("Fulano da Silva")
                        ->comDocumento("111.222.333-12")
                        ->comEndereco($enderecoPagador);

$banco = new BancoDoBrasil();
$boleto = (Boleto::novoBoleto())->comBanco($banco)
                        ->comDatas($datas)
                        ->comBeneficiario($beneficiario)
                        ->comPagador($pagador)
                        ->comValorBoleto(200.00)
                        ->comNumeroDoDocumento("1234")
                        ->comInstrucoes("Instrucao 1", "Instrucao 2", "Instrucao 3", "Instrucao 4")
                        ->comLocaisDePagamento("Local 1", "Local 2");

$gerador = new \BoletoBancario\Transformer\TransformerBoletoHtml();
echo $gerador->gera($boleto);
