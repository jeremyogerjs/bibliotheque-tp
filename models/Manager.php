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
    private function getConfig()
    {
        require('./db-config.php');

        return $config;
    }

    protected function dbConnect ()
    {
        try{

            $conn = new PDO("mysql:host=".$this -> _serverName .";dbname=".$this -> _dbName,$this -> _userName, $this -> _password);
    
            $conn -> setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
            $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "connection fail : " . $e ->getMessage();
        }
    }
    public function getAll ($table,$db)
    {
        $sql = "SELECT * FROM $table";

        $result = $db -> prepare($sql);

        $result -> execute();

        $results = $result ->fetchAll();

        return $results;
    }
    public function getSingle($table,$db)
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM $table WHERE id = $id";

        $result = $db ->prepare($sql);

        $result -> execute();

        $results = $result -> fetch();

        return $results;
    }
    //setter
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