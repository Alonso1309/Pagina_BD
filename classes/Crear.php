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
        $datos->password = password_hash((isset($_POST['password']) ? $_POST['password'] : ''),PASSWORD_BCRYPT);
        $datos->Con_password = password_hash((isset($_POST['Con_password']) ? $_POST['Con_password'] : ''),PASSWORD_BCRYPT);
        $this->datos = $datos;
    }   

    public function parseRequest () {
        switch ($_REQUEST['action']) {
            case 'Registrar':
                $respuesta = $this->create();
                break;
            default:
                $respuesta = '';
                break;
        }

        return $respuesta;
    }
    
    protected function create () {
        $datos = $this->datos;
        if ($datos->usuario == "" || $datos->password == "" || $datos->Con_password == "") {
            return "Llene todos los campos";
        }

        try {
            $statement = $this->getPdo()->prepare("INSERT INTO usuarios (usuario, password, Con_password) VALUES (:usuario, :password, :Con_password)");
            $statement->execute([
                ':usuario' => $datos->usuario,
                ':password' => $datos->password,
                ':Con_password' => $datos->Con_password
            ]);

            return "Se ha registrado exitosamente";

        } catch (PDOException $e) {
            return "Error SQL: ".$e->getMessage();
        }
    }
}
