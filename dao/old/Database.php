<?php
                
    define("SGBD", "mysql");
    define("DB_NAME", "testeDbCihiv");
    define("HOST", "localhost");
    define("PORTA", "3306");
    define("USER", "dipTeste");
    define("PWSD", "dipTeste");
	
    class Database 
        {
            private static $conn = null;

            public function __construct()
                {
                }

            public static function connect()
                {
                    if (null == self::$conn)
                        {
                            try
                                {
                                    self::$conn = new PDO( SGBD.':host=' . HOST .';port=' .PORTA.';dbname=' . DB_NAME, USER, PWSD);
                                } 
                            catch(PDOException $e)
                                {
                                    die($e->getMessage());
                                }
                        }
                    return self::$conn;
                }

            public static function disconnect()
                {
                    self::$conn = null;
                }
        }
?>
