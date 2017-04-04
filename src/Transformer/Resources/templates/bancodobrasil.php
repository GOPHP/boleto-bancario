<!DOCTYPE html>
<html>
    <head>
        <title><?= $identificacao; ?></title>
        <meta http-equiv=Content-Type content=text/html charset=UTF-8>
        <meta name="Generator" content="Boleto" />

        <style type="text/css">
            <!--
            .ti {font: 9px Arial, Helvetica, sans-serif}
            -->
        </style>
    </head>
    <body>
        <style>

            @media screen,print {

                /* *** TIPOGRAFIA BASICA *** */

                * {
                    font-family: Arial;
                    font-size: 12px;
                    margin: 0;
                    padding: 0;
                }

                .notice {
                    color: red;
                }


                /* *** LINHAS GERAIS *** */

                #container {
                    width: 666px;
                    margin: 0px auto;
                    padding-bottom: 30px;
                }

                #instructions {
                    margin: 0;
                    padding: 0 0 20px 0;
                }

                #boleto {
                    width: 666px;
                    margin: 0;
                    padding: 0;
                }


                /* *** CABECALHO *** */

                #instr_header {
                    background: url('imagens/logo_empresa.png') no-repeat top left;
                    padding-left: 160px;
                    height: 65px;
                }

                #instr_header h1 {
                    font-size: 16px;
                    margin: 5px 0px;
                }

                #instr_header address {
                    font-style: normal;
                }

                #instr_content {

                }

                #instr_content h2 {
                    font-size: 10px;
                    font-weight: bold;
                }

                #instr_content p {
                    font-size: 10px;
                    margin: 4px 0px;
                }

                #instr_content ol {
                    font-size: 10px;
                    margin: 5px 0;
                }

                #instr_content ol li {
                    font-size: 10px;
                    text-indent: 10px;
                    margin: 2px 0px;
                    list-style-position: inside;
                }

                #instr_content ol li p {
                    font-size: 10px;
                    padding-bottom: 4px;
                }


                /* *** BOLETO *** */

                #boleto .cut {
                    width: 666px;
                    margin: 0px auto;
                    border-bottom: 1px navy dashed;
                }

                #boleto .cut p {
                    margin: 0 0 5px 0;
                    padding: 0px;
                    font-family: 'Arial Narrow';
                    font-size: 9px;
                    color: navy;
                }

                table.header {
                    width: 666px;
                    height: 38px;
                    margin-top: 20px;
                    margin-bottom: 10px;
                    border-bottom: 2px navy solid;

                }


                table.header div.field_cod_banco {
                    width: 46px;
                    height: 19px;
                    margin-left: 5px;
                    padding-top: 3px;
                    text-align: center;
                    font-size: 14px;
                    font-weight: bold;
                    color: navy;
                    border-right: 2px solid navy;
                    border-left: 2px solid navy;
                }

                table.header td.linha_digitavel {
                    width: 464px;
                    text-align: right;
                    font: bold 15px Arial;
                    color: navy
                }

                table.line {
                    margin-bottom: 3px;
                    padding-bottom: 1px;
                    border-bottom: 1px black solid;
                }

                table.line tr.titulos td {
                    height: 13px;
                    font-family: 'Arial Narrow';
                    font-size: 9px;
                    color: navy;
                    border-left: 5px #ffe000 solid;
                    padding-left: 2px;
                }

                table.line tr.campos td {
                    height: 12px;
                    font-size: 10px;
                    color: black;
                    border-left: 5px #ffe000 solid;
                    padding-left: 2px;
                }

                table.line td p {
                    font-size: 10px;
                }


                table.line tr.campos td.ag_cod_cedente,
                table.line tr.campos td.nosso_numero,
                table.line tr.campos td.valor_doc,
                table.line tr.campos td.vencimento2,
                table.line tr.campos td.ag_cod_cedente2,
                table.line tr.campos td.nosso_numero2,
                table.line tr.campos td.xvalor,
                table.line tr.campos td.valor_doc2
                {
                    text-align: right;
                }

                table.line tr.campos td.especie,
                table.line tr.campos td.qtd,
                table.line tr.campos td.vencimento,
                table.line tr.campos td.especie_doc,
                table.line tr.campos td.aceite,
                table.line tr.campos td.carteira,
                table.line tr.campos td.especie2,
                table.line tr.campos td.qtd2
                {
                    text-align: center;
                }

                table.line td.last_line {
                    vertical-align: top;
                    height: 25px;
                }

                table.line td.last_line table.line {
                    margin-bottom: -5px;
                    border: 0 white none;
                }

                td.last_line table.line td.instrucoes {
                    border-left: 0 white none;
                    padding-left: 5px;
                    padding-bottom: 0;
                    margin-bottom: 0;
                    height: 20px;
                    vertical-align: top;
                }

                table.line td.cedente {
                    width: 298px;
                }

                table.line td.valor_cobrado2 {
                    padding-bottom: 0;
                    margin-bottom: 0;
                }


                table.line td.ag_cod_cedente {
                    width: 126px;
                }

                table.line td.especie {
                    width: 35px;
                }

                table.line td.qtd {
                    width: 53px;
                }

                table.line td.nosso_numero {
                    /* width: 120px; */
                    width: 115px;
                    padding-right: 5px;
                }

                table.line td.num_doc {
                    width: 113px;
                }

                table.line td.contrato {
                    width: 72px;
                }

                table.line td.cpf_cei_cnpj {
                    width: 132px;
                }

                table.line td.vencimento {
                    width: 134px;
                }

                table.line td.valor_doc {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.desconto {
                    width: 113px;
                }

                table.line td.outras_deducoes {
                    width: 112px;
                }

                table.line td.mora_multa {
                    width: 113px;
                }

                table.line td.outros_acrescimos {
                    width: 113px;
                }

                table.line td.valor_cobrado {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                    background-color: #ffc ;
                }

                table.line td.sacado {
                    width: 659px;
                }

                table.line td.local_pagto {
                    width: 472px;
                }

                table.line td.vencimento2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                    background-color: #ffc;
                }

                table.line td.cedente2 {
                    width: 472px;
                }

                table.line td.ag_cod_cedente2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.data_doc {
                    width: 93px;
                }

                table.line td.num_doc2 {
                    width: 173px;
                }

                table.line td.especie_doc {
                    width: 72px;
                }

                table.line td.aceite {
                    width: 34px;
                }

                table.line td.data_process {
                    width: 72px;
                }

                table.line td.nosso_numero2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.reservado {
                    width: 93px;
                    background-color: #ffc;
                }

                table.line td.carteira {
                    width: 93px;
                }

                table.line td.especie2 {
                    width: 53px;
                }

                table.line td.qtd2 {
                    width: 133px;
                }

                table.line td.xvalor {
                    /* width: 72px; */
                    width: 67px;
                    padding-right: 5px;
                }

                table.line td.valor_doc2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }
                table.line td.instrucoes {
                    width: 475px;
                }

                table.line td.desconto2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.outras_deducoes2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.mora_multa2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.outros_acrescimos2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.valor_cobrado2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                    background-color: #ffc ;
                }

                table.line td.sacado2 {
                    width: 659px;
                }

                table.line td.sacador_avalista {
                    width: 659px;
                }

                table.line tr.campos td.sacador_avalista {
                    width: 472px;
                }

                table.line td.cod_baixa {
                    color: navy;
                    width: 180px;
                }




                div.footer {
                    margin-bottom: 30px;
                }

                div.footer p {
                    width: 88px;
                    margin: 0;
                    padding: 0;
                    padding-left: 525px;
                    font-family: 'Arial Narro';
                    font-size: 9px;
                    color: navy;
                }


                div.barcode {
                    width: 666px;
                    margin-bottom: 20px;
                }

            }



            @media print {

                #instructions {
                    height: 1px;
                    visibility: hidden;
                    overflow: hidden;
                }

            }
        </STYLE>
    </head>
