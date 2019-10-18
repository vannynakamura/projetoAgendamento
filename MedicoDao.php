<?php
require 'Medico.php';
require_once 'connect.php';

class MedicoDao extends Medico
{

    private $connect;


    public function __construct()
    {
        $conn = new Connect();
        $this->connect = $conn->open();
    }

    public function save(): bool
    {
        $query = "INSERT INTO Medico(id_pessoa, id_contato, especialidade, crm) VALUES (:p, :c, :e, :r)";


        $stm = $this->connect->prepare($query);

        $stm->bindValue('p', $this->getPessoa());
        $stm->bindValue('c', $this->getContato());
        $stm->bindValue('e', $this->getEspecialidade());
        $stm->bindValue('r', $this->getCrm());

        $stm->execute();

        $this->setId($this->connect->lastInsertId());


        return $stm->rowCount() > 0;


    }


    public function findAll()
    {
        $query = "SELECT 
                           m.id AS idMedico, 
                           CONCAT(pessoa.nome, ' ', pessoa.sobrenome) AS nomeMed,
                           m.crm,
                           m.especialidade,
                           contato.telefone,
                           contato.email,
                           pessoa.idPessoa,
                           contato.id AS idContato
                                                                              
                    FROM Medico m 
                        inner join 
                        Pessoa pessoa on m.id_pessoa = pessoa.idPessoa
                        inner join
                        Contato contato on m.id_contato = contato.id
                        ";


        $stm = $this->connect->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = "SELECT 
                           m.id AS idMedico,
                           m.id_pessoa AS idPessoa,
                           m.id_contato AS idContato,
                           pessoa.nome,
                           pessoa.sobrenome,
                           CONCAT(pessoa.nome, ' ', pessoa.sobrenome) AS nomeMed,
                           m.crm,
                           m.especialidade,
                           contato.telefone,
                           contato.email,
                           contato.endereco,
                           contato.numero,
                           contato.cep,
                           contato.cidade,
                           contato.estado,
                           pessoa.sexo,
                           pessoa.nascimento,
                           pessoa.cpf,
                           pessoa.estado_Civil                                                         
                    FROM Medico m 
                        inner join 
                        Pessoa pessoa on m.id_pessoa = pessoa.idPessoa
                        inner join
                        Contato contato on m.id_contato = contato.id
                    WHERE
                        m.id = :idMed
                        ";


        $stm = $this->connect->prepare($query);
        $stm->bindValue(':idMed', $id);

        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC);
    }


    public function update(): bool
    {
        $query = "UPDATE Medico SET especialidade = :e, crm = :r
                    WHERE id = :id";

        try {
            $stm = $this->connect->prepare($query);

            $stm->bindValue(':id', $this->getId());
            $stm->bindValue(':e', $this->getEspecialidade());
            $stm->bindValue(':r', $this->getCrm());

            $stm->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }
}