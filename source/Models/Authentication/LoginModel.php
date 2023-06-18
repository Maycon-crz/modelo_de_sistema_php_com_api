<?php

namespace Source\Models\Authentication;
use Source\Models\Authentication\DataTransferObjects\LoginDTO;
use Source\Models\Authentication\Services\LoginBO;
use Source\Models\Lib\Conn;

use \PDO;
use PDOException;
//outras Exceptions
use Exception;
use InvalidArgumentException;

class LoginModel{
    private static $con;
    private $loginBO;    
    private $response = array();
    public function __construct(){
        self::$con = (new Conn())->getConn();
        $this->loginBO = new LoginBO();
    }
    public function runLoginRepository(LoginDTO $data): array{
        return $this->loginRepository($data);
    }
    private function loginRepository(LoginDTO $data) :array{
        $this->response = $this->loginBO->loginValidation($data);
        if($this->response["status"] == "success"){
            /*Persiste os dados*/
            return $this->response;
            // try{
            //     if(password_verify($data[0]["password"], $data[0]["pass"])){
            //         $this->response["status"] = "success";
            //         if($data[0]["system"] === "web"){
            //             if(session_status() === PHP_SESSION_NONE){ session_start(); }
            //             $_SESSION['full_name'] = $data[0]["full_name"];
            //             $_SESSION['email'] = $data[0]["email"];
            //             $_SESSION['token'] = $data[0]["token"];
            //             $_SESSION['app_key_login'] = $data[0]["app_key"];
            //             $_SESSION['hierarchy'] = $data[0]["hierarchy"];
            //             $_SESSION["system"] = $data[0]["system"];
            //             $_SESSION["phone"] = $data[0]["phone"];
            //             $_SESSION["status_user"] = $data[0]["status_user"];                    
            //             $this->response["data"]["login"] = "success";
            //             $this->response["data"]["hierarchy"] = $data[0]["hierarchy"];                
            //         }if($data[0]["system"] === "external"){
            //             $this->response["data"]["token"] = $data[0]["token"];
            //             $this->response["data"]["app_key"] = $data[0]["app_key"];
            //             $this->response["data"]["hierarchy"] = $data[0]["hierarchy"];
            //         }
            //         $this->addingAmountOfAccess($data[0]["id"]);
            //         return $this->response;
            //     } 
            //     $this->response["status"] = "error";
            //     $this->response["data"] = "Senha ou E-mail inválidos!";
            //     return $this->response;
            // }catch (Exception $e) {
            //     $this->response["status"] = "error";
            //     $this->response["data"] = "Erro no servidor!";
            // }
        }else{
            /*Retorna o erro*/
            return $this->response;
        }                
    }
    private function addingAmountOfAccess($idDB){
        try{
            $sql = "UPDATE users SET qtd_accesses=qtd_accesses+1 WHERE id=:idDB";
            $sql = self::$con->prepare($sql);
            $sql->bindParam(':idDB', $idDB);
            $sql->execute();
        }catch (Exception $e) {}
    }
    public function logOut(){
        try{
            if(session_status() === PHP_SESSION_NONE){ session_start(); }
            unset($_SESSION['full_name']);
            unset($_SESSION['email']);
            unset($_SESSION['token']);
            unset($_SESSION['app_key_login']);
            unset($_SESSION['hierarchy']);
            unset($_SESSION['system']);

            session_destroy();        
            $this->response["status"] = "success";
            $this->response["data"] = 1;
            return $this->response;
        }catch (Exception $e) {
            return [];
        }
    }
}