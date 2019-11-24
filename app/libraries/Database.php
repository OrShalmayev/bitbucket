<?php
    /**
     * PDO Database Class
     * Connect to database
     * Create prepared statements
     * Bind values
     * Return rows and results 
     */

    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        /**
         * Database handler
         * whenever we prepare a statement we will use this handler
         * 
         *  */ 
        private $dbh;
        private $stmt;
        private $error;

        public function __construct(){
            // Set DSN\
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $options = array(
                /* This can increase performance by checking to see if 
                    there is already connection that is established with the database.
                */
                PDO::ATTR_PERSISTENT => true,
                // Actually PDO has 3 error mode 1.silent 2.warning 3.exception
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create PDO instance
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Prepare statement with query
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        /**
         * Bind values
         * 
         *  */ 
        public function bind($param, $value, $type = null){
            // if it's null we  want to run our switch.
            if (is_null($type)) {
                switch(true){
                    // If the value is an integer
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_int($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_int($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }

            // RUN THE BIND VALUES
            $this->stmt->bindValue($param, $value, $type);
        }

        // Execute the prepared statement
        public function execute(){
            return $this->stmt->execute();
        }

        // Get result set as array of objects
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Get single record as object
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        // Get row count
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }
