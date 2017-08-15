<?php
require_once __DIR__.'/../vendor/autoload.php';

use BoletoBancario\{ Datas, Endereco, Pagador, Beneficiario, Boleto };
use BoletoBancario\Bancos\CaixaProposta;
use BoletoBancario\Calculos\FatorVencimento;

$fatorVencimento = new FatorVencimento;

$datas = (new Datas())->comDocumento(1, 5, 2008)
                      ->comProcessamentoDateTime(new \DateTime())
                      ->comVencimentoDateTime(\DateTime::createFromFormat('d/m/Y', date("d/m/Y", time() + (30 * 86400))))
                      ->comFatorVencimento($fatorVencimento->calc(\DateTime::createFromFormat('d/m/Y', date("d/m/Y", time() + (150 * 86400)))));

$enderecoBeneficiario = (new Endereco)->comLogradouro("AV. 24 DE OUTUBRO, S/N")
                                      ->comBairro('AEROVIÁRIOS')
                                      ->comCep("74001-970")
                                      ->comCidade("GOIÂNIA")
                                      ->comUf("GO");

$beneficiario = (new Beneficiario)->comNomeBeneficiario("Associação Pai Eterno e Perpetuo Socorro")
                                  ->comDocumento('11.430.844/0001-99')
                                  ->comAgencia("2512")->comDigitoAgencia("9")
                                  ->comConta('321956')->comContaDv('4')
                                  ->comCodigoBeneficiario("321956")
                                  ->comDigitoCodigoBeneficiario("9")
                                  ->comNumeroConvenio("1207113")
                                  ->comCarteira("RG")
                                  ->comEndereco($enderecoBeneficiario);

$enderecoPagador = (new Endereco)->comLogradouro("Av. dos testes, 111 apto 333")
                                 ->comBairro("Bairro Teste")
                                 ->comCep("01234-111")
                                 ->comCidade("São Paulo")
                                 ->comUf("SP");

$pagador = (new Pagador)->comNome("Breno Douglas Araujo Souza")
                        ->comDocumento("017.563.902-74")
                        ->comEndereco($enderecoPagador);
$banco = new CaixaProposta();


while (true):
    $beneficiario->comNossoNumero('14000000000'.rand(900020, 999999));
    $boleto = (Boleto::novoBoleto())->comBanco($banco)
                            ->comDatas($datas)
                            ->comBeneficiario($beneficiario)
                            ->comPagador($pagador)
                            ->comValorBoleto(12.95)
                            ->comEspecieMoeda("R$")
                            ->comNumeroDoDocumento("27.030195.10")
                            ->comInstrucoes(
                                "Não receber após 23/08/2017",
                                "Este boleto pode ser pago em CASAS LOTÉRICAS ou em qualquer agência
                                bancária até o vencimento, sem qualquer tipo de multa ou
                                taxa por tratar-se de doação espontânea. ",
                                "JUNTOS, SOMOS OPERÁRIOS DA CASA DO DIVINO PAI ETERNO!",
                                ""
                            )
                            ->comDescricoes(
                                "Não receber após 23/08/2017",
                                "Este boleto pode ser pago em CASAS LOTÉRICAS ou em qualquer agência
                                bancária até o vencimento, sem qualquer tipo de multa ou
                                taxa por tratar-se de doação espontânea.",
                                ''
                            )
                            ->comLocaisDePagamento("Local 1", "Local 2");

    $boleto->toArray();

    if ($banco->getCampoLivreDv() == 0) {
        $gerador = new \BoletoBancario\Transformer\TransformerBoletoHtml();
        echo $gerador->gera($boleto);
        exit;
    }
endwhile;
