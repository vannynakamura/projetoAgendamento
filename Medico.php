<?php


class Medico
{
    /**
     * @var $id int
     */
    private $id;
    /**
     * @var $pessoa int
     */
    private $pessoa;
    /**
     * @var $contato int
     */
    private $contato;
    /**
     * @var $especialidade string
     */
    private $especialidade;
    /**
     * @var $crm string
     */
    private $crm;

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
     * @return int
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * @param int $pessoa
     * @return $this
     */
    public function setPessoa(int $pessoa)
    {
        $this->pessoa = $pessoa;
        return $this;
    }

    /**
     * @return int
     */
    public function getContato()
    {
        return $this->contato;
    }

    /**
     * @param int $contato
     * @return $this
     */
    public function setContato(int $contato)
    {
        $this->contato = $contato;
        return $this;
    }

    /**
     * @return string
     */
    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    /**
     * @param string $especialidade
     * @return $this
     */
    public function setEspecialidade(string $especialidade)
    {
        $this->especialidade = $especialidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getCrm()
    {
        return $this->crm;
    }

    /**
     * @param string $crm
     * @return $this
     */
    public function setCrm(string $crm)
    {
        $this->crm = $crm;
        return $this;
    }





}