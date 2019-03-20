<?
require("Base.php");
/**
 * Class Proceso
 *
 * CRUD para mysql con PDO
 */

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
        $datos->id = isset($_POST['id']) ? (int)$_POST['id'] : '';
        $datos->marca = isset($_POST['marca']) ? $_POST['marca'] : '';
        $datos->precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $datos->unidades = isset($_POST['unidades']) ? $_POST['unidades'] : '';
        $this->datos = $datos;
    }

    public function parseRequest () {
        switch ($_REQUEST['action']) {
            case 'Registrar':
                $respuesta = $this->create();
                break;
            case 'Actualizar':
                $respuesta = $this->update();
                break;
            case 'Consultar':
                $respuesta = $this->read();
                break;
            case 'Eliminar':
                $respuesta = $this->delete();
                break;
            case 'all':
                $respuesta = $this->all();
                break;
            default:
                $respuesta = '';
                break;
        }

        return $respuesta;
    }


    protected function create () {
        $datos = $this->datos;
        if ($datos->marca == "" || $datos->precio == "" || $datos->unidades == "") {
            return "Llene todos los campos";
        }

        try {
            $statement = $this->getPdo()->prepare("INSERT INTO productos (marca, precio, unidades) VALUES (:marca, :precio, :unidades)");
            $statement->execute([
                ':marca' => $datos->marca,
                ':precio' => $datos->precio,
                ':unidades' => $datos->unidades
            ]);

            return "Se ha agredado correctamente el registro";

        } catch (PDOException $e) {
            return "Error SQL: ".$e->getMessage();
        }
    }

    protected function read () {
        if ($this->datos->id <= 0) {
            return "Se requiere el ID";
        }

        try {
            $statement = $this->getPdo()->prepare("SELECT * FROM productos WHERE ID=:id");
            $statement->execute([
                ':id' => $this->datos->id
            ]);
            $registro = $statement->fetch(PDO::FETCH_ASSOC);

            return $registro;
        } catch (PDOException $e) {
            return "Error SQL: ".$e->getMessage();
        }
    }

    protected function update () {
        if ($this->datos->id <= 0) {
            return "Se requiere el ID";
        }

        try {
            $statement = $this->getPdo()->prepare("UPDATE productos SET marca=:marca, precio=:precio, unidades = :unidades WHERE ID=:id");
            $statement->execute([
                ':marca' => $this->datos->marca,
                ':precio' => $this->datos->precio,
                ':unidades' => $this->datos->unidades,
                ':id' => $this->datos->id
            ]);

            return "Se ha Actualizado correctamente";
        } catch (PDOException $e) {
            return "Error SQL: ".$e->getMessage();
        }
    }

    protected function delete () {
        if ($this->datos->id <= 0) {
            return "Se requiere el ID";
        }

        try {
            $statement = $this->getPdo()->prepare("DELETE FROM productos WHERE ID=:id");
            $statement->execute([
                ':id' => $this->datos->id
            ]);

            return "Se ha eliminado el registro";
        } catch (PDOException $e) {
            return "Error SQL: ".$e->getMessage();
        }

    }

    protected function all () {
        $sql = "SELECT * FROM productos ORDER BY ID";
        try {
            $registros = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            return $registros;
        } catch (PDOException $e) {
            return "Error SQL: ".$e->getMessage();
        }
    }
}
