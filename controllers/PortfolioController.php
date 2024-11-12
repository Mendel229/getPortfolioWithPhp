<?php
    require_once'models/portfolioModel.php';

    class PortfolioController{
        public function saveData(){
            $portfolioModel = new PortfolioModel();
            if (isset($_POST["btn"])){
                $req = $portfolioModel -> addUser($_POST["nom"], $_POST["prenom"],$_POST["email"], $_POST["description"], $_POST["contact"], $_POST["adresse"]);
                $user_id = $portfolioModel -> getUserId();
                $req1 = $portfolioModel -> addCompetence($_POST["libelle"], $_POST["pourcentage"], $user_id);
                $req2 = $portfolioModel -> addProjet($_POST["libelle"],$_POST["description"], $_POST["image"],$user_id);
                $req3 = $portfolioModel -> addTestimony($_POST["description"],$_POST["auteur"],$user_id);
            }
        }
    }