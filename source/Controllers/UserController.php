<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Support\Seo;
use source\Controllers\Middlewares\MiddlewareForSimpleAccess;
use source\Models\User;

class HomeController{
	private $view;
	private $seo;
	private $middlewareForSimpleAccess;
	private $response;
	public function __construct($router){
		$this->view = Engine::create(__DIR__."/../../theme", "php");
		$this->view->addData(["router" => $router]);		
		$this->seo = new Seo();
		$this->middlewareForSimpleAccess = new MiddlewareForSimpleAccess();
	}
	public function dashboard($data): void{
		$this->middlewareForSimpleAccess->middleware($this->view);
		$data["view"] = true;
		$data["page"] = 1;
		// $this->response["movies"] = $this->movieController->getMovies($data);
		$head = $this->seo->render(
			"Painel | ".SITE,
			"Pinel do usuário",
			url(),
			"https://via.placeholder.com/1200x628.png?text=modelo"
		);
		echo $this->view->render("user", [
			"head" => $head,
			// "movies" => $this->response["movies"]["data"],
		]);
	}
}