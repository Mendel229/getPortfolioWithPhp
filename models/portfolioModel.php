<?php
    require_once "database/database.php";
    class PortfolioModel{
        private  function connexion(){
            $database = new Database();
            $db = $database -> connect();
            return $db;
        }
        public function addUser($nom,$prenom,$email,$description,$contact, $adresse){
            $conn = $this->connexion();
            $req = $conn -> prepare("INSERT INTO user(nom, prenom, email, descrip, contact, adresse) VALUES (?,?,?,?,?,?)");
            $req -> execute(array($nom,$prenom,$email,$description,$contact, $adresse));
        }
        public function getUserId(){
            $conn = $this->connexion();
            $req = $conn -> query("SELECT id_user FROM user ORDER BY id_user DESC LIMIT 1");
            return $req;
        }
        public function addProjet($lib_proj,$des_proj,$img_proj,$id){
            $conn = $this->connexion();
            $req = $conn -> prepare("INSERT INTO temoignage(description_temoignage, auteur_temoignage,id_user) VALUES (?,?,?)");
            $req -> execute(array($lib_proj,$des_proj,$img_proj,$id));
            return $last_id = $req -> fetchColumn();
        }
        public function addTestimony($description,$auteur,$id){
            $conn = $this->connexion();
            $req = $conn -> prepare("INSERT INTO temoignage(description_temoignage, auteur_temoignage,id_user) VALUES (?,?,?)");
            $req -> execute(array($description,$auteur,$id));
        }
        public function addCompetence($lib_comp,$pourcentage_comp,$id){
            $conn = $this->connexion();
            $req = $conn -> prepare("INSERT INTO competence(libelle_competence, pourcentage_competence, id_user");
            $req -> execute(array($lib_comp,$pourcentage_comp,$id));
        }
    }
?>