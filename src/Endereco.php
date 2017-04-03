<?php
namespace BoletoBancario;

class Endereco
{

    private $logradouro;
    private $bairro;
    private $cep;
    private $cidade;
    private $uf;

    public function __construct(
        string $logradouro = "",
        string $bairro = "",
        string $cep = "",
        string $cidade = "",
        string $uf = ""
    )
    {
        $this->logradouro  = $logradouro;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->uf = $uf;
    }

    public function getLogradouro() : string
    {
        return $this->logradouro;
    }

    public function comLogradouro(string $logradouro) : Endereco
    {
        $this->logradouro = $logradouro;
        return $this;
    }

    public function getBairro() : string
    {
        return $this->bairro;
    }

    public function comBairro(string $bairro) : Endereco
    {
        $this->bairro = $bairro;
        return $this;
    }

    public function getCep() : string
    {
        return $this->bairro;
    }

    public function comCep(string $cep) : Endereco
    {
        $this->cep = $cep;
        return $this;
    }

    public function getCidade() : string
    {
        return $this->bairro;
    }

    public function comCidade(string $cidade) : Endereco
    {
        $this->cidade = $cidade;
        return $this;
    }

    public function getUf() : string
    {
        return $this->bairro;
    }

    public function comUf(string $uf) : Endereco
    {
        $this->uf = $uf;
        return $this;
    }

    public function getEnderecoCompleto() : string
    {
        return ($this->logradouro ? $this->logradouro.", " : "").
               ($this->bairro ? $this->bairro." " : "").
               ($this->cep ? $this->cep." - " : "").
               ($this->cidade ? $this->cidade." - " : "").
               ($this->uf ? $this->uf." - " : "");
    }

    public function __toString()
    {
        return $this->getEnderecoCompleto();
    }

    public function toArray()
    {
        return [
            'logradouro' => $this->logradouro,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'cep'    => $this->cep,
            'uf'     => $this->uf
        ];
    }
}
