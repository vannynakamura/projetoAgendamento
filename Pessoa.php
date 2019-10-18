<?php


class Pessoa
{
    /**
     * @var $id int
     */
    private $id;
    /**
     * @var $nome string
     */
    private $nome;
    /**
     * @var $sobrenome string
     */
    private $sobrenome;
    /**
     * @var $sexo string
     */
    private $sexo;
    /**
     * @var $nascimento string
     */
    private $nascimento;
    /**
     * @var $cpf int
     */
    private $cpf;
    /**
     * @var $estadoCivil string
     */
    private $estadoCivil;


    /*----------------------getters and setters--------------------------*/


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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return $this
     */
    public function setNome(string $nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * @param string $sobrenome
     * @return $this
     */
    public function setSobrenome(string $sobrenome)
    {
        $this->sobrenome = $sobrenome;
        return $this;
    }

    /**
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     * @return $this
     */
    public function setSexo(string $sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }

    /**
     * @return string
     */
    public function getNascimento()
    {
        return $this->nascimento;
    }

    /**
     * @param string $nascimento
     * @return $this
     */
    public function setNascimento(string $nascimento)
    {
        $this->nascimento = $nascimento;
        return $this;
    }

    /**
     * @return int
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param int $cpf
     * @return $this
     */
    public function setCpf(int $cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * @param string $estadoCivil
     * @return $this
     */
    public function setEstadoCivil(string $estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;
        return $this;
    }

}