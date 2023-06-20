<?php

namespace Source\Controllers\Middlewares;
use Source\Models\Authentication\Services\AuthBO;
use Source\Models\Lib\GenericTools;

use Exception;

class MiddlewareForSimpleAccess{	
	private $appKey;	
	private $frontEnd;
    private $authBO;
    private $genericTools;

    public function __construct(){
        $this->authBO = new AuthBO();
        $this->genericTools = new GenericTools();
    }
	
	public function middleware($view) :bool{
		try{
			$this->frontEnd = isset($_POST['front_end']) ? $this->genericTools->filter($_POST['front_end']) : "";
			$this->appKey = isset($_POST['app_key']) ? $this->genericTools->filter($_POST['app_key']) : "";			
			if($this->frontEnd === "external"){
				if($this->authBO->checkAuth()){
					if($this->appKey === $this->authBO->getExternalAppKey()){
						return true;
					}
				}
				$response["status"] = "error";
				$response["data"] = "Erro de autenticação";
				echo $view->render("api", ["dados" => $response]);
				exit();
			}elseif($this->frontEnd !== "web"){
                $response["status"] = "error";
                $response["data"] = "Erro de autenticação";					
                echo $view->render("api", ["dados" => $response]);
                exit();
            }
			if(session_status() === PHP_SESSION_NONE){ session_start(); }		
			if(isset($_SESSION['appkey'])){
				if($this->appKey === $_SESSION['appkey']){
					return true;
				}
			}            
			
		} catch (Exception $e) {}
		$response["status"] = "error";
        $response["data"] = "Erro de autenticação";					
        echo $view->render("api", ["dados" => $response]);
        exit();
	}
}