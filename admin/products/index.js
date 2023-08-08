const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get("id"); // Je récupère l'id du produit à modifier dans l'url


function getAllProducts() {

    $.ajax({
        url: "../../php/admin_products.php",
        type: "GET",
        data: {
            choisir: "select"
        },
        contentType: "application/json",
        dataType: "json",
        cache: false,
        success: (res) => {
            console.log(res)


            for (let i = 0; i < res.products.length; i++) {
                pr = res.products[i];
                let tr = `
                <tr>
                    <td>${pr.id_product}</td>
                    <td>${pr.product_name}</td>
                    <td><img class="img-fluid" src="../../assets/${pr.product_picture}" /></td>
                    <td>${pr.description}</td>
                    <td>${pr.product_quantity}</td>
                    <td>${pr.product_price}</td>
                    <td>${pr.category}</td>
                    <td><a href="form.php?id=${pr.id_product}"><i class="fa fa-edit"></i></a></td>
                </tr>
            `;
                $("#products_tbody").append(tr)
            }



        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("what is the problem", thrownError)
        }
    });

}

function getAllCategory() {

    $.ajax({
        url: "../../php/admin_products.php",
        type: "GET",
        dataType: "json",
        data: {
            choisir: "select_cat"
        },
        contentType: "application/json",

        cache: false,
        success: (res) => {

            $.each(res.cats, function (cat) {
                $('#categorie')
                    .append($("<option></option>")
                        .attr("value", res.cats[cat].id_category)
                        .text(res.cats[cat].name_category));
            });


            // for (let i = 0; i < res.cats.length; i++) {
            //     let option = `<option value="${res.cats[i].id_category}">${res.cats[i].name_category}</option>`;
            //     selectCategorie.append(option)
            // }
            // if (res.success) window.location.replace("../article.html"); // Si success alors je rédirige vers la page des produits 

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("what is the problem", thrownError)
        }
    });

}


getAllCategory();

function insertArticle(fd) {
    fd.append("choisir", "insert");

    $.ajax({
        url: "../../php/admin_products.php",
        type: "POST",
        // dataType: "json",
        data: fd,
        contentType: false,
        processData: false,
        cache: false,
        success: (res) => {
            window.location.replace("../index.php"); // Si success alors je rédirige vers la liste des produits 
            // else alert(res.error);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("what is the problem", thrownError)
        }
    });
}

function getProduct(id) {
    $.ajax({
        url: "../../php/admin_products.php",
        type: "GET",
        dataType: "json",
        data: {
            choisir: "select_id",
            id_product: id
        },
        success: (res) => {
            console.log(res);
            $("#Nom").val(res.product.product_name);
            $("#description").val(res.product.description);
            $("#quantite").val(res.product.product_quantity);
            $("#prix").val(res.product.product_price);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("what is the problem", thrownError)
        }
    });
}

function updateArticle(fd) {
    fd.append("choisir", "update");
    fd.append("id", id);

    $.ajax({
        url: "../../php/admin_products.php",
        type: "POST",
        dataType: "json",
        data: fd,
        contentType: false,
        processData: false,
        cache: false,
        success: (res) => {
            console.log(res)
            if (res.success) window.location.replace("../products/"); // Si success alors je rédirige vers la liste des produits
            else alert(res.error);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("what is the problem", thrownError)
        }
    });
}

if (id) {
    $.ajax({
        url: "../../../php/admin/article.php",
        type: "GET",
        dataType: "json",
        data: {
            choisir: "select_id",
            id
        },
        success: (res) => {
            if (res.success) {
                // Je modifie mon titre du header avec le nom de mon article
                $("header h1").text("Mise à jour de l'article " + res.article.name);
                $(".box h1").text("Mise à jour");

                // J'affecte au champs de mon formulaire les valeurs de mon article
                $("#name").val(res.article.name);
                $("#desc").val(res.article.description);
            } else alert(res.error);
        }
    });
} else {
    // Je modifie mon titre du header pour inserer
    $("header h1").text("Ajouter un article");
    $(".box h1").text("Ajout");
}

$("form").submit(event => {
    event.preventDefault();

    const fd = new FormData();
    // Je récupère les données du formulaire
    fd.append("name", $("#Nom").val());
    fd.append("desc", $("#description").val());
    fd.append("image", $('#image')[0].files[0]);
    fd.append("quantite", $("#quantite").val());
    fd.append("prix", $("#prix").val());
    fd.append("id_category", $("#categorie").find(":selected").val());


    if (id) updateArticle(fd);
    else insertArticle(fd);
});

if (id) {
    getProduct(id)
}