<?php
namespace BoletoBancario;

class Pagador
{
    private $nome;
    private $documento;
    private $endereco;

    public function __construct(
        string $nome = "",
        string $documento = "",
        Endereco $endereco = null
    )
    {
        $this->nome = $nome;
        $this->documento = $documento;
        $this->endereco = $nedereco ?? new Endereco;
    }

    public function getNome() : string
    {
        return $this->nome;
    }

    public function comNome(string $nome) : Pagador
    {
        $this->nome = $nome;
        return $this;
    }

    public function getDocumento() : string
    {
        return $this->documento;
    }

    public function comDocumento(string $documento) : Pagador
    {
        $this->documento = $documento;
        return $this;
    }

    public function getEndereco() : Endereco
    {
        return $this->endereco;
    }

    public function comEndereco(Endereco $endereco) : Pagador
    {
        $this->endereco = $endereco;
        return $this;
    }
}
