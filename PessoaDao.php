<?php

require 'Pessoa.php';
require 'connect.php';

class PessoaDao extends Pessoa
{
    private $connect;


    public function __construct()
    {
        $conn = new Connect();
        $this->connect = $conn->open();
    }

    public function save(): bool
    {
        $query = "INSERT INTO Pessoa(nome, sobrenome, sexo, nascimento, cpf, estado_Civil) VALUES (:n, :s, :x, :m, :c, :e)";

        try {
            $stm = $this->connect->prepare($query);

            $stm->bindValue(':n', $this->getNome());
            $stm->bindValue(':s', $this->getSobrenome());
            $stm->bindValue(':x', $this->getSexo());
            $stm->bindValue(':m', $this->getNascimento());
            $stm->bindValue(':c', $this->getCpf());
            $stm->bindValue(':e', $this->getEstadoCivil());

            $stm->execute();
            $this->setId($this->connect->lastInsertId());

            return $stm->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }


    public function update(): bool
    {
        $query = "UPDATE Pessoa SET nome = :n, sobrenome = :s, sexo = :x, nascimento = :m, cpf = :c, estado_Civil = :e
                    WHERE idPessoa = :id";

        try {
            $stm = $this->connect->prepare($query);

            $stm->bindValue(':id', $this->getId());
            $stm->bindValue(':n', $this->getNome());
            $stm->bindValue(':s', $this->getSobrenome());
            $stm->bindValue(':x', $this->getSexo());
            $stm->bindValue(':m', $this->getNascimento());
            $stm->bindValue(':c', $this->getCpf());
            $stm->bindValue(':e', $this->getEstadoCivil());

            $stm->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }


 /*Função para mostrar apenas as informações relevantes na minha tabela em relação a classe Pessoa*/


    public function findAll()
    {
        $query = "SELECT id, nome, sobrenome, nascimento, cpf FROM Pessoa";

        $stm = $this->connect->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $query = "DELETE FROM Pessoa WHERE idPessoa = :idP";

        try {
            $stm = $this->connect->prepare($query);

            $stm->bindValue(':idP', $id);
            $stm->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}