<?
require("Base.php");

class Proceso extends Base {

    private $datos;

    /**
     * Proceso constructor.
     */
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
            $statement = $this->getPdo()->prepare("SELECT * FROM usuarios WHERE NombreU=:usuario");
            $statement->execute([
                ':usuario' => $this->datos->id
            ]);
            $registro = $statement->fetch(PDO::FETCH_ASSOC);

            return $registro;
        } catch (PDOException $e) {
            return "Error SQL: ".$e->getMessage();
        }
    }

   
    }
