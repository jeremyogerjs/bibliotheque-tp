<?php


abstract class Manager
{
    protected $_serverName;
    protected $_userName;
    protected $_password;
    protected $_dbName;


    public function __construct()
    {
        $this -> hydrate($this -> getConfig());
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
    public function getConfig()
    {
        require('./db-config.php');

        return $config;
    }

    public function dbConnect ()
    {
        try{

            $conn = new PDO("mysql:host=".$this -> _serverName .";dbname=".$this -> _dbName,$this -> _userName, $this -> _password);
    
            $conn -> setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
            $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    
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