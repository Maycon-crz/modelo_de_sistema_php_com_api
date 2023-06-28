<?php

namespace Source\Models\Authentication\Services;
use Source\Models\Authentication\DataTransferObjects\UserRegistrationDTO;
use Source\Models\Authentication\LoginModel;
use Source\Models\Authentication\Services\AuthBO;

class UserRegistrationBO {
    private $loginModel;
    private $authBO;
    private $response = array();
    private $data = array();
    private $msg = "";
    private $countPass;
    public function __construct(){
        $this->loginModel = new LoginModel();
        $this->authBO = new AuthBO;
    }
    public function userRegistrationValidation(UserRegistrationDTO $userRegistrationDTO) : array{                
		$this->msg = ($userRegistrationDTO->getFullName() == "") ? "Informe seu nome completo!": "";
		$this->msg = ($this->msg == "") ? $this->msg = ($userRegistrationDTO->getEmail() == "") ? "Informe seu E-mail!" : "": $this->msg;
		$this->msg = ($this->msg == "") ? $this->msg = ($userRegistrationDTO->getEmailConf() == "") ? "Confirme seu E-mail!" : "": $this->msg;
        $this->msg = ($this->msg == "") ? $this->msg = ($userRegistrationDTO->getEmail() != $userRegistrationDTO->getEmailConf()) ? "Os E-mails não estão iguais!" : "": $this->msg;
		$this->msg = ($this->msg == "") ? $this->msg = ($userRegistrationDTO->getPassword() == "") ? "Informe sua senha!" : "": $this->msg;
		$this->msg = ($this->msg == "") ? $this->msg = ($userRegistrationDTO->getPasswordConf() == "") ? "Confirme sua senha!" : "": $this->msg;
        $this->msg = ($this->msg == "") ? $this->msg = ($userRegistrationDTO->getPassword() != $userRegistrationDTO->getPasswordConf()) ? "As senhas não iguais!" : "": $this->msg;
		$this->msg = ($this->msg == "") ? $this->msg = ($userRegistrationDTO->getTerms() == "") ? "Você precisa aceitar os termos de uso!" : "": $this->msg;
		$this->response["status"] = "error";
		if($this->msg === ""){
            $userRegistrationDTO->setEmail(filter_var($userRegistrationDTO->getEmail(), FILTER_SANITIZE_EMAIL));
			if(filter_var($userRegistrationDTO->getEmail(), FILTER_VALIDATE_EMAIL)){
                $this->data = $this->loginModel->checkIfTheEmailExists($userRegistrationDTO->getEmail(), false);
				if($this->data['data'] === 0){
					$this->data = array();//Reset
						$this->countPass = strlen($userRegistrationDTO->getPassword());
						if($this->countPass >= 8){
							if(!is_numeric($userRegistrationDTO->getPassword())){
								if(preg_match('@[0-9]@', $userRegistrationDTO->getPassword())){
									if(preg_match('/\p{Lu}/u', $userRegistrationDTO->getPassword())){
											$options = ['cost' => 10,];
											$userRegistrationDTO->setPasswordEncrypted(password_hash($userRegistrationDTO->getPassword(), PASSWORD_DEFAULT, $options));
											$this->data["full_name"] = $userRegistrationDTO->getFullName();
											$this->data["email"] = $userRegistrationDTO->getEmail();
											$this->data["hierarchy"] = 1;
											$this->data["password"] = $userRegistrationDTO->getPassword();
											$this->data["password_encrypted"] = $userRegistrationDTO->getPasswordEncrypted();
											$this->data["token"] = $this->authBO->getGenerateToken($userRegistrationDTO->getEmail());
											$this->data["app_key"] = $this->authBO->getExternalAppKey();
											$this->data["front_end"] = $userRegistrationDTO->getFrontEnd();
                                            $this->response["status"] = "success";
                                            $this->response["data"] = $this->data;
											return $this->response;
									}else{ $this->response["data"] = "Digite pelo menos uma letra maiuscula!"; }
								}else{ $this->response["data"] = "Digite pelo menos um número!"; }
							}else{ $this->response["data"] = "Senha muito fraca fortaleça com letras por exemplo!"; }
						}else{ $this->response["data"] = "Senha muito pequena no minimo 8 caracteres!"; }
				}else{ $this->response["data"] = "Este E-mail! já foi cadastrado!"; }
			}else{ $this->response["data"] = "Informe um E-mail válido!"; }
		}else{ $this->response["data"] = $this->msg; }		
        return $this->response;
    }
}

?>