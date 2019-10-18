<?php


class connect
{
    private $servername;
    private $username;
    private $password;

    public function __construct()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '147852';
    }

    public function open()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=Cadastro", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}