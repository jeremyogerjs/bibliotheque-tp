<?php
require('./models/UserManager.php');


class UserControllers extends User
{
    public function connection()
    {
        if(!empty($_POST))
        {
            $result = $this -> login();
            if($result > 0)
            {
                require('./views/forms/formAuth.php');
            }
            else
            {
                echo 'Mauvais login ou mot de passe';
            }
        }
        else
        {
            require('./views/forms/formAuth.php');
        }
    }
    public function inscription()
    {
        if(!empty($_POST))
        {
            $result = $this -> signIn();
            if($result > 0)
            {
                echo "inscription reussi !!!";
            }
            else
            {
                echo"une erreur est survenue ";
            }
        }
        else
        {
            require('./views/forms/formAuth.php');
        }
    }
}