<?php
namespace BoletoBancario;

class Pagador
{
    private $nome;
    private $documento;
    private $endereco;

    /**
     * @param string $nome
     * @param string $documento
     * @param Endereco $endereco
     */
    public function __construct(
        string $nome = "",
        string $documento = "",
        Endereco $endereco = null
    ) {
        $this->nome = $nome;
        $this->documento = $documento;
        $this->endereco = $nedereco ?? new Endereco;
    }

    /**
     * @return string
     */
    public function getNome() : string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Pagador
     */
    public function comNome(string $nome) : Pagador
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumento() : string
    {
        return $this->documento;
    }

    /**
     * @param string $documento
     * @return Pagador
     */
    public function comDocumento(string $documento) : Pagador
    {
        $this->documento = $documento;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndereco() : Endereco
    {
        return $this->endereco;
    }

    /**
     * @param Endereco $endereco
     * @return Pagador
     */
    public function comEndereco(Endereco $endereco) : Pagador
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        return [
            'nome' => $this->nome,
            'documento' => $this->documento,
            'endereco' => $this->endereco->toArray()
        ];
    }
}
