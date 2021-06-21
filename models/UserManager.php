<?php
require_once('./models/Manager.php');


class User extends Manager
{
    private $_user;
    private $_pass;

    private function setUser($userName)
    {
        return $this -> _user = $userName;
    }
    private function setPass($password)
    {
        return $this -> _pass = $password;
    }
    public function login()
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $userName = $this -> setUser($_POST['userName']);
            $password = $this -> setPass($_POST['password']);
            
            $sql = "SELECT * FROM user WHERE userName = '$userName' AND pass = '$password'";
    
            $result = $db -> prepare($sql);
            $result -> execute();
            $results = $result ->fetch();
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

            $sql = "INSERT INTO user (userName,pass) VALUES ( ?,?)";
            $result = $db -> prepare($sql);

            $results = $result -> execute([$userName,$password]);

            return $results;
        }
    }
}