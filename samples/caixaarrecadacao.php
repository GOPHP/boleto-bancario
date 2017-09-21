<?php
require_once __DIR__.'/../vendor/autoload.php';

use BoletoBancario\Datas;
use BoletoBancario\Endereco;
use BoletoBancario\Pagador;
use BoletoBancario\Beneficiario;
use BoletoBancario\Bancos\Custom\CaixaArrecadacao;
use BoletoBancario\Calculos\FatorVencimento;
use BoletoBancario\Transformer\TransformerBoletoHtml;

$fatorVencimento = new FatorVencimento;
$vencimento = \DateTime::createFromFormat(
    'd/m/Y',
    date("d/m/Y", time() + (90 * 86400))
);

$datas = (new Datas())->comDocumento(1, 5, 2008)
                      ->comProcessamentoDateTime(new \DateTime())
                      ->comVencimentoDateTime(
                          $vencimento
                      );

$enderecoBeneficiario = (new Endereco)->comLogradouro("AV. 24 DE OUTUBRO, S/N")
                                      ->comBairro('CAMPINAS')
                                      ->comCep("74001-970")
                                      ->comCidade("GOIÂNIA")
                                      ->comUf("GO");

$beneficiario = (new Beneficiario)->comNomeBeneficiario("911964 - NOME DA EMPRESA DE ACORDO COM CONVENIO")
                                  ->comEndereco($enderecoBeneficiario);

$enderecoPagador = (new Endereco)->comLogradouro("Rua l14, Nº 111 apto 333")
                                 ->comBairro("Bairro Feliz")
                                 ->comCep("74630-280")
                                 ->comCidade("GOIANIA")
                                 ->comUf("GO");

$pagador = (new Pagador)->comNome("Breno Douglas Araujo Souza")
                        ->comDocumento("00000003")
                        ->comEndereco($enderecoPagador);

$boletoArrecadacao = new CaixaArrecadacao();
$boletoArrecadacao->comBeneficiario($beneficiario)
                    ->comPagador($pagador)
                    ->comDatas($datas)
                    ->comValorEfetivoReferencia("9")
                    ->comIdentificacaoEmpresa("0104")
                    ->comNumeroConvenio("911964")
                    /*
                     Nosso Numero é um campo livre de 13 caraceteres (pois, as outras posições são 
                    complementadas pelo numero do convenio e data de vencimento como manda 
                    a documentação e recomendação da caixa)*/
                    ->comNossoNumero(str_pad(rand(88888, 99999)."00000003", 13, 0, STR_PAD_LEFT))
                    ->comInstrucoes('Este boleto poderá ser pago somente nas casas lotéricas ou 
                    agências da Caixa Econômica Federal, sem qualquer tipo de multa ou taxa 
                    por tratar-se de doação espontânea.')
                    ->comDescricoes(
                        strtoupper($pagador->getNome()).', aqui vai uma mensagem para você que pode ser
                        personalizada como bem entender ',
                        strtoupper($pagador->getNome()).', este é seu número de cadastro: 0000000003'
                    );

echo (new TransformerBoletoHtml)->gera($boletoArrecadacao);
