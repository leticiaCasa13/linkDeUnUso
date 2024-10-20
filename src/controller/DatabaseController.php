<?php

// Clase singleton para gestionar la conexión a la base de datos.
class DatabaseController {

    // Propiedades estáticas para la conexión
    private static $host = "localhost";
    private static $username = "usuario";
    private static $password = "usuario";
    private static $dbname = "links_db";
    
    // Opciones adicionales para PDO
    private static $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );

    // Almacenar la instancia de la clase
    private static $instance = null;

    // El constructor es privado para evitar la creación de instancias externas
    private function __construct()
    {
        // El proceso costoso, como la conexión a la base de datos, va aquí
    }

    // Método para obtener la instancia única de la clase
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DatabaseController();
        }
        return self::$instance;
    }

    // Método para establecer la conexión a la base de datos
    public static function connect()
    {
        try {
            // Crear una nueva conexión usando PDO
            $connection = new PDO(
                'mysql:host='.self::$host.';dbname='.self::$dbname, 
                self::$username, 
                self::$password, 
                self::$options
            );
            return $connection;

        } catch(PDOException $error) {
            // Mostrar el error en caso de fallo de conexión
            echo "Error de conexión: " . $error->getMessage();
            return null;
        }
    }
}

