<?
require("Base2.php");

class Proceso extends Base {

    private $datos;
    public function __construct ($basePath) {
        parent::__construct($basePath);
        $this->setDatos();
    }

    public function setDatos () {
        $datos = new StdClass();
        $datos->usuario = isset($_POST['usuario']) ? (int)$_POST['usuario'] : '';
        $datos->password = isset($_POST['password']) ? $_POST['password'] : '';
        $this->datos = $datos;
    }
    

    protected function read () {
        if ($this->datos->usuario <= 0) {
            return "Se requiere el usuario";
        }

        try {
            $statement = $this->getPdo()->prepare("SELECT * FROM usuarios WHERE usuario =:usuario");
            $statement->execute([
                ':usuario' => $this->datos->id
            ]);
            $registro = $statement->fetch(PDO::FETCH_ASSOC);
            if (count($registro) > 0 && password_verify($_POST['password'],$registro['password'])){
                $_SESSION['user_id'] = $registro['id'];
                header("location: index.php");
            }else{
                return "Su usuario o contraseña es incorrecto";
            }


            return $registro;
        } catch (PDOException $e) {
            return "Error SQL: ".$e->getMessage();
        }
    }

   
    }
