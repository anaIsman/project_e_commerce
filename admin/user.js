//if (user.admin == 0) window.location.replace("../home/Accueil.html");

$.ajax({
    url: "../php/user.php",
    type: "GET",
    dataType: "json",
    data: {
        choice: "select"
    },
    success: (res) => {
        if (res.success) {
            res.users.forEach(u => {
                const tr = $("<tr></tr>"); // Je crée une nouvelle ligne

                const lastname = $("<td></td>").text(u.lastname); // Je crée une case pour le nom
                const firstname = $("<td></td>").text(u.firstname); // Je crée une case pour le prénom
                const birthdate = $("<td></td>").text(u.birthdate); // Je crée une case pour la date de naissance
                const email = $("<td></td>").text(u.email); // Je crée une case pour l'email

                const updatectn = $("<td></td>"); // Je crée une case pour contenir mon bouton
                const updatebtn = $("<button></button>"); // Je crée le bouton pour la mise à jour
                updatebtn.addClass("btn ocean action_btn"); // J'ajoute des classes sur le bouton pour le style
                updatebtn.html("<i class='fa fa-pencil' aria-hidden='true'></i>"); // J'ajoute un texte au lien
                updatectn.append(updatebtn); // J'ajoute le boutton au td

                updatebtn.click(() => {
                    window.location.replace("manage_user/manage_user.html?id=" + u.id); // Je redirige vers la page du formulaire avec paramètre id de mon article sur lequel j'itère en paramètre
                });

                tr.append(lastname, firstname, birthdate, email, updatectn); // J'ajoute toutes mes cases dans ma ligne
                $("tbody").append(tr); // J'ajoute ma ligne à ma table
            });

            $("td").addClass("text-left"); // J'ajoute une classe à tous les td
        } else alert(res.error);
    }
});