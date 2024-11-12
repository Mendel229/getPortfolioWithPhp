<?php
    $controller = "Portfolio";
    $action = isset($_GET["action"]) ? $_GET["action"] : null;
    $filecontroller = "controllers/{$controller}Controller.php";
    if (file_exists($filecontroller)) {
        require_once $filecontroller;
        $controllerClass = ucfirst($controller) . "Controller";

        if (class_exists($controllerClass)) {
            $controllerObjet = new $controllerClass();
            if ($action == "saveData") {
                $controllerObjet->saveData();
            } else {
                echo "L'action demandée n'existe pas.";
            }
        } else {
            echo "Le contrôleur n'existe pas.";
        }
    } else {
        echo "Le fichier contrôleur n'existe pas.";
    }
?>
