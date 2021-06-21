<?php
require_once('./models/Manager.php');


class User extends Manager
{
    private $_user;
    private $_pass;

    private function setUser($userName)
    {
        $this -> _user = $userName;
    }
    private function setPass($password)
    {
        $this -> _pass = md5($password);
    }
    public function login()
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $userName = $this -> setUser($_POST['userName']);
            $password = $this -> setPass($_POST['password']);
            
            $sql = "SELECT * FROM user WHERE userName = ? AND password = ? LIMIT 1";
    
            $result = $db -> prepare($sql);
    
            $result -> execute([$userName,$password]);
    
            $results = $result -> fetchAll();
    
            return $results;
        }
    }
    public function signIn()
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $userName = $this -> setUser($_POST['userName']);
            $password = $this -> setPass($_POST['password']);

            $sql = "INSERT INTO user(userName,password) VALUES (?,?)";
            $result = $db -> prepare($sql);
            $result -> bindParam(1,$userName);
            $result -> bindParam(1,$password);

            $result -> execute();
            return $result;
        }
    }
}