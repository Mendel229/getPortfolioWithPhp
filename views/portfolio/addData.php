<?php
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="public/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
        
        .btn-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
  </style>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Entrez les informations nécéssaires poutr la réalisation de votre portfolio</h3>

        <!-- nom	prenom	email	descrip	contact	adresse	-->
        <form class="row g-3" id="portfolioForm" method="POST" action="index.php?controller=Portfolio&action=saveData">
            <fieldset>
                <legend>
                    <h5 class="card-title">Informations générales</h5>
                </legend>
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Entrez votre nom" name="nom">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Entrez votre prenom" name="prenom">
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" placeholder="Contact" name="contact">
                    </div>
                    <div class="col-md-7">
                        <input type="mail" class="form-control" placeholder="Entrez votre adresse email" name="email">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="Entrez votre adresse" name="adresse">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" placeholder="Bio | description" name="description">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h5 class="card-title">Mes projets</h5>
                </legend>
                <div id="projetsSection" class="row g-3">

                </div>
                <button class="btn btn-primary btn-circle mt-3" type="button" onclick="addProjet()" data-bs-toggle="tooltip" data-bs-placement="top" title="Ajouter un projet">+</button>
            </fieldset>
            <fieldset>
                <legend>
                    <h5 class="card-title">Mes compétences</h5>
                </legend>
                <div id="competencesSection" class="row g-3">

                </div>
                <button class="btn btn-primary btn-circle mt-3" type="button" onclick="addCompetence()" data-bs-toggle="tooltip" title="Ajouter une compétence">+</button>
            </fieldset>
            <fieldset>
                <legend>
                    <h5 class="card-title">Témoignages</h5>
                </legend>
                <div id="testimoniesSection" class="row g-3">

                </div>
                <button class="btn btn-primary btn-circle mt-3" type="button" onclick="addTestimony()" data-bs-toggle="tooltip" title="Ajouter un témoignage">+</button>
            </fieldset>
            <div class="text-center">
                <button type="button" class="btn btn-secondary" onclick="submitForm()">Envoyer</button>
            </div>
        </form>
        <!-- description_temoignagne	auteur_temoignage -->

    </div>
</div>

  <!-- Vendor JS Files -->
  <script src="public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="public/assets/vendor/quill/quill.js"></script>
  <script src="public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="public/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="public/assets/js/main.js"></script>

  <script>
        let competenceCount = 0;
    let projetCount = 0;
    let testimonyCount = 0;


    function addCompetence() {
      competenceCount++;
      const div = document.createElement("div");
      div.classList.add("col-md-12");
      div.innerHTML = `
        <input type="text" name="competences[${competenceCount}][libelle]" class="form-control mt-3" placeholder="Libellé de la compétence" required>
        <input type="number" name="competences[${competenceCount}][pourcentage]" class="form-control mt-2" placeholder="Pourcentage" required>
        
      `;
      document.getElementById("competencesSection").appendChild(div);
    }

    function addProjet() {
      projetCount++;
      const div = document.createElement("div");
      div.classList.add("col-md-12");
      div.innerHTML = `
        <input type="text" class="form-control mb-2 mt-3" name="projets[${projetCount}][image]" placeholder="Entrez le nom d'une image en attendant ...">
        <input type="text" class="form-control mb-2" name="projets[${projetCount}][libelle]" placeholder="Entrez le libellé du projet">
        <input type="text" class="form-control" name="projets[${projetCount}][description]" placeholder="Entrez la description du projet">
      `;
      document.getElementById("projetsSection").appendChild(div);
    }

    function addTestimony() {
      testimonyCount++;
      const div = document.createElement("div");
      div.classList.add("col-md-12");
      div.innerHTML = `
        <input type="text" name="testimonies[${testimonyCount}][auteur]" class="form-control mb-2 mt-3" placeholder="Nom complet du témoin" required>
        <textarea name="testimonies[${testimonyCount}][description]" class="form-control" placeholder="Témoignage" required></textarea>
      `;
      document.getElementById("testimoniesSection").appendChild(div);
    }

    function submitForm() {
      const formData = new FormData(document.getElementById("portfolioForm"));
      fetch("PortfolioController.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        console.log(data);
        alert("Données enregistrées avec succès !");
      })
      .catch(error => console.error("Erreur :", error));
    }
  </script>

</body>

</html>