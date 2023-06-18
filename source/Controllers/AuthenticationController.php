<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Lib\GenericTools;
use Source\Models\Authentication\DataTransferObjects\LoginDTO;
use Source\Models\Authentication\Services\LoginBO;
use Source\Models\Authentication\LoginModel;
use Source\Controllers\Middlewares\MiddlewareForSimpleAccess;

class AuthenticationController{
	private $view;/*@var Engine*/
	private $middlewareForSimpleAccess;
	private $genericTools;
	private $loginDTO;
	private $loginModel;
	private $system;
	private $msg;	
	private $response = array();
	private $data = array();
	/*constructor*/
	public function __construct($router){
		$this->view = Engine::create(__DIR__."/../../theme", "php");
		$this->view->addData(["router" => $router]);
		$this->externalAppKey = $this->auth->getExternalAppKey();
		$this->genericTools = new GenericTools();
		$this->loginDTO = new LoginDTO;
		$this->loginModel = new LoginModel();
		$this->middlewareForSimpleAccess = new MiddlewareForSimpleAccess();
	}
	public function createSession(){
		$this->response = $this->auth->generateAppKey();
		echo $this->view->render("api", [
			"dados" => $this->response["appkey"]
		]);
	}
	public function userRegistrationValidation($data): void{}
	public function loginController($data): void{
		$this->middlewareForSimpleAccess->middleware($this->view);
		$this->loginDTO->setFrontEnd(isset($_POST["front_end"]) ? $this->genericTools->filter($_POST["front_end"]) : "");
		$this->loginDTO->setEmail(isset($_POST["email"]) ? $this->genericTools->filter($_POST["email"]) : "");
		$this->loginDTO->setPassword(isset($_POST["password"]) ? $this->genericTools->filter($_POST["password"]) : "");
		$this->response = $this->loginModel->runLoginRepository($this->loginDTO);
		echo $this->view->render("api", [
			"dados" => $this->response
		]);
	}
	public function forgotMyPasswordValidation(){}
	public function recoversPasswordValidation(){}
	public function changePassword(){}
	public function completeRegistration(){}
}