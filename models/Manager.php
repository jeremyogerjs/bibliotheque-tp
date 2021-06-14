<?php


class Manager
{
    private $_serverName;
    private $_userName;
    private $_password;
    private $_dbName;


    public function __construct($donnees = array())
    {
        $this -> hydrate($donnees);
    }

    public function hydrate ($donnees)
    {
        foreach($donnees as $key => $value)
        {
            $method = 'set' . ucfirst($key);

            if(method_exists($this,$method))
            {
                $this -> $method($value);
            }
        }
    }

    public function dbConnect ()
    {
        try{

            $conn = new PDO("mysql:host=".$this -> _serverName .";dbname=".$this -> _dbName,$this -> _userName, $this -> _password);
    
            $conn -> setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
    
            echo "connected success";
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "connection fail : " . $e ->getMessage();
        }
    }

    public function setServerName ($servername)
    {
        $this -> _serverName = $servername;
    }
    public function setUserName ($username)
    {
        $this -> _userName = $username;
    }
    public function setPassword ($password)
    {
        $this -> _password = $password;
    }
    public function setDbName ($dbname)
    {
        $this -> _dbName = $dbname;
    }
    
}