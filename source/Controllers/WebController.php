<?php

namespace Source\Controllers;

use League\Plates\Engine;
use CoffeeCode\Optimizer\Optimizer;
use Source\Support\Seo;
use Source\Models\User;

class WebController{
	/*@var Engine*/
	private $view;
	/*@var $seo Seo*/
	private $seo;
	/*Web constructor*/
	public function __construct($router){
		$this->view = Engine::create(__DIR__."/../../theme", "php");
		$this->view->addData(["router" => $router]);
		$this->seo = new Seo();
	}
	public function home($data): void{
		$head = $this->seo->render(
			"Home | ".SITE,
			"Compre seu ingresso e conheça o Cinema 7D.",
			url(),
			/*TODO: Alterar essa URL!*/
			"https://www.recicladarte.com/theme/img/logo_recicladarte_marketing.jpg"
		);
		echo $this->view->render("home", [
			"head" => $head
		]);
	}

	public function contact($data): void{
		$head = $this->seo->render(
			"Contato | ".SITE,
			"Entre em contato conosco, Mande uma sugestão, Tire suas dúvidas",
			url("contato"),
			"https://via.placeholder.com/1200x628.png?text=Contato+Recicladarte"
		);

		echo $this->view->render("contact", [
			"head" => $head,
		]);
	}
	public function about($data): void{
		$head = $this->seo->render(
			"Sobre | ".SITE,
			"Estamos no início de um enorme projeto que pretende ajudar na diminuição da poluição.",
			url("sobre"),
			"https://via.placeholder.com/1200x628.png?text=Sobre+RecicladArte"
		);

		echo $this->view->render("about", [
			"head" => $head,
		]); 
	}
	public function politics($data): void{
		$head = $this->seo->render(
			"Politica de Privacidade | ".SITE,
			"Política de Privacidade",
			url("politica"),
			"https://via.placeholder.com/1200x628.png?text=Politica+Cine_7D"
		);

		echo $this->view->render("politics", [
			"head" => $head,
		]); 
	}
	public function error(array $data): void{
		$head = $this->seo->render(
			"Error {$data['errcode']} | ".SITE,
			/*TODO: Alterar e por o E-mail de contato do cliente*/
			"Aconteceu algum erro no site entre en contato: ",
			url("ops/{$data['errcode']}"),
			"https://via.placeholder.com/1200x628.png?text=Erro+{$data['errcode']}"
		);

		echo $this->view->render("error", [
			"head" => $head,
			"error" => $data["errcode"]
		]); 	
	}
}