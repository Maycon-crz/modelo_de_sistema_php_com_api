<?php 

namespace Source\Models\Authentication\DataTransferObjects;

class LoginDTO{
    private $frontEnd;
    private $email;
    private $password;

    public function getFrontEnd(){
        return $this->frontEnd;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setFrontEnd($frontEnd){
        $this->frontEnd = $frontEnd;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
}

?>