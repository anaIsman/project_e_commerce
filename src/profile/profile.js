$("#firstname").val(user.firstname);
$("#lastname").val(user.lastname);
$("#email").val(user.email);

$("form").submit(event => {
    event.preventDefault();

    $(".box input[type='submit']").removeClass();

    // Je récupère les valeurs des champs du formuaire
    const firstname = $("#firstname").val();
    const lastname = $("#lastname").val();
    const password = $("#password").val();

    // J'effectue l'appel AJAX pour faire la mise à jour
    $.ajax({
        url: "../php/profile.php",
        type: "POST",
        dataType: "json",
        data: {
            firstname,
            lastname,
            password
        },
        success: (res) => {

            if (res.success) {
                // Je mets à jour le nom et prénom dans le menu
                $("aside p").text(firstname + " " + lastname); // Je place le nom d'utilisateur dans mon menu

                // Je mets à jour les informations dans la variable user
                user.firstname = firstname;
                user.lastname = lastname;
                user.birthdate = birthdate;


                localStorage.setItem("user", JSON.stringify(user));


                $("input[type='submit']").addClass("grass");
            } else {

                $("input[type='submit']").addClass("salmon");
                alert(res.error);
            }
        }
    });
});