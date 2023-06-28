<?php

namespace Source\Models\Authentication;

use Source\Models\Authentication\Services\UserRegistrationBO;
use Source\Models\Authentication\DataTransferObjects\UserRegistrationDTO;
use Source\Models\Lib\Connection;
use Exception;

class UserRegistrationModel extends Connection{
    private $userRegistrationBO;
    private static $con;
    private $response = array();
    private $data = array();
    public function __construct(){
        $this->userRegistrationBO = new UserRegistrationBO();
        self::$con = $this->getConn();
    }    
    public function userRegistration(UserRegistrationDTO $userRegistrationDTO):array{                
        // try{
            $this->data = $this->userRegistrationBO->userRegistrationValidation($userRegistrationDTO);            
            if($this->data["status"] == "success"){
                $this->data = $this->data["data"];
                date_default_timezone_set('America/Sao_Paulo');
                $this->data["registration_date"] = date("Y/m/d H:i:s");        
                $this->data["qtd_accesses"] = 1;
                $sql = "INSERT INTO users(full_name, email, hierarchy, pass, qtd_accesses, registration_date) VALUES(:full_name, :email, :hierarchy, :pass, :qtd_accesses, :registration_date)";
                $sql = self::$con->prepare($sql);        
                $sql->bindParam(":full_name", $this->data["full_name"]);
                $sql->bindParam(":email", $this->data["email"]);
                $sql->bindParam(":hierarchy", $this->data["hierarchy"]);
                $sql->bindParam(":pass", $this->data["password_encrypted"]);
                $sql->bindParam(":qtd_accesses", $this->data["qtd_accesses"]);
                $sql->bindParam(":registration_date", $this->data["registration_date"]);
                if($sql->execute()){
                    if($this->data["front_end"] === "web"){
                        if(!isset($this->data["registered_by_the_administrator"])){
                            if(session_status() === PHP_SESSION_NONE){ session_start(); }
                            $_SESSION["full_name"] = $this->data["full_name"];
                            $_SESSION["email"] = $this->data["email"];
                            $_SESSION['token'] = $this->data["token"];
                            $_SESSION['app_key_login'] = $this->data["app_key"];
                            $_SESSION["hierarchy"] = $this->data["hierarchy"];
                            $_SESSION["front_end"] = $this->data["front_end"];
                        }
                    }elseif($this->data["front_end"] === "external"){
                        $this->response["data"]["app_key"] = $this->data["app_key"]; 
                        $this->response["data"]["token"] = $this->data["token"];
                    }
                    $this->response["status"] = "success";
                    $this->response["data"]["msg"] = "Cadastrado com sucesso!";            
                    return $this->response;
                }
                $this->response["status"] = "error";
                $this->response["data"] = "Erro ao cadastrar entre em contato com o desenvolvedor!";
            }else{
                $this->response["status"] = "error";
                $this->response["data"] = $this->data["data"];
            }
        // }catch (Exception $e) {
        //     $this->response["status"] = "error";
        //     $this->response["data"] = "Erro ao cadastrar entre em contato com o desenvolvedor!";
        // }
        return $this->response;
    }
}

?>