<body>

    <div id="container">



        <div id="">
            <!--
              Use no lugar do <div id=""> caso queira imprimir sem o logotipo e instruções
              <div id="instructions">
            -->

            <div id="instr_content">
                <p>
                    O pagamento deste boleto tamb&eacute;m poder&aacute; ser efetuado
                    nos terminais de Auto-Atendimento BB.
                </p>

                <h2>Instru&ccedil;&otilde;es</h2>
                <ol>
                    <li>
                        Imprima em impressora jato de tinta (ink jet) ou laser, em
                        qualidade normal ou alta. N&atilde;o use modo econ&ocirc;mico.
                        <p class="notice">Por favor, configure margens esquerda e direita
                            para 17mm.</p>
                    </li>
                    <li>
                        Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens
                        m&iacute;nimas &agrave; esquerda e &agrave; direita do
                        formul&aacute;rio.
                    </li>
                    <li>
                        Corte na linha indicada. N&atilde;o rasure, risque, fure ou dobre
                        a regi&atilde;o onde se encontra o c&oacute;digo de barras
                    </li>
                </ol>
            </div>	<!-- id="instr_content" -->
        </div>	<!-- id="instructions" -->

        <div id="boleto">
            <div class="cut">
                <p>Corte na linha pontilhada</p>
            </div>
            <table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD class=ct width=666><div align=right><b class=cp>Recibo
                                    do Sacado</b></div></TD></tr></tbody></table>
            <table class="header" border=0 cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td width=150><img src="<?= $this->getImage('logobb.jpg');?>"></td>
                        <td width=50>
                            <div class="field_cod_banco"><?= $banco['codigo_banco_com_dv']; ?></div>
                        </td>
                        <td class="linha_digitavel"><?= $linha_digitavel ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="cedente">Cedente</TD>
                        <td class="ag_cod_cedente">Ag&ecirc;ncia / C&oacute;digo do Cedente</td>
                        <td class="especie">Esp&eacute;cie</TD>
                        <td class="qtd">Quantidade</TD>
                        <td class="nosso_numero">Nosso n&uacute;mero</td>
                    </tr>

                    <tr class="campos">
                        <td class="cedente"><?= $beneficiario['nomeBeneficiario']; ?>&nbsp;</td>
                        <td class="ag_cod_cedente"><?= $beneficiario['agenciaCodigo'] ?> &nbsp;</td>
                        <td class="especie"><?= $especie ?>&nbsp;</td>
                        <TD class="qtd"><?= $quantidade ?>&nbsp;</td>
                        <TD class="nosso_numero"><?= $nossoNumero ?>&nbsp;</td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellPadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="num_doc">N&uacute;mero do documento</td>
                        <td class="contrato">Contrato</TD>
                        <td class="cpf_cei_cnpj">CPF/CEI/CNPJ</TD>
                        <td class="vencmento">Vencimento</TD>
                        <td class="valor_doc">Valor documento</TD>
                    </tr>
                    <tr class="campos">
                        <td class="num_doc"><?= $numero_documento ?></td>
                        <td class="contrato"><?= $contrato ?? 'N/A' ?></td>
                        <td class="cpf_cei_cnpj"><?= $beneficiario['documento'] ?></td>
                        <td class="vencimento"><?= $datas['vencimento']?></td>
                        <td class="valor_doc"><?= $valor_boleto ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellPadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="desconto">(-) Desconto / Abatimento</td>
                        <td class="outras_deducoes">(-) Outras dedu&ccedil;&otilde;es</td>
                        <td class="mora_multa">(+) Mora / Multa</td>
                        <td class="outros_acrescimos">(+) Outros acr&eacute;scimos</td>
                        <td class="valor_cobrado">(=) Valor cobrado</td>
                    </tr>
                    <tr class="campos">
                        <td class="desconto">&nbsp;</td>
                        <td class="outras_deducoes">&nbsp;</td>
                        <td class="mora_multa">&nbsp;</td>
                        <td class="outros_acrescimos">&nbsp;</td>
                        <td class="valor_cobrado">&nbsp;</td>
                    </tr>
                </tbody>
            </table>


            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="sacado">Sacado</td>
                    </tr>
                    <tr class="campos">
                        <td class="sacado"><?= $pagador['nome'] ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="footer">
                <p>Autentica&ccedil;&atilde;o mec&acirc;nica</p>
            </div>



            <div class="cut">
                <p>Corte na linha pontilhada</p>
            </div>


            <table class="header" border=0 cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td width=150><img src="<?= $this->getImage('logobb.jpg');?>"></td>
                        <td width=50>
                            <div class="field_cod_banco"><?= $banco['codigo_banco_com_dv'] ?></div>
                        </td>
                        <td class="linha_digitavel"><?= $linha_digitavel ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="local_pagto">Local de pagamento</td>
                        <td class="vencimento2">Vencimento</td>
                    </tr>
                    <tr class="campos">
                        <td class="local_pagto">QUALQUER BANCO AT&Eacute; O VENCIMENTO</td>
                        <td class="vencimento2"><?= $datas['vencimento'] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="cedente2">Cedente</td>
                        <td class="ag_cod_cedente2">Ag&ecirc;ncia/C&oacute;digo cedente</td>
                    </tr>
                    <tr class="campos">
                        <td class="cedente2"><?= $beneficiario['nomeBeneficiario'] ?></td>
                        <td class="ag_cod_cedente2"><?= $beneficiario['agenciaCodigo'] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="data_doc">Data do documento</td>
                        <td class="num_doc2">No. documento</td>
                        <td class="especie_doc">Esp&eacute;cie doc.</td>
                        <td class="aceite">Aceite</td>
                        <td class="data_process">Data process.</td>
                        <td class="nosso_numero2">Nosso n&uacute;mero</td>
                    </tr>
                    <tr class="campos">
                        <td class="data_doc"><?= $datas['documento'] ?></td>
                        <td class="num_doc2"><?= $numero_documento ?></td>
                        <td class="especie_doc"><?= $especie_doc ?></td>
                        <td class="aceite"><?= $aceite ?></td>
                        <td class="data_process"><?= $datas['processado'] ?></td>
                        <td class="nosso_numero2"><?= $nossoNumero ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellPadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="reservado">Uso do  banco</td>
                        <td class="carteira">Carteira</td>
                        <td class="especie2">Espécie</td>
                        <td class="qtd2">Quantidade</td>
                        <td class="xvalor">x Valor</td>
                        <td class="valor_doc2">(=) Valor documento</td>
                    </tr>
                    <tr class="campos">
                        <td class="reservado">&nbsp;</td>
                        <td class="carteira"><?= $beneficiario['carteira'] ?> <?php
                            echo $variacao_carteira ?? '&nbsp;'
                            ?></td>
                        <td class="especie2"><?= $especie ?></td>
                        <td class="qtd2"><?= $quantidade ?></td>
                        <td class="xvalor"><?= $valor_unitario ?></td>
                        <td class="valor_doc2"><?= $valor_boleto ?></td>
                    </tr>
                </tbody>
            </table>


            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr><td class="last_line" rowspan="6">
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="instrucoes">
                                            Instru&ccedil;&otilde;es (Texto de responsabilidade do cedente)
                                        </td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="instrucoes" rowspan="5">
                                            <?php foreach ($descricoes as $demonstrativo): ?>
                                                <p><?= $demonstrativo; ?></p>
                                            <?php endforeach; ?>

                                            <?php foreach ($instrucoes as $instrucao ): ?>
                                                <p><?= $instrucao; ?></p>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td>
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="desconto2">(-) Desconto / Abatimento</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="desconto2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td>
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="outras_deducoes2">(-) Outras dedu&ccedil;&otilde;es</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="outras_deducoes2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td>
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="mora_multa2">(+) Mora / Multa</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="mora_multa2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td>
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="outros_acrescimos2">(+) Outros Acr&eacute;scimos</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="outros_acrescimos2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td class="last_line">
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="valor_cobrado2">(=) Valor cobrado</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="valor_cobrado2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>
                </tbody>
            </table>


            <table class="line" cellspacing="0" cellPadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="sacado2">Sacado</td>
                    </tr>
                    <tr class="campos">
                        <td class="sacado2">
                            <p><?= $pagador['nome'] ?></p>
                            <p><?= $pagador['endereco']['logradouro'] ?></p>
                            <p>
                                <?= $pagador['endereco']['cidade'] ?> -
                                <?= $pagador['endereco']['uf'] ?> -
                                CEP: <?= $pagador['endereco']['cep'] ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="sacador_avalista" colspan="2">Sacador/Avalista</td>
                    </tr>
                    <tr class="campos">
                        <td class="sacador_avalista">&nbsp;</td>
                        <td class="cod_baixa">C&oacute;d. baixa</td>
                    </tr>
                </tbody>
            </table>
            <table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD width=666 align=right ><font style="font-size: 10px;">Autentica&ccedil;&atilde;o mec&acirc;nica - Ficha de Compensação</font></TD></tr></tbody></table>
            <div class="barcode">
                <p><?= $codigo_barras; ?></p>
            </div>
            <div class="cut">
                <p>Corte na linha pontilhada</p>
            </div>

        </div>

    </div>

</body>

</html>
