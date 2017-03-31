# GOPHP Boleto
Este é um modulo da comunidade GOPHP que foi baseado no [Stella Boleto](https://github.com/caelum/caelum-stella/wiki/Stella-boleto)
que é o projeto da Caellum feito em JAVA e também na biblioteca PHPBoleto. O objetivo é facilitar o trabalho com o boleto para todos os principais bancos de nosso País,
oferencendo também a opcão para se trabalhar com remessa/retorno para boletos registrados.

## Status
Está biblioteca está dando seus primeiros passo no seu desenvolvimento onde poderá ser acompanhado via ISSUES todos o desenvolvimento
permitindo colaboração de qualquer passoa que se disponha a discutir e realizar um Pull Request.


# Gerando Boletos
* TO DO

## Termos Relevantes

* **Aceite**: diz se o banco deve aceitar o boleto após a data de vencimento. Padrão: 'N'
* **Espécie de Documento**: identificador do tipo de boleto. Padrão: "DV"
* **Número do Documento**: código informado pelo banco para identificação do cliente
* **Carteira**: código informado pelo banco pra identificação do tipo do boleto
* **Número do Convênio**: código que identifica um emissor junto ao seu banco para associar seus boletos. Fornecido pelo banco
* **Nosso Número**: código que o cedente escolhe para manter controle sobre seus boletos. Esse valor serve para o cedente identificar quais boletos foram pagos ou não. Recomenda-se o uso de números sequênciais, na geração de diversos boletos, para facilitar a identificação dos boletos pagos
* **Beneficiário**: pessoa/empresa que gera o boleto
* **Pagador**: pessoa/empresa que deve pagar o boleto
