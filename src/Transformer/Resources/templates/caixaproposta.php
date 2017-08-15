<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<html>
    <head>
        <title><?= $identificacao; ?></title>
        <meta http-equiv=Content-Type content=text/html charset=utf-8>
        <style type=text/css>
            .cp {  font: bold 10px Arial; color: black}
            .ti {  font: 9px Arial, Helvetica, sans-serif}
            .ld { font: bold 15px Arial; color: #000000}
            .ct { font: 9px "Arial Narrow"; COLOR: #000033}
            .cn { font: 9px Arial; COLOR: black }
            .bc { font: bold 20px Arial; color: #000000 }
            .ld2 { font: bold 12px Arial; color: #000000 }
        </style>
    </head>
    <body text="#000000" bgColor="#ffffff" topMargin="0" rightMargin="0" >
        <!-- <table width="666" cellspacing="0" cellpadding="0" border="0" >
            <tr>
                <td valign="top" class="cp">
                    <div align="center">
                        Instruções de Impressão
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="top" class="cp">
                    <div align="left">
                        <p>
                        <li>
                            Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo econômico).
                        </li>
                        <li>
                            Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do formulário.
                        </li>
                        <li>
                            Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.
                        </li>
                        <li>
                            Caso não apareça o código de barras no final, clique em F5 para atualizar esta tela.
                        </li>
                        <li>
                            Caso tenha problemas ao imprimir, copie a sequencia numérica abaixo e pague no caixa eletrônico ou no internet banking:
                        </li>
                        </p>
                        <br />
                        <span class="ld2">
                            &nbsp;&nbsp;&nbsp;&nbsp;Linha Digitável: &nbsp;<?= $linha_digitavel; ?>
                            <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?= $valor_boleto; ?>
                            <br>
                        </span>
                    </div>
                </td>
            </tr>
        </table>
        <br /> -->
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr>
                    <td class=ct width=666>
                        <img height=1 src=<?= $this->getImage('6.png'); ?> width=665 border=0>
                    </td>
                </tr>
                <tr>
                    <td class=ct width=666>
                        <div align=right>
                            <b class=cp>
                                Recibo do Pagador
                            </b>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="666" cellspacing="5" cellpadding="0" border="0">
            <tr>
                <td width="41"></td>
            </tr>
        </table>

        <br />
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tr>
                <td class="cp" width="150">
                    <span class="campo">
                        <img src="<?= $this->getImage('logocaixa.jpg'); ?>" width="130" height="30" border="0" />
                    </span>
                </td>
                <td width="3" valign="bottom">
                    <img height="22" src="<?= $this->getImage('3.png'); ?>" width="2" border="0" />
                </td>
                <td class="cpt" width="68" valign="bottom">
                    <div align="center">
                        <font class="bc">
                        <?= $banco['codigo_banco_com_dv']; ?>
                        </font>
                    </div>
                </td>
                <td width="3" valign="bottom">
                    <img height="22" src="<?= $this->getImage('3.png'); ?>" width="2" border="0" />
                </td>
                <td class="ld" align="center" width="453" valign="bottom">
                    <span class="ld">
                        <span class="campotitulo">
                            <?= $linha_digitavel; ?>
                        </span>
                    </span>
                </td>
            </tr>
            <tbody>
                <tr>
                    <td colspan="5">
                        <img height="2" src="<?= $this->getImage('2.png'); ?>" width="666" border="0">
                    </td>
                </tr>
            </tbody>
        </table>


        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr style="margin-bottom: 10px;">
                    <td class="ld" align="center" width="453" valign="bottom" style="border-width: 0px 1px 1px; border-color: #000; border-style: solid; padding: 2px;">
                        <span class="ld">
                            <h3 style="
                                margin: 0;
                                padding: 0;
                                font-size: 10px;
                            ">BOLETO PROPOSTA</h3>
                        </span>
                        <p style="text-align: justify;font-weight: 100; font-size: 9px; " >
                            ESTE BOLETO SE REFERE A UMA PROPOSTA JÁ FEITA A VOCÊ E O SEU PAGAMENTO
                            NÃO É OBRIGATÓRIO. Deixar de pagá-lo não dará causa de protesto, a cobrança
                            judicial ou extrajudicial, nem a inserção de seu nome em cadastro de
                            restrição de crédito. <br>
                            Pagar até a data de vencimento significa aceitar a proposta. <br>
                            Informações adicionais sobre a proposta e sobre o respectivo contrato
                            poderão ser solicitadas a qualquer momento ao Benefiário, por meio de seus
                            canais de atendimento.
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <table cellspacing="0" cellpadding="0" style="border-left: 1px solid #000;">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"></td>
                    <td class="ct" valign="top" width="368" height="13">Beneficiário</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="ct" valign="top" width="136" height="13">
                        CPF/CNPJ
                    </td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="ct" valign="top" width="134" height="13">Agência / Código do Beneficiário</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"></td>
                    <td class="cp" valign="top" width="368" height="12">
                        <span class="campo"><?= $beneficiario['nomeBeneficiario']; ?></span>
                    </td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="cp" valign="top" width="156" height="12">
                        <span class="campo">
                            <?= $beneficiario['documento']; ?>
                        </span>
                    </td>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="cp" valign="top"  width="134" height="12"><span class="campo">
                            <?= $beneficiario['agenciaCodigo'] ?>
                        </span>
                    </td>

                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" style="width: 667px;border-style: solid; border-color: #000; border-width: 1px 0px 0px 1px;">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"></td>
                    <td class="ct" valign="top" width="490" height="13">Endereço do Beneficiário</td>
                    <td class="ct" valign="top" width="7" height="13" style="border-left: 1px solid #000;"></td>
                    <td class="ct" valign="top" width="34" height="13">UF</td>
                    <td class="ct" valign="top" width="7" height="13" style="border-left: 1px solid #000;"></td>
                    <td class="ct" valign="top" width="107" height="13">CEP</td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"></td>
                    <td class="cp" valign="top" width="490" height="12">
                        <span class="campo">
                            <?= $beneficiario['endereco']['logradouro'] ?>, <?= $beneficiario['endereco']['bairro'] ?>,
                            <?= $beneficiario['endereco']['cidade'] ?> - <?= $beneficiario['endereco']['uf'] ?>,
                            <?= $beneficiario['endereco']['cep'] ?>
                        </span>
                    </td>
                    <td class="cp" valign="top" width="7" height="12" style="border-left: 1px solid #000;"></td>
                    <td class="cp" valign="top" width="34" height="12">
                        <span class="campo">
                            <?= $beneficiario['endereco']['uf'] ?>
                        </span>
                    </td>
                    <td class="cp" valign="top" width="7" height="12" style="border-left: 1px solid #000;"></td>
                    <td class="cp" valign="top"  width="107" height="12">
                        <span class="campo">
                            <?= $beneficiario['endereco']['cep'] ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <table cellspacing=0 cellpadding=0 style="border-style: solid;border-color: #000;border-width: 1px 0px 1px 1px;">
            <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13></td>
                    <td class=ct valign=top width=90 height=13>
                        Data do documento
                    </td>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=ct valign=top width=132 height=13>Nr. do documento</td>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=ct valign=top width=134 height=13>Aceite</td>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=ct valign=top width=154 height=13>
                        Data de processamento
                    </td>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=ct valign=top width=120 height=13>
                        Nosso Número
                    </td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12></td>
                    <td class=cp valign=top width=90 height=12>
                        <span class="campo">
                            <?= $datas['documento'] ?>
                        </span>
                    </td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top width=132 height=12>
                        <span class="campo">
                            <?= $numero_documento ?>
                        </span>
                    </td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top width=134 height=12>
                        <span class="campo">
                            <?= $aceite ?>
                        </span>
                    </td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top width=154 height=12>
                        <span class="campo">
                            <?= $datas['processado'] ?>
                        </span>
                    </td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top width=120 height=12>
                        <span class="campo">
                            <?= $nossoNumero; ?>-<?= $nossoNumero_dv; ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

        <table cellspacing=0 cellpadding=0 border=0 height="110">
            <tbody >
                <tr>
                    <td class=ct  width=7 height=12></td>
                    <td class=ct  width=564 ><strong>Instruções (Texto de Responsabilidade do Beneficiário):</strong></td>
                    <td class=ct  width=7 height=12></td>
                    <td class=ct  width=88 >
                    </td>
                </tr>
                <tr height="20">
                    <td  width=7 ></td>
                    <td class=cp width=564>
                        <span class="campo">
                            <?= $descricoes[0]; ?><br>
                        </span>
                    </td>
                    <td  width=7 ></td>
                    <td  width=88 ></td>
                </tr>
                <tr height="20">
                    <td  width=7 ></td>
                    <td class=cp width=564>
                        <span class="campo">
                            <?= $descricoes[1]; ?><br>
                        </span>
                    </td>
                    <td  width=7 ></td>
                    <td  width=88 ></td>
                </tr>
                <tr height="20">
                    <td  width=7 ></td>
                    <td class=cp width=564>
                        <span class="campo">
                            <?= $descricoes[2]; ?><br>
                        </span>
                    </td>
                    <td  width=7 ></td>
                    <td  width=88 ></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr>
                    <td colspan="5">
                        <img height="1" src="<?= $this->getImage('2.png'); ?>" width="666" border="0">
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- AQUI NOVOS -->
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="ct" valign="top" width="490" height="13">Pagador: </td>
                    <td class="ct" valign="top" width="43" height="13">CPF/CNPJ: </td>
                    <td class="ct" valign="top" width="127" height="13"><?= $pagador['documento']; ?></td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="12"><img height="12" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="cp" valign="top" width="490" height="12">
                        <span class="campo"><?= $pagador['nome']; ?></span>
                    </td>
                    <td class="ct" valign="top" width="43" height="12">
                        <span class="campo">
                            UF: <?= $pagador['endereco']['uf'] ?>
                        </span>
                    </td>
                    <td class="ct" valign="top"  width="127" height="12"><span class="campo">
                            CEP: <?= $pagador['endereco']['cep'] ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width"=7" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="7" border="0"></td>
                    <td valign="top" width"=490" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="490" border="0"></td>
                    <td valign="top" width"=43" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="43" border="0"></td>
                    <td valign="top" width"=127" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="127" border="0"></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="ct" valign="top" width="80" height="13">
                        Carteira
                    </td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="ct" valign="top" width="102" height="13">Espécie</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="ct" valign="top" width="144" height="13">Vencimento</td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="ct" valign="top" width="164" height="13">
                        Valor do Documento
                    </td>
                    <td class="ct" valign="top" width="7" height="13"><img height="13" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="ct" valign="top" width="140" height="13">
                        Valor Cobrado
                    </td>
                </tr>
                <tr>
                    <td class="cp" valign="top" width="7" height="16"><img height="16" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="cp" valign="top" width="80" height="16">
                        <span class="campo">
                            <?= $beneficiario['carteira'] ?>
                        </span>
                    </td>
                    <td class="cp" valign="top" width="7" height="16"><img height="16" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="cp" valign="top" width="102" height="16">
                        <span class="campo">
                            <?= $especie; ?>
                        </span>
                    </td>
                    <td class="cp" valign="top" width="7" height="16"><img height="16" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="cp" valign="top" width="144" height="16">
                        <span class="campo">
                            <?= $datas['vencimento'] ?>
                        </span>
                    </td>
                    <td class="cp" valign="top" width="7" height="16"><img height="16" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="cp" valign="top" width="164" height="16">
                        <span class="campo">
                            <?= $valor_boleto ?>
                        </span>
                    </td>
                    <td class="cp" valign="top" width="7" height="16"><img height="16" src="<?= $this->getImage('1.png'); ?>" width="1" border="0"></td>
                    <td class="cp" valign="top" width="140" height="16">
                        <span class="campo">
                        </span>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width="7" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="7" border="0"></td>
                    <td valign="top" width="80" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="80" border="0"></td>
                    <td valign="top" width="7" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="7" border="0"></td>
                    <td valign="top" width="102" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="102" border="0"></td>
                    <td valign="top" width="7" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="7" border="0"></td>
                    <td valign="top" width="144" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="144" border="0"></td>
                    <td valign="top" width="7" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="7" border="0"></td>
                    <td valign="top" width="164" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="164" border="0"></td>
                    <td valign="top" width="7" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="7" border="0"></td>
                    <td valign="top" width="140" height="1"><img height="1" src="<?= $this->getImage('2.png'); ?>" width="140" border="0"></td>
                </tr>
            </tbody>
        </table>
        <table cellpadding="2" cellspacing="0" border="0">
            <tbody>
                <tr>
                    <td width="400" align="center" style="font: normal 10px Arial;">
                        <strong class="campo" align="center">
                            SAC CAIXA:
                        </strong>
                        0800 726 0101 (informações, reclamações, sugestões e elogios)
                    </td>
                    <td width="266" align="center" style="font: normal 10px Arial;">
                        Autenticação Mecânica - <strong>Recibo do Pagador</strong>
                    </td>
                </tr>
                <tr>
                    <td width="400" align="center" style="font: normal 10px Arial;" >
                        <strong class="campo" align="center" >
                            Para pessoas com deficiência auditiva ou de fala:
                        </strong>
                        0800 726 2492
                    </td>
                    <td class="cp" width="266">
                    </td>
                </tr>
                <tr>
                    <td width="400"  align="center" style="font: normal 10px Arial;">
                        <strong class="campo" align="center">
                            Ouvidoria:
                        </strong>
                        0800 725 7474
                    </td>
                    <td class="cp" width="266">
                    </td>
                </tr>
                <tr>
                    <td class="cp" width="400"  align="center">
                        <span class="campo" style="color: blue;">
                            caixa.gov.br
                        </span>
                    </td>
                    <td class="cp" width="266">
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- INICIO LINHA PONTILHADA -->
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr>
                    <td width="7"></td>
                    <td  width="500" class="cp">
                    </td>
                    <td width="159"></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tr>
                <td class="ct" width="666"></td>
            </tr>
            <tbody>
                <tr>
                    <td class="ct" width="666">
                        <div align="right">Corte na linha pontilhada</div>
                    </td>
                </tr>
                <tr>
                    <td class="ct" width="666"><img height="1" src="<?= $this->getImage('6.png'); ?>" width=665 border=0></td>
                </tr>
            </tbody>
        </table>
        <br>
        <!-- FICHA DE COMPENSAÇÃO -->
        <table cellspacing=0 cellpadding=0 width=666 border=0>
            <tr>
                <td class=cp width=150>
                    <span class="campo"><IMG
                            src="<?= $this->getImage('logocaixa.jpg'); ?>" width="130" height="30"
                            border=0></span>
                </td>
                <td width=3 valign=bottom><img height=22 src="<?= $this->getImage('3.png'); ?>" width=2 border=0></td>
                <td class=cpt width=58 valign=bottom>
                    <div align=center><font class=bc><?= $banco['codigo_banco_com_dv']; ?></font></div>
                </td>
                <td width=3 valign=bottom><img height=22 src="<?= $this->getImage('3.png'); ?>" width=2 border=0></td>
                <td class=ld align=center width=453 valign=bottom><span class=ld>
                        <span class="campotitulo">
                            <?= $linha_digitavel; ?>
                        </span></span>
                </td>
            </tr>
            <tbody>
                <tr>
                    <td colspan=5><img height=2 src="<?= $this->getImage('2.png'); ?>" width=666 border=0></td>
                </tr>
            </tbody>
        </table>

        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr style="margin-bottom: 10px;">
                    <td class="ld" align="center" width="453" valign="bottom" style="border-width: 0px 1px; border-color: #000; border-style: solid; padding: 2px;">
                        <span class="ld">
                            <h3 style="
                                margin: 0;
                                padding: 0;
                                font-size: 10px;
                            ">BOLETO PROPOSTA</h3>
                        </span>
                        <p style="text-align: justify;font-weight: 100; font-size: 9px;" >
                            ESTE BOLETO SE REFERE A UMA PROPOSTA JÁ FEITA A VOCÊ E O SEU PAGAMENTO
                            NÃO É OBRIGATÓRIO. Deixar de pagá-lo não dará causa de protesto, a cobrança
                            judicial ou extrajudicial, nem a inserção de seu nome em cadastro de
                            restrição de crédito. <br>
                            Pagar até a data de vencimento significa aceitar a proposta. <br>
                            Informações adicionais sobre a proposta e sobre o respectivo contrato
                            poderão ser solicitadas a qualquer momento ao Benefiário, por meio de seus
                            canais de atendimento.
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        
        
        <table cellspacing=0 cellpadding=0 border=0>
            <tbody>
                 <tr>
                    <td colspan="10">
                        <img height="1" src="<?= $this->getImage('2.png'); ?>" width="666" border="0">
                    </td>
                </tr>
                <tr>
                    <td class=ct valign=top width=7 height=13>
                        <img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0>
                    </td>
                    <td class=ct valign=top width=102 height=13>Data
                        do documento
                    </td>
                    <td class=ct valign=top width=7 height=13> <img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=ct valign=top width=103 height=13>Nr. do
                        documento
                    </td>
                    <td class=ct valign=top width=7 height=13> <img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=ct valign=top width=113 height=13>
                        Nosso Número
                    </td>
                    <td class=ct valign=top width=7 height=13>
                        <img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0>
                    </td>
                    <td class=ct valign=top width=130 height=13 >
                        Agência / Código do Beneficiário
                    </td>
                    <td class=ct valign=top width=8 height=13> <img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=ct valign=top width=182 height=13>
                        Data de Vencimento
                    </td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top  width=102 height=12>
                        <div align=left>
                            <span class="campo">
                                <?= $datas['documento']; ?>
                            </span>
                        </div>
                    </td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top width=103 height=12>
                        <span class="campo">
                            <?= $numero_documento; ?>
                        </span>
                    </td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top  width=113 height=12>
                        <div align=left>
                            <span class="campo">
                                <?= $nossoNumero; ?>-<?= $nossoNumero_dv; ?>
                            </span>
                        </div>
                    </td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top  width=130 height=12>
                        <div align=left>
                            <span class="campo">
                                <?= $beneficiario['agenciaCodigo'] ?>
                            </span>
                        </div>
                    </td>
                    <td class=cp valign=top width=0 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top align=right width=182 height=12>
                        <span class="campo">
                            <?= $datas['vencimento']; ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=7 border=0></td>
                    <td valign=top width=103 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=103 border=0></td>
                    <td valign=top width=7 height=1>
                        <img height=1 src="<?= $this->getImage('2.png'); ?>" width=7 border=0>
                    </td>
                    <td valign=top width=103 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=103 border=0></td>
                    <td valign=top width=7 height=1>
                        <img height=1 src="<?= $this->getImage('2.png'); ?>" width=7 border=0>
                    </td>
                    <td valign=top width=113 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=113 border=0></td>
                    <td valign=top width=7 height=1>
                        <img height=1 src="<?= $this->getImage('2.png'); ?>" width=7 border=0>
                    </td>
                    <td valign=top width=130 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=132 border=0></td>
                    <td valign=top width=8 height=1>
                        <img height=1 src="<?= $this->getImage('2.png'); ?>" width=7 border=0>
                    </td>
                    <td valign=top width=182 height=1>
                        <img height=1 src="<?= $this->getImage('2.png'); ?>" width=182 border=0>
                    </td>
                </tr>
            </tbody>
        </table>
    
        <table cellspacing=0 cellpadding=0 width=666 border=0>
            <tbody>
                <tr>
                    <td align=right width=10>
                        <table cellspacing=0 cellpadding=0 border=0 align=left>
                            <tbody>
                                <tr>
                                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                                </tr>
                                <tr>
                                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                                </tr>
                                <tr>
                                    <td valign=top width=7 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=1 border=0></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign=top width=468 rowspan=2><font class=ct>Instruções
                        (Texto de responsabilidade do Beneficiário)</font>
                        <br><span class=cp> 
                            <FONT class=campo style="font-size: 9px;">
                            <?= $instrucoes[0]; ?><br>
                            <?= $instrucoes[1]; ?><br>
                            </FONT>
                        </span>
                    </td>
                    <td align=right width=188>
                        <table cellspacing=0 cellpadding=0 border=0>
                            <tbody>
                                <tr>
                                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                                    <td class=ct valign=top width=180 height=13>(-)
                                        Desconto
                                    </td>
                                </tr>
                                <tr>
                                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                                    <td class=cp valign=top align=right width=180 height=12></td>
                                </tr>
                                <tr>
                                    <td valign=top width=7 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=7 border=0></td>
                                    <td valign=top width=180 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=180 border=0></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align=right width=10>
                        <table cellspacing=0 cellpadding=0 border=0 align=left>
                            <tbody>
                                <tr>
                                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                                </tr>
                                <tr>
                                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                                </tr>
                                <tr>
                                    <td valign=top width=7 height=1>
                                        <img height=1 src="<?= $this->getImage('2.png'); ?>" width=1 border=0>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td align=right width=188>
                        <table cellspacing=0 cellpadding=0 border=0>
                            <tbody>
                                <tr>
                                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                                    <td class=ct valign=top width=180 height=13>(-)
                                        Outras deduções / Abatimento
                                    </td>
                                </tr>
                                <tr>
                                    <td class=cp valign=top width=7 height=12> <img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                                    <td class=cp valign=top align=right width=180 height=12></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table cellspacing=0 cellpadding=0 width=666 border=0>
            <tbody>
                <tr>
                    <td align=right width=480 style="border-top: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000; ">
                        <table cellspacing=0 cellpadding=0 border=0 align=left>
                            <tbody>
                                <tr>
                                    <td width="378" style="padding-left: 2px;font-size: 11px;border-bottom: 1px solid #000;">
                                        Beneficiário: <span class="cp"><?= $beneficiario['nomeBeneficiario']; ?></span>
                                    </td>
                                    <td width="100" class="cp" style="padding-left: 2px;font-size: 11px;border-bottom: 1px solid #000;border-left: 1px solid #000;">
                                        <?= $beneficiario['documento']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cp" colspan="2" style="padding-left: 2px;font-size: 11px;">
                                        <?= $beneficiario['endereco']['logradouro'] ?>, <?= $beneficiario['endereco']['bairro'] ?>,
                                        <?= $beneficiario['endereco']['cidade'] ?> - <?= $beneficiario['endereco']['uf'] ?>,
                                        <?= $beneficiario['endereco']['cep'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td align=right width=186 style="border-top: 1px solid #000;">
                        <table cellspacing=0 cellpadding=0 border=0>
                            <tbody>
                                <tr>
                                    <td class=ct valign=top width=6 height=13></td>
                                    <td class=ct valign=top width=182 height=13>(=)
                                        Valor cobrado
                                    </td>
                                </tr>
                                <tr>
                                    <td class=cp valign=top width=6 height=12></td>
                                    <td class=cp valign=top align=right width=182 height=12></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table cellspacing=0 cellpadding=0 width=666 border=0>
            <tbody>
                <tr>
                    <td valign=top width=666 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=666 border=0></td>
                </tr>
            </tbody>
        </table>
        <table cellspacing=0 cellpadding=0 border=0>
            <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=ct valign=top width=477 height=13>PAGADOR</td>
                    <td class=ct valign=top width=180 height=13>CPF/CNPJ</td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top width=477 height=12><span class="campo">
                        <?= $pagador['nome']; ?>
                        </span>
                    </td>
                    <td class=cp valign=top width=180 height=12><span class="campo">
                        <?= $pagador['documento']; ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <table cellspacing=0 cellpadding=0 border=0>
            <tbody>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top width=659 height=12><span class="campo">
                        <?= $pagador['endereco']['logradouro']; ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <table cellspacing=0 cellpadding=0 border=0>
            <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?= $this->getImage('1.png'); ?>" width=1 border=0></td>
                    <td class=cp valign=top width=477 height=13>
                        <span class="campo">
                            <?= $pagador['endereco']['cidade']; ?>, <?= $pagador['endereco']['uf']; ?>, <?= $pagador['endereco']['cep']; ?>
                        </span>
                    </td>
                    <td class=ct valign=top width=85 height=13>
                        UF: <span style="font: bold 10px Arial;" class="campo"><?= $pagador['endereco']['uf']; ?></span>
                    </td>
                    <td class=ct valign=top width=97 height=13>
                        CEP: <span style="font: bold 10px Arial;" class="campo"><?= $pagador['endereco']['cep']; ?></span>
                    </td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=7 border=0></td>
                    <td valign=top width=477 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=477 border=0></td>
                    <td valign=top width=85 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=85 border=0></td>
                    <td valign=top width=97 height=1><img height=1 src="<?= $this->getImage('2.png'); ?>" width=97 border=0></td>
                </tr>
            </tbody>
        </table>
        <table cellSpacing=0 cellPadding=0 width=666 border=0>
            <tbody>
                <tr>
                    <td vAlign=bottom align=left height=50><?= $codigo_barras; ?>
                    </td>
                    <td class=ct  width=250 >
                        <div align=right style="height: 50px;margin-top: 4px">
                        Autenticação mecânica - <b class=cp>Ficha de Compensação</b>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table cellSpacing=0 cellPadding=0 width=666 border=0>
            <tr>
                <td class=ct width=666></td>
            </tr>
            <tbody>
                <tr>
                    <td class=ct width=666>
                        <div align=right>Corte
                            na linha pontilhada
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class=ct width=666><img height=1 src="<?= $this->getImage('6.png'); ?>" width=665 border=0></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
