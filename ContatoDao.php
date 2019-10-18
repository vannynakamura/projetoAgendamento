<?php

require 'Contato.php';
require_once 'connect.php';

class ContatoDao extends Contato
{

    private $connect;

    public function __construct()
    {
        $conn = new Connect();
        $this->connect = $conn->open();
    }

    public function save() :bool
    {
        $query = "INSERT INTO Contato(email, telefone, endereco, numero, cep, cidade, estado) VALUES (:e, :t, :d, :n, :c, :i, :s)";

        $stm = $this->connect->prepare($query);
        $stm->bindValue(':e', $this->getEmail());
        $stm->bindValue(':t', $this->getTelefone());
        $stm->bindValue(':d', $this->getEndereco());
        $stm->bindValue(':n', $this->getNumero());
        $stm->bindValue(':c', $this->getCep());
        $stm->bindValue(':i', $this->getCidade());
        $stm->bindValue(':s', $this->getEStado());

        $stm->execute();

        $this->setId($this->connect->lastInsertId());

        return $stm->rowCount() > 0;
    }


    public function update(): bool
    {
        $query = "UPDATE Contato SET email = :e, telefone = :t, endereco = :d, numero = :n, cep = :c, cidade = :i, estado = :s
                    WHERE id = :id";

        try {
            $stm = $this->connect->prepare($query);

            $stm->bindValue(':id', $this->getId());
            $stm->bindValue(':e', $this->getEmail());
            $stm->bindValue(':t', $this->getTelefone());
            $stm->bindValue(':d', $this->getEndereco());
            $stm->bindValue(':n', $this->getNumero());
            $stm->bindValue(':c', $this->getCep());
            $stm->bindValue(':i', $this->getCidade());
            $stm->bindValue(':s', $this->getEStado());

            $stm->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }


    public function findAll()
    {
        $query = "SELECT id, telefone, cidade FROM Contato";
        $stm = $this->connect->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    function delete($id) {

        $query = "DELETE FROM Contato WHERE id = :idC";

        try {
            $stm = $this->connect->prepare($query);

            $stm->bindValue(':idC', $id);
            $stm->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
