<?php


class Paciente
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
    public function getPessoa(): ?int
    {
        return $this->pessoa;
    }

    /**
     * @param int $pessoa
     * @return $this
     */
    public function setPessoa(?int $pessoa)
    {
        $this->pessoa = $pessoa;
        return $this;
    }

    /**
     * @return int
     */
    public function getContato() :?int
    {
        return $this->contato;
    }

    /**
     * @param int $contato
     * @return $this
     */
    public function setContato(?int $contato)
    {
        $this->contato = $contato;
        return $this;
    }


}