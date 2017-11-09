<?php
namespace BoletoBancario;

class Endereco
{

    private $logradouro;
    private $bairro;
    private $cep;
    private $cidade;
    private $uf;

    /**
     * @param string $logradouro
     * @param string $bairro
     * @param string $cep
     * @param string $cidade
     * @param string $uf
     */
    public function __construct(
        string $logradouro = '',
        string $bairro = '',
        string $cep = '',
        string $cidade = '',
        string $uf = ''
    ) {
        $this->logradouro  = $logradouro;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->uf = $uf;
    }

    /**
     * @return string
     */
    public function getLogradouro() : string
    {
        return $this->logradouro;
    }

    /**
     * @param string $logradouro
     * @return Endereco
     */
    public function comLogradouro(string $logradouro) : Endereco
    {
        $this->logradouro = $logradouro;
        return $this;
    }

    /**
     * @return string
     */
    public function getBairro() : string
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     * @return Endereco
     */
    public function comBairro(string $bairro) : Endereco
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return string
     */
    public function getCep() : string
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     * @return Endereco
     */
    public function comCep(string $cep) : Endereco
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return string
     */
    public function getCidade() : string
    {
        return $this->bairro;
    }

    /**
     * @param string $cidade
     * @return Endereco
     */
    public function comCidade(string $cidade) : Endereco
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getUf() : string
    {
        return $this->bairro;
    }

    /**
     * @param string $uf
     * @return Endereco
     */
    public function comUf(string $uf) : Endereco
    {
        $this->uf = $uf;
        return $this;
    }

    /**
     * @return string
     */
    public function getEnderecoCompleto() : string
    {
        return ($this->logradouro ? $this->logradouro.", " : "").
               ($this->bairro ? $this->bairro." " : "").
               ($this->cep ? $this->cep." - " : "").
               ($this->cidade ? $this->cidade." - " : "").
               ($this->uf ?? "");
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getEnderecoCompleto();
    }

    /**
     * @return array
     */
    public function toArray() : array
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
