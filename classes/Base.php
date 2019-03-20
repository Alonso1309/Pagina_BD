<?
/**
 * 
 * Clase base para extender 
 */

class Base {
    
    private $basePath;
    private $fichero;
    private $pdo;

    /**
     * constructor de Base
     */
    public function __construct ($basePath) {
        $this->basePath = $basePath;
        $this->setFichero($this->basePath."/log.txt");
        $this->connectDb();
    }

    /**
     * @throws Exception
     * return DateTime
     */
    public static function now() {
        return new DateTime();
    }

    public function getFichero() {
        return $this->fichero;
    }

    public function setFichero($path) {
        $this->fichero = $path;
    }

    /**
     * Conexion a db
     * @throws PDOException
     * @throws Exception
     */
    private function connectDb()
	{
	    try {
            $credentials = json_decode(file_get_contents($this->basePath."/credentials.json"));
            if ($credentials === null || json_last_error() !== JSON_ERROR_NONE) {
                echo 'Error: No se pudo leer las credenciales de Mysql';
                die();
            }
            $_sql = $credentials->mysql;
            $dsn = "mysql:host=$_sql->host;port=$_sql->port;dbname=$_sql->defaultDb";
            $this->pdo = new PDO($dsn, $_sql->user, $_sql->password);
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
            die();
        }
	}

    /**
     * para loguear lo que queramos en un txt en vez de la pantalla
     *
     * @param $data
     * @param null $tip
     * @throws Exception
     */
    public function logger($data, $tip=null){
        $fichero = $this->getFichero();
        if (!file_exists($fichero) || !is_writable($fichero)) {
            return;
        }
        $timestamp = self::now();
        file_put_contents($fichero, $timestamp->format("Y-m-d H:i:s")."\n", FILE_APPEND | LOCK_EX);
        file_put_contents($fichero, "Class: ".get_class($this)."\n", FILE_APPEND | LOCK_EX);
        if (!is_null($tip)) {
            $tip = $tip."\n";
            file_put_contents($fichero, $tip, FILE_APPEND | LOCK_EX);
        }
        if(is_array($data) || is_object($data)){
            file_put_contents($fichero, print_r($data,true), FILE_APPEND | LOCK_EX);
        } else {
            file_put_contents($fichero, $data."\n", FILE_APPEND | LOCK_EX);
        }
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }
}