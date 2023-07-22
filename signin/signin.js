$("form").submit((event) => {
    event.preventDefault();
    console.log("okkkkkk");

    $.ajax({
        url: "../php/signin.php",
        type: "POST",
        dataType: "json",
        data: {
            firstname: $("#prenom").val(),
            lastname: $("#nom").val(),
            email: $("#email").val(),
            pwd: $("#password").val()
        },
        success: (res) => {
            //console.log("bien recu", res)

            if (res.success) {
                //localStorage.setItem("user", JSON.stringify(res.user));
                window.location.replace("../login/login.php");
            } else alert(res.error);
        }
    });
});