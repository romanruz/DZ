
<?php
require_once 'db.php';
class User
{
    public $name;
    public $password;
    public $password2;
    public $email;
    public $errors = [];
    function __construct($data)
    {
        $this->name = $data['name'];
        $this->password = $data['password'];
        $this->password2 = $data['password2'];
        $this->email = $data['email'];
    }
    function valid ($con)
    {

        $a = $con->query("SELECT * FROM  `login` WHERE login = '$this->name'");
        foreach ($a as $item){
            var_dump($item);
            if (!empty($item)){
                $this->errors[] = 'Name already exist';
            }

        }

        if (trim($this->name)==''){
            $this->errors[]='input login';
        }
        if (trim($this->email)==''){
            $this->errors[]='input email';
        }
        if ($this->password==''){
            $this->errors[]='input password';
        }
        if ($this->password != $this->password2) {
            $this->errors[] = 'passwords not much';
        }else {
            $this->password = password_hash($this->password,PASSWORD_DEFAULT);
        }

    }

}