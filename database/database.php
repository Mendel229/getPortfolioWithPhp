<?php
    require_once 'config/config.php';
    class Database{
        private $db_host = DB_HOST;
        private $db_name = DB_NAME;
        private $db_user = DB_USER;
        private $db_pass = DB_PASSWORD;
        private $connexion;

        public function connect(){
            try {
                $this->connexion = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}",$this->db_user, $this->db_pass);
            } catch (PDOException $th) {
                throw $th;
            }
            return $this->connexion;
        }
    }
?>