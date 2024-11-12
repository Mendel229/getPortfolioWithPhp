<?php
    require_once'models/portfolioModel.php';

    class PortfolioController{
        public function saveData(){
            $portfolioModel = new PortfolioModel();
            if (isset($_POST["btn"])){
                $req = $portfolioModel -> addUser($_POST["nom"], $_POST["prenom"],$_POST["email"], $_POST["description"], $_POST["contact"], $_POST["adresse"]);
                $user_id = $portfolioModel -> getUserId();
                if(isset($_POST["competences"]) && is_array($_POST["competences"])){
                    foreach ($_POST["competences"] as $competence){
                        $portfolioModel -> addCompetence($_POST["libelle"], $_POST["pourcentage"], $user_id);
                    }
                }
                if (isset($_POST['projets']) && is_array($_POST['projets'])) {
                    foreach ($_POST['projets'] as $projet) {
                        $portfolioModel->addProjet($projet['libelle'], $projet['description'], $projet['image'], $user_id);
                    }
                }
                if (isset($_POST['testimonies']) && is_array($_POST['testimonies'])) {
                    foreach ($_POST['testimonies'] as $testimony) {
                        $portfolioModel->addTestimony($testimony['description'], $testimony['auteur'], $user_id);
                    }
                }
            }
            require 'views/portfolio/addData.php';
        }
    }