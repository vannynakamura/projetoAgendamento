<?php


class Contato
{
    /**
     * @var $id int
     */
    private $id;
    /**
     * @var $email string
     */
    private $email;
    /**
     * @var $telefone string
     */
    private $telefone;
    /**
     * @var $endereco string
     */
    private $endereco;
    /**
     * @var $numero int
     */
    private $numero;
    /**
     * @var $cep string
     */
    private $cep;
    /**
     * @var $cidade string
     */
    private $cidade;
    /**
     * @var $estado string
     */
    private $estado;


    /*------------------------getters and setters----------------------------*/


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     * @return $this
     */
    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     * @return $this
     */
    public function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     * @return $this
     */
    public function setNumero(int $numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     * @return $this
     */
    public function setCep(string $cep)
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     * @return $this
     */
    public function setCidade(string $cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     * @return $this
     */
    public function setEstado(string $estado)
    {
        $this->estado = $estado;
        return $this;
    }


}