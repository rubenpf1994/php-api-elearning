<?php 


class Conexion
{
    private static $mysqli = null;

    private static $instance;

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = self::connect();
        }

        return self::$instance;
    }
	public function __construct() {
        
        
    }

    static function connect(){
        $mysqli = self::$mysqli;

        if($mysqli===null){
            $config = require('config.php');
            $mysqli = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['bd']);
        }
        
        self::$mysqli= $mysqli;
        return self::$mysqli;
    }

}
?>