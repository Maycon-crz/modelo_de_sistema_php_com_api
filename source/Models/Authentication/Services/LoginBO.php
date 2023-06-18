<?php

namespace Source\Models\Authentication\Services;

use Source\Models\Authentication\DataTransferObjects\LoginDTO;
use Source\Models\Lib\GenericTools;
use Source\Models\Authentication\LoginModel;
use Source\Models\Authentication\Services\AuthBO;

class LoginBO{
    private $genericTools;
    private $loginModel;
    private $auth;
    private $response;
    // private $system;
    private $msg;
    // private $email;
    // private $password;
    public function __construct(){
        $this->genericTools = new GenericTools();
        $this->loginModel = new LoginModel();
        $this->auth = new AuthBO();
    }
    public function loginValidation(LoginDTO $data): array{
		/*logout*/
		// if(isset($data["logout"])){ 
		// 	$this->response = $this->loginModel->logOut();
		// 	echo $view->render("api", ["dados" => $this->response]);
		// 	exit();
		// }


		/* Login Validation */		
		$this->msg = ($data->getEmail() == "") ? "Informe seu E-mail!": "";
		$this->msg = ($this->msg == "") ? $this->msg = ($data->getPassword() == "") ? "Informe sua senha!" : "": $this->msg;
		$this->response["status"] = "error";
		if($this->msg === ""){
			$data->setEmail(filter_var($data->getEmail(), FILTER_SANITIZE_EMAIL));
			if(filter_var($data->getEmail(), FILTER_VALIDATE_EMAIL)){
				$countPass = strlen($data->getPassword());
				if($countPass >=8){
					/*Reescrever aqui vai ser o logar correto para esta função*/$data = $this->genericTools->verificaSeEmailExiste($data->getEmail(), true);//Reescrever essa função novo model
					if($data["status"] === "success"){
						/*Esta assim porque essa função verificaSeEmailExiste é usada em outros lugares*/
						if($data["data"][0]["status_user"] !== "inactive"){
							$data["data"][0]["system"] = $data->getFrontEnd();
							$data["data"][0]["password"] = $data->getPassword();
							$data["data"][0]["token"] = $this->auth->getGenerateToken($data->getEmail());
							$data["data"][0]["app_key"] = $this->auth->getExternalAppKey();
							$this->response = $this->loginModel->runLoginRepository($data["data"]);
						}else{ $this->response["data"] = "Senha ou E-mail inválidos ou usuário desativado!"; }
					}else{ $this->response["data"] = "Senha ou E-mail inválidos!"; }
				}else{ $this->response["data"] ="Senha ou E-mail inválidos"; }
			}else{ $this->response["data"] = "Senha ou E-mail inválidos!"; }
		}else{ $this->response["data"] = $this->msg; }
		return $this->response;
	}
}

?>