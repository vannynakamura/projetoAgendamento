<?php


class Agendamento
{
    private $id;
    /**
     * @var int
     */
    private $nomeP;
    /**
     * @var int
     */
    private $nomeM;
    /**
     * @var string
     */
    private $data;
    /**
     * @var string
     */
    private $horario;

    /**
     * @return mixed
     */
    public function getId() :int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Agendamento
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getNomeP()
    {
        return $this->nomeP;
    }

    /**
     * @param int $nomeP
     * @return $this
     */
    public function setNomeP(int $nomeP)
    {
        $this->nomeP = $nomeP;
        return $this;
    }

    /**
     * @return int
     */
    public function getNomeM()
    {
        return $this->nomeM;
    }

    /**
     * @param int $nomeM
     * @return $this
     */
    public function setNomeM(int $nomeM)
    {
        $this->nomeM = $nomeM;
        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return $this
     */
    public function setData(string $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * @param string $horario
     * @return $this
     */
    public function setHorario(string $horario)
    {
        $this->horario = $horario;
        return $this;
    }


}