<?php
require_once 'connect.php';
require 'Paciente.php';

class PacienteDao extends Paciente
{

    private $connect;


    public function __construct()
    {
        $conn = new Connect();
        $this->connect = $conn->open();
    }

    public function save(): bool
    {
        $query = "INSERT INTO Paciente(id_pessoa, id_contato) VALUES (:p, :c)";

        try {
            $stm = $this->connect->prepare($query);

            $stm->bindValue('p', $this->getPessoa());
            $stm->bindValue('c', $this->getContato());

            $stm->execute();

            $this->setId($this->connect->lastInsertId());

            return $stm->rowCount() > 0;
        } catch (Exception $e) {
            return false;
        }
    }


    public function findAll()
    {
        $query = "SELECT 
                        pa.id, 
                        CONCAT(pessoa.nome, ' ', pessoa.sobrenome) AS nomePa, 
                        pessoa.cpf,
                        contato.email,
                        contato.telefone,
                        pessoa.idPessoa,
                        contato.id AS idContato
                    FROM
                        Paciente pa
                            INNER JOIN
                        Pessoa pessoa ON pa.id_pessoa = pessoa.idPessoa
                        INNER JOIN 
                            Contato contato ON pa.id_contato = contato.id
                        ";

        $stm = $this->connect->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = "SELECT 
                        pa.id,
                        pessoa.nome,
                        pa.id_pessoa AS idPessoa,
                        pa.id_contato AS idContato,
                        pessoa.sobrenome,
                        CONCAT(pessoa.nome, ' ', pessoa.sobrenome) AS nomePa, 
                        pessoa.cpf,
                        contato.email,
                        contato.telefone,
                        pessoa.estado_Civil,
                        pessoa.nascimento,
                        pessoa.sexo,
                        contato.endereco,
                        contato.numero,
                        contato.cep,
                        contato.cidade,
                        contato.estado
                    FROM
                        Paciente pa
                            INNER JOIN
                        Pessoa pessoa ON pa.id_pessoa = pessoa.idPessoa
                        INNER JOIN 
                            Contato contato ON pa.id_contato = contato.id
                    WHERE 
                       pa.id = :idPa
                        ";

        $stm = $this->connect->prepare($query);
        $stm->bindValue(':idPa', $id);
        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC);
    }


}