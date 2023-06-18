<?php
    namespace Source\Models\Lib;
    
    use Source\Models\Lib\Conn;
    
    use \PDO;
    use PDOException;
    
    //outras Exceptions
    use Exception;
    use InvalidArgumentException;
    
	class GenericTools{		
	    private static $con;
	    public function __construct(){
	        self::$con = (new Conn())->getConn();
	    }
	    public function filter($dados){
			$dados = trim($dados);
			$dados = htmlspecialchars($dados);			
			$dados = addslashes($dados);
			return $dados;
		}
	}
?>