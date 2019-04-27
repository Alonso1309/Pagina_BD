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
        $datos->usuario = isset($_POST['usuario']) ? (int)$_POST['usuarios'] : '';
        $datos->password = isset($_POST['password']) ? $_POST['password'] : '';
        $datos->Con_password = isset($_POST['Con_password']) ? $_POST['Con_password'] : '';
        $this->datos = $datos;
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

            return "Se ha agredado correctamente el registro";

        } catch (PDOException $e) {
            return "Error SQL: ".$e->getMessage();
        }
    }
}
