<?php

class Database 
{
    // Crea las instancias para generar el llamado de los objetos de la base de datos
    private $bdhost = 'localhost';
    private $bdname = 'QUICKWIT';
    private $bdUsuario = 'root';
    private $bdContra = '';
    private $objPDO;

    public function startUp() 
    {
        try {
            $this->objPDO = new PDO("mysql:host={$this->bdhost};dbname={$this->bdname};charset=utf8", $this->bdUsuario, $this->bdContra);
            $this->objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->objPDO;
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
            return null;
        }
    }

    public function desconectar() 
    {
        $this->objPDO = null;
        echo "Conexión cerrada exitosamente.";
    }
}
?>
