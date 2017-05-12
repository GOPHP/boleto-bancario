<?php
require_once __DIR__.'/../vendor/autoload.php';

use BoletoBancario\{ Datas, Endereco, Pagador, Beneficiario, Boleto };
use BoletoBancario\Bancos\Bradesco;

$datas = (new Datas())->comDocumento(1, 5, 2008)
                      ->comProcessamentoDateTime(new \DateTime())
                      ->comVencimentoDateTime(\DateTime::createFromFormat('d/m/Y', date("d/m/Y", time() + (5 * 86400))));

$enderecoBeneficiario = (new Endereco)->comLogradouro("Av das empresas, 555")
                                      ->comBairro('Bairro Grande')
                                      ->comCep("02134-555")
                                      ->comCidade("São Paulo")
                                      ->comUf("SP");

$beneficiario = (new Beneficiario)->comNomeBeneficiario("Fulano de Tal")
                                  ->comDocumento('21212121212-000')
                                  ->comAgencia("1234")->comDigitoAgencia("4")
                                  ->comConta('123456')->comContaDv('0')
                                  ->comCodigoBeneficiario("76000")
                                  ->comDigitoCodigoBeneficiario("5")
                                  ->comNumeroConvenio("1207113")
                                  ->comCarteira("RG")
                                  ->comEndereco($enderecoBeneficiario)
                                  ->comNossoNumero("900020");

$enderecoPagador = (new Endereco)->comLogradouro("Av. dos testes, 111 apto 333")
                                 ->comBairro("Bairro Teste")
                                 ->comCep("01234-111")
                                 ->comCidade("São Paulo")
                                 ->comUf("SP");

$pagador = (new Pagador)->comNome("Fulano da Silva")
                        ->comDocumento("111.222.333-12")
                        ->comEndereco($enderecoPagador);

$banco = new Bradesco();
$banco->comNossoNumero1('000')
      ->comNossoNumero2('000')
      ->comNossoNumero3('000000019')
      ->comNossoNumeroConst1('1')
      ->comNossoNumeroConst2('4');

$boleto = (Boleto::novoBoleto())->comBanco($banco)
                        ->comDatas($datas)
                        ->comBeneficiario($beneficiario)
                        ->comPagador($pagador)
                        ->comValorBoleto(2952.95)
                        ->comNumeroDoDocumento("27.030195.10")
                        ->comInstrucoes(
                            "- Sr. Caixa, cobrar multa de 2% após o vencimento",
                            "- Receber até 10 dias após o vencimento",
                            "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br",
                            "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br"
                        )
                        ->comDescricoes(
                            "Pagamento de Compra na Loja Nonononono",
                            'Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$2,95',
                            'GOPHP - http://www.gophp.com.br'
                        )
                        ->comLocaisDePagamento("Local 1", "Local 2");

$gerador = new \BoletoBancario\Transformer\TransformerBoletoHtml();
echo $gerador->gera($boleto);
