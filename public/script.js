    let competenceCount = 0;
    let projetCount = 0;
    let testimonyCount = 0;

    console.log("camaerche");

    function addCompetence() {
      competenceCount++;
      const div = document.createElement("div");
      div.classList.add("col-md-12");
      div.innerHTML = `
        <input type="text" name="competences[${competenceCount}][libelle]" class="form-control" placeholder="Libellé de la compétence" required>
        <input type="number" name="competences[${competenceCount}][pourcentage]" class="form-control mt-2" placeholder="Pourcentage" required>
      `;
      document.getElementById("competencesSection").appendChild(div);
    }

    function addProjet() {
      projetCount++;
      const div = document.createElement("div");
      div.classList.add("col-md-12");
      div.innerHTML = `
        <input type="file" class="form-control mb-2" name="projets[${projetCount}][image]">
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
        <input type="text" name="testimonies[${testimonyCount}][auteur]" class="form-control mb-2" placeholder="Nom complet du témoin" required>
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