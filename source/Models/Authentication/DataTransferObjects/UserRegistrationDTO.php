<?php

namespace Source\Models\Authentication\DataTransferObjects;

class UserRegistrationDTO{
    private $frontEnd;
    private $fullName;
    private $email;
    private $emailConf;
    private $password;
    private $passwordConf;
    private $passwordEncrypted;
    private $terms;

    public function getFrontEnd(){
        return $this->frontEnd;
    }
    public function getFullName(){
        return $this->fullName;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getEmailConf(){
        return $this->emailConf;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getPasswordConf(){
        return $this->passwordConf;
    }
    public function getPasswordEncrypted(){
        return $this->passwordEncrypted;
    }
    public function getTerms(){
        return $this->terms;
    }
    public function setFrontEnd($frontEnd){
        $this->frontEnd = $frontEnd;
    }
    public function setFullName($fullName){
        $this->fullName = $fullName;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setEmailConf($emailConf){
        $this->emailConf = $emailConf;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setPasswordConf($passwordConf){
        $this->passwordConf = $passwordConf;
    }
    public function setPasswordEncrypted($passwordEncrypted){
        $this->passwordEncrypted = $passwordEncrypted;
    }
    public function setTerms($terms){
        $this->terms = $terms;
    }
}

?>