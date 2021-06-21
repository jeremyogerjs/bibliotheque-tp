<?php
require('./models/UserManager.php');


class UserControllers extends User
{
    public function connection()
    {
        if(!empty($_POST))
        {
            $result = $this -> login();
            if($result)
            {
                //marche pas !!!!!
                $_SESSION['user'] = [
                    'userName' => $result['userName'],
                    'password' => $result['pass'] 
                ];
                $error = false;
                $msg = 'Connecté avec success !!!';
                require('./views/forms/formAuth.php');
            }
            else
            {
                $error = true;
                $msg = 'Mauvais login ou mot de passe';
                require('./views/forms/formAuth.php');
            }
        }
        else
        {
            $error = false;
            require('./views/forms/formAuth.php');
        }
    }
    public function inscription()
    {
        if(!empty($_POST))
        {
            $result = $this -> signIn();
            if($result)
            {
                $error = false;
                $msg = 'Incrit avec success !!!';
                require('./views/forms/formAuth.php');
            }
            else
            {
                $error = true;
                $msg = 'Erreur champ invalide !';
                require('./views/forms/formAuth.php');
            }
        }
        else
        {
            $error = false;
            require('./views/forms/formAuth.php');
        }
    }
}