<?php

require 'Agendamento.php';
require_once 'connect.php';


class AgendamentoDao extends Agendamento
{

    private $connect;


    public function __construct()
    {
        $conn = new Connect();
        $this->connect = $conn->open();
    }

    public function save(): bool
    {
        $query = "INSERT INTO Agendamento(id_paciente, id_medico, data, horario) VALUES (:p, :m, :d, :h)";


        $stm = $this->connect->prepare($query);

        $stm->bindValue('p', $this->getNomeP());
        $stm->bindValue('m', $this->getNomeM());
        $stm->bindValue('d', $this->getData());
        $stm->bindValue('h', $this->getHorario());

        $stm->execute();

        return $stm->rowCount() > 0;


    }


    public function findAll()
    {
        $query = "SELECT 
                    ag.idAgendamento,
                    ag.horario,
                    ag.data,
                    me.especialidade,
                    CONCAT(pp.nome, ' ', pp.sobrenome) AS nomePaciente,
                    CONCAT(pm.nome, ' ', pm.sobrenome) AS nomeMedico
                
                FROM 
                    Agendamento ag
                        INNER JOIN
                    Paciente pa ON ag.id_paciente = pa.id
                        INNER JOIN
                    Pessoa pp ON pa.id_pessoa = pp.idPessoa
                        INNER JOIN
                    Medico me ON ag.id_medico = me.id
                        INNER JOIN
                    Pessoa pm ON me.id_pessoa = pm.idPessoa
                    ";

        $stm = $this->connect->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = "SELECT 
                    ag.idAgendamento,
                    ag.id_paciente AS idPaciente,
                    ag.id_medico AS idMedico,
                    ag.horario,
                    ag.data,
                    me.especialidade,
                    me.crm,
                    CONCAT(pp.nome, ' ', pp.sobrenome) AS nomePaciente,
                    CONCAT(pm.nome, ' ', pm.sobrenome) AS nomeMedico
                FROM 
                    Agendamento ag
                        INNER JOIN
                    Paciente pa ON ag.id_paciente = pa.id
                        INNER JOIN
                    Pessoa pp ON pa.id_pessoa = pp.idPessoa
                        INNER JOIN
                    Medico me ON ag.id_medico = me.id
                        INNER JOIN
                    Pessoa pm ON me.id_pessoa = pm.idPessoa
                WHERE
                    ag.idAgendamento = :idAg
                    ";

        $stm = $this->connect->prepare($query);
        $stm->bindValue(':idAg', $id);

        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function update(): bool
    {
        $query = "UPDATE Agendamento SET data = :d, horario = :h, id_medico = :idM, id_paciente = :idP
                    WHERE idAgendamento = :id";

        try {
            $stm = $this->connect->prepare($query);

            $stm->bindValue(':id', $this->getId());
            $stm->bindValue(':d', $this->getData());
            $stm->bindValue(':h', $this->getHorario());
            $stm->bindValue(':idM', $this->getNomeM());
            $stm->bindValue(':idP', $this->getNomeP());
            $stm->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM Agendamento WHERE idAgendamento = :idAg";

        try {
            $stm = $this->connect->prepare($query);

            $stm->bindValue(':idAg', $id);
            $stm->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}