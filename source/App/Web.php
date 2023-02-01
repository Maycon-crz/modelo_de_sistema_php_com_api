<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;

class Web{

	private $View;

	public function __construct(){
		$this->view = Engine::create(__DIR__."/../../theme", "php");
	}
	public function home($data): void{
		$users = (new User())->find()->fetch(true);
		echo $this->view->render("home", [
			"title" => "Home | ".SITE,
			"users" => $users
		]);
	}

	public function contact($data): void{
		echo $this->view->render("contact", [
			"title" => "Contato | ".SITE,
		]); 
	}

	public function error(array $data): void{
		echo $this->view->render("error", [
			"title" => "Error {$data['errcode']} | ".SITE,
			"error" => $data["errcode"]
		]); 	
	}
}