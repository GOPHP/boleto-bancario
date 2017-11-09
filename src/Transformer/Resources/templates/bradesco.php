<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $identificacao; ?></title>
        <meta http-equiv=Content-Type content=text/html charset=UTF-8>
        <meta name="Generator" content="Boleto" />
        <style type=text/css>
            .cp {  font: bold 10px Arial; color: black}
            .ti {  font: 9px Arial, Helvetica, sans-serif}
            .ld { font: bold 15px Arial; color: #000000}
            .ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
            .cn { FONT: 9px Arial; COLOR: black }
            .bc { font: bold 20px Arial; color: #000000 }
            .ld2 { font: bold 12px Arial; color: #000000 }
        </style>
    </head>

    <body text="#000000" bgColor="#ffffff" topMargin="0" rightMargin="0">
        <table width="666" cellspacing="0" cellpadding="0" border="0">
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

                            Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo econômico).<br>
                            Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do formulário.<br>
                            Corte na linha <i></i>ndicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.<br>
                            Caso não apareça o código de barras no final, clique em F5 para atualizar esta tela.
                            Caso tenha problemas ao imprimir, copie a seqüencia numérica abaixo e pague no caixa eletrônico ou no internet banking:<br><br>

                            <span class="ld2">
                                &nbsp;&nbsp;&nbsp;&nbsp;Linha Digitável: &nbsp;<?php echo $linha_digitavel ?> <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?php echo $valor_boleto ?> <br>
                            </span>
                    </div>
                </td>
            </tr>
        </table>

        <br>

        <table cellspacing="0" cellpadding="0" width="666" border="0">
            <tbody>
                <tr>
                    <td class="ct" width="666">
                        <img height="1" src=<?= $this->getImage('6.png') ?> width=665 border=0>
                    </td>
                </tr>
                <tr>
                    <td class="ct" width="666">
                        <div align="right">
                            <b class="cp">
                                Recibo do Sacado
                            </b>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table><table width=666 cellspacing=5 cellpadding=0 border=0><tr><td width=41></TD></tr></table>

        <br>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
          <tr>
            <td class="cp" width="150">
              <span class="campo">
                <img src="<?= $this->getImage('logo_bradesco.png') ?>" width="150" height="40" border=0>
              </span>
            </td>
            <td width="3" valign="bottom">
              <img height="22" src="<?= $this->getImage('3.png') ?>" width="2" border="0">
            </td>
            <td class="cpt" width="58" valign="bottom">
              <div align="center">
                <font class="bc">
                  <?= $banco['codigo_banco_com_dv'] ?>
                </font>
              </div>
            </td>
            <td width="3" valign="bottom">
              <img height="22" src="<?= $this->getImage('3.png') ?>" width="2" border="0">
            </td>
            <td class="ld" align="right" width="453" valign="bottom">
              <span class="ld">
                  <span class="campotitulo">
                      <?php echo $linha_digitavel ?>
                  </span>
              </span>
            </td>
          </tr>
          <tbody>
            <tr>
              <td colspan="5">
                <img height="2" src="<?= $this->getImage('2.png') ?>" width="666" border="0" />
              </td>
            </tr>
          </tbody>
        </table>

        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="298" height="13">
                Cedente
              </td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="126" height="13">
                Agência/Código do Cedente
              </td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0" />
              </td>
              <td class="ct" valign="top" width="34" height="13">
                Espécie
              </td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src=<?= $this->getImage('1.png') ?> width="1" border="0">
              </td>
              <td class="ct" valign="top" width="53" height="13">
                Quantidade
              </td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src=<?= $this->getImage('1.png') ?> width="1" border="0">
              </td>
              <td class="ct" valign="top" width="120" height="13">
                Nosso número
              </td>
            </tr>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src=<?= $this->getImage('1.png') ?> width="1" border="0">
              </td>
              <td class="cp" valign="top" width="298" height="12">
                <span class="""campo"><?= $beneficiario['nomeBeneficiario'] ?></span></td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src=<?= $this->getImage('1.png') ?> width="1" border="0">
              </td>
              <td class="cp" valign="top" width="126" height="12">
                <span class="campo">
                    <?= $beneficiario['agenciaCodigo'] ?>
                </span>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src=<?= $this->getImage('1.png') ?> width="1" border="0">
              </td>
              <td class="cp" valign="top" width="34" height="12">
                <span class="campo">
                    <?php echo $especie ?>
                </span>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src=<?= $this->getImage('1.png') ?> width="1" border="0">
              </td>
              <td class="cp" valign="top" width="53" height="12">
                <span class="campo">
                    <?php echo $quantidade ?>
                </span>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="120" height="12">
                <span class="campo">
                  <?= $nossoNumero; ?>-<?= $nossoNumero_dv; ?>
                </span>
              </td>
            </tr>
            <tr>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="298" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="298" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="126" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="126" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="34" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="34" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="53" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="53" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="120" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="120" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" colspan="3" height="13">Número do documento</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="132" height="13">CPF/CNPJ</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="134" height="13">Vencimento</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="180" height="13">Valor documento
              </td>
            </tr>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" colspan="3" height="12">
                <span class="campo">
                    <?php echo $numero_documento ?>
                </span>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="132" height="12">
                <span class="campo">
                    <?= $beneficiario['documento'] ?>
                </span>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="134" height="12">
                <span class="campo">
                    <?= $datas['vencimento'] ?>
                </span>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="180" height="12">
                <span class="campo">
                    <?php echo $valor_boleto ?>
                </span>
              </td>
            </tr>
            <tr>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="113" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="113" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="72" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="72" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="132" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="132" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="134" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="134" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="180" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="113" height="13">(-) Desconto / Abatimentos</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="112" height="13">(-) Outras deduções</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="113" height="13">(+) Mora / Multa</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="113" height="13">(+) Outros acréscimos</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="180" height="13">(=) Valor cobrado</td>
            </tr>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="113" height="12"></td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="112" height="12"></td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="113" height="12"></td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="113" height="12"></td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="180" height="12"></td>
            </tr>
            <tr>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="113" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="113" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="112" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="112" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="113" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="113" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="113" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="113" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="180" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="659" height="13">Sacado</td>
            </tr>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="659" height="12">
                <span class="campo">
                            <?= $pagador['nome'] ?>
                        </span></td>
            </tr>
            <tr>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="659" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="659" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" width="7" height="12"></td>
              <td class="ct" width="564">Demonstrativo</td>
              <td class="ct" width="7" height="12"></td>
              <td class="ct" width="88">Autenticação mecânica
              </td>
            </tr>
            <tr>
              <td width="7"></td>
              <td class="cp" width="564">
                <span class="campo">
                            <?= $descricoes[0] ?><br>
                            <?= $descricoes[1] ?><br>
                            <?= $descricoes[2] ?><br>
                        </span>
              </td>
              <td width="7"></td>
              <td width="88"></td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
          <tbody>
            <tr>
              <td width="7"></td>
              <td width="500" class="cp">
                <br><br><br>
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
              <td class="ct" width="666">
                <img height="1" src="<?= $this->getImage('6.png') ?>" width="665" border="0">
              </td>
            </tr>
          </tbody>
        </table><br>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
          <tr>
            <td class="cp" width="150">
              <span class="campo">
                <img src="<?= $this->getImage('logo_bradesco.png') ?>" width="150" height="40" border="0">
              </span>
            </td>
            <td width="3" valign="bottom">
              <img height="22" src="<?= $this->getImage('3.png') ?>" width="2" border="0">
            </td>
            <td class="cpt" width="58" valign="bottom">
              <div align="center">
                <font class="bc">
                  <?= $banco['codigo_banco_com_dv'] ?>
                </font>
              </div>
            </td>
            <td width="3" valign="bottom">
              <img height="22" src="<?= $this->getImage('3.png') ?>" width="2" border="0">
            </td>
            <td class="ld" align="right" width="453" valign="bottom"><span class="ld">
                        <span class="campotitulo">
                            <?php echo $linha_digitavel ?>
                        </span></span>
            </td>
          </tr>
          <tbody>
            <tr>
              <td colspan="5">
                <img height="2" src="<?= $this->getImage('2.png') ?>" width="666" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="472" height="13">Local de pagamento</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="180" height="13">Vencimento</td>
            </tr>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="472" height="12">Pagável em qualquer Banco até o vencimento</td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="180" height="12">
                <span class="campo">
                            <?= $datas['vencimento'] ?>
                        </span></td>
            </tr>
            <tr>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="472" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="472" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="180" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="472" height="13">Cedente</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="180" height="13">Agência/Código cedente
              </td>
            </tr>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="472" height="12">
                <span class="campo">
                            <?php echo $cedente ?>
                        </span></td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="180" height="12">
                <span class="campo">
                            <?php echo $agencia_codigo ?>
                        </span></td>
            </tr>
            <tr>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="472" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="472" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="180" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="113" height="13">Data do documento</td>
              <td class="ct" valign="top" width="7" height="13"> <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="153" height="13">N<u>o</u> documento
              </td>
              <td class="ct" valign="top" width="7" height="13"> <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="62" height="13">Espécie doc.
              </td>
              <td class="ct" valign="top" width="7" height="13"> <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="34" height="13">Aceite</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="82" height="13">Data processamento
              </td>
              <td class="ct" valign="top" width="7" height="13"> <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="180" height="13">Nosso número
              </td>
            </tr>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="113" height="12">
                <div align="left">
                  <span class="campo">
                                <?php echo $data_documento ?>
                            </span></div>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="153" height="12">
                <span class="campo">
                            <?php echo $numero_documento ?>
                        </span></td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="62" height="12">
                <div align="left"><span class="campo">
                                <?php echo $especie_doc ?>
                            </span>
                </div>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="34" height="12">
                <div align="left"><span class="campo">
                                <?php echo $aceite ?>
                            </span>
                </div>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="82" height="12">
                <div align="left">
                  <span class="campo">
                                <?php echo $data_processamento ?>
                            </span></div>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" align="right" width="180" height="12">
                <span class="campo">
                            <?php echo $nosso_numero ?>
                        </span></td>
            </tr>
            <tr>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="113" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="113" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="153" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="153" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="62" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="62" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="34" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="34" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="82" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="82" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="180" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0"></td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" COLSPAN="3" height="13">Uso do banco</td>
              <td class="ct" valign="top" height="13" width="7"> <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="83" height="13">Carteira</td>
              <td class="ct" valign="top" height="13" width="7">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="53" height="13">Espécie</td>
              <td class="ct" valign="top" height="13" width="7">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="123" height="13">Quantidade</td>
              <td class="ct" valign="top" height="13" width="7">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="ct" valign="top" width="72" height="13">
                Valor Documento</td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="180" height="13">(=")" Valor documento</td>
            </tr>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td valign="top" class="cp" height="12" COLSPAN="3">
                <div align="left">
                </div>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="83">
                <div align="left"> <span class="campo">
                                <?php echo $carteira ?>
                            </span></div>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="53">
                <div align="left"><span class="campo">
                                <?php echo $especie ?>
                            </span>
                </div>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="123"><span class="campo">
                            <?php echo $quantidade ?>
                        </span>
              </td>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="72">
                <span class="campo">
                            <?php echo $valor_unitario ?>
                        </span></td>
              <td class="cp" valign="top" width="7" height="12"> <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
              <td class="cp" valign="top" align="right" width="180" height="12">
                <span class="campo">
                            <?php echo $valor_boleto ?>
                        </span></td>
            </tr>
            <tr>
              <td valign="top" width="7" height="1"> <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="75" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="31" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="31" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="83" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="83" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="53" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="53" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="123" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="123" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="72" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="72" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
              <td valign="top" width="180" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
          <tbody>
            <tr>
              <td align="right" width="10">
                <table cellspacing="0" cellpadding="0" border="0" align="left">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12">
                        <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                    <tr>
                      <td valign="top" width="7" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td valign="top" width="468" rowspan="5">
                <font class="ct">Instruções (Texto de responsabilidade do cedente)</font><br><br><span class="cp"> <FONT class="campo">
                            <?php echo $instrucoes1; ?><br>
                            <?php echo $instrucoes2; ?><br>
                            <?php echo $instrucoes3; ?><br>
                            <?php echo $instrucoes4; ?></FONT><br><br>
                        </span></td>
              <td align="right" width="188">
                <table cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                      <td class="ct" valign="top" width="180" height="13">(-) Desconto / Abatimentos</td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12">
                        <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                      <td class="cp" valign="top" align="right" width="180" height="12"></td>
                    </tr>
                    <tr>
                      <td valign="top" width="7" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
                      </td>
                      <td valign="top" width="180" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td align="right" width="10">
                <table cellspacing="0" cellpadding="0" border="0" align="left">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12">
                        <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                    <tr>
                      <td valign="top" width="7" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="1" border="0"></td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td align="right" width="188">
                <table cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                      <td class="ct" valign="top" width="180" height="13">(-) Outras deduções</td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12"> <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
                      <td class="cp" valign="top" align="right" width="180" height="12"></td>
                    </tr>
                    <tr>
                      <td valign="top" width="7" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
                      </td>
                      <td valign="top" width="180" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td align="right" width="10">
                <table cellspacing="0" cellpadding="0" border="0" align="left">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0"></td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12">
                        <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                    <tr>
                      <td valign="top" width="7" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td align="right" width="188">
                <table cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                      <td class="ct" valign="top" width="180" height="13">(+) Mora / Multa</td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12">
                        <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                      <td class="cp" valign="top" align="right" width="180" height="12"></td>
                    </tr>
                    <tr>
                      <td valign="top" width="7" height="1"> <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0"></td>
                      <td valign="top" width="180" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0"></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td align="right" width="10">
                <table cellspacing="0" cellpadding="0" border="0" align="left">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12">
                        <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                    <tr>
                      <td valign="top" width="7" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td align="right" width="188">
                <table cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                      <td class="ct" valign="top" width="180" height="13">(+) Outros acréscimos</td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12">
                        <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                      <td class="cp" valign="top" align="right" width="180" height="12"></td>
                    </tr>
                    <tr>
                      <td valign="top" width="7" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
                      </td>
                      <td valign="top" width="180" height="1">
                        <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td align="right" width="10">
                <table cellspacing="0" cellpadding="0" border="0" align="left">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12">
                        <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td align="right" width="188">
                <table cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    <tr>
                      <td class="ct" valign="top" width="7" height="13">
                        <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                      <td class="ct" valign="top" width="180" height="13">(=) Valor cobrado</td>
                    </tr>
                    <tr>
                      <td class="cp" valign="top" width="7" height="12">
                        <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
                      </td>
                      <td class="cp" valign="top" align="right" width="180" height="12"></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" width="666" border="0">
          <tbody>
            <tr>
              <td valign="top" width="666" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="666" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="659" height="13">Sacado</td>
            </tr>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="659" height="12"><span class="campo">
                            <?php echo $sacado ?>
                        </span>
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="cp" valign="top" width="7" height="12">
                <img height="12" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="659" height="12"><span class="campo">
                            <?php echo $endereco1 ?>
                        </span>
              </td>
            </tr>
          </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="cp" valign="top" width="472" height="13">
                <span class="campo">
                            <?php echo $endereco2 ?>
                        </span></td>
              <td class="ct" valign="top" width="7" height="13">
                <img height="13" src="<?= $this->getImage('1.png') ?>" width="1" border="0">
              </td>
              <td class="ct" valign="top" width="180" height="13">Cód. baixa
              </td>
            </tr>
            <tr>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="472" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="472" border="0">
              </td>
              <td valign="top" width="7" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="7" border="0">
              </td>
              <td valign="top" width="180" height="1">
                <img height="1" src="<?= $this->getImage('2.png') ?>" width="180" border="0">
              </td>
            </tr>
          </tbody>
        </table>
        <table cellSpacing="0" cellPadding="0" border="0" width="666">
          <tbody>
            <tr>
              <td class="ct" width="7" height="12"></td>
              <td class="ct" width="409">Sacador/Avalista</td>
              <td class="ct" width="250">
                <div align="right">Autenticação mecânica - <b class="cp">Ficha de Compensação</b></div>
              </td>
            </tr>
            <tr>
              <td class="ct" colspan="3"></td>
            </tr>
          </tbody>
        </table>
        <table cellSpacing="0" cellPadding="0" width="666" border="0">
          <tbody>
            <tr>
              <td vAlign="bottom" align="left" height="50">
                <?php echo $codigo_barras; ?>
              </td>
            </tr>
          </tbody>
        </table>
        <table cellSpacing="0" cellPadding="0" width="666" border="0">
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
              <td class="ct" width="666">
                <img height="1" src="<?= $this->getImage('6.png') ?>" width="665" border="0">
              </td>
            </tr>
          </tbody>
        </table>

    </body>
</html>
