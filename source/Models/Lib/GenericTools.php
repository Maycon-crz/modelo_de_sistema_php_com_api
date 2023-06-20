<?php
    namespace Source\Models\Lib;
    
    use \PDO;
    use PDOException;
    
    //outras Exceptions
    use Exception;
    use InvalidArgumentException;
    
	class GenericTools {
	    public function filter($dados){
			$dados = trim($dados);
			$dados = htmlspecialchars($dados);			
			$dados = addslashes($dados);
			return $dados;
		}
	}
?>