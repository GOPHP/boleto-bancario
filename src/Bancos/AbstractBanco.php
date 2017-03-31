<?php
namespace BoletoBancario\Bancos;

use BoletoBancario\Banco;

interface AbstractBanco implements Banco
{
    public abstract function getName();
}
