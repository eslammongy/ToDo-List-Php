<?php

class DbConnection
{

    private string $userName = "root";
    private string $password = "";
    private string $server =  "mysql:host=localhost;dbname=todos_list";
    private array $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $dbConnect;

    public function openDbConnection()
    {
        try
        {
            $this->dbConnect = new PDO($this->server, $this->userName,$this->password,$this->options);
            echo "<h1 style='text-align: center;color: orangered'>Connection Success</h1>";
            return $this->dbConnect;
        }
        catch (PDOException $exception)
        {
            echo "<h1 style='text-align: center;color: red'>Connection Field</h1> :" . $exception->getMessage();
        }
        return $this->dbConnect;
    }

}


