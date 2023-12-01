<?php
class DB
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "tiendaropa";
    public $conn;

    // Constructor para establecer la conexión
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Verificar la conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // Destructor para cerrar la conexión al finalizar el script
    public function __destruct()
    {
        $this->conn->close();
    }

    // Método para reconectar si es necesario
    public function reconectar()
    {
        if ($this->conn->ping() === false) {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

            if ($this->conn->connect_error) {
                die("Conexión fallida: " . $this->conn->connect_error);
            }
        }

        return $this->conn;
    }
}

// Crear una instancia de la clase DB
$db = new DB();
?>
