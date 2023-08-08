const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get("id"); // Je récupère l'id de l'article à modifier dans l'url


function getAllOrders() {

    $.ajax({
        url: "../../php/admin_orders.php",
        type: "GET",
        data: {
            choisir: "select"
        },
        contentType: "application/json",
        dataType: "json",
        cache: false,
        success: (res) => {
            console.log(res)


            for (let i = 0; i < res.orders.length; i++) {
                order = res.orders[i];
                let tr = `
                <tr>
                    <td>${order.id_order}</td>
                    <td>${order.client}</td>
                    <td>${order.date_order}</td>
                    <td>${order.statut == 0 ? "commande en attente" : "commande validée"}</td>
                    <td>${order.total_products} produits</td>
                    <td>
                    
                    <a href="view.php?id=${order.id_order}">Afficher commande</a>
                    <a href="${order.statut==0 ? 'form.php?id='+order.id_order : '#'}" >${order.statut==0 ? 'valider' : 'validé'}</a>
                    </td>
                </tr>
            `;
                $("#orders_tbody").append(tr)
            }



        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("what is the problem", thrownError)
        }
    });

}

if (id) {



    if ("view.php".indexOf(window.location.pathname)) {
        $.ajax({
            url: "../../php/admin_orders.php",
            type: "GET",
            dataType: "json",
            data: {
                choisir: "select_id",
                id_order: id
            },
            success: (res) => {
                console.log(res)
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("what is the problem", thrownError)
            }
        });
    } else {
        $.ajax({
            url: "../../php/admin_orders.php",
            type: "GET",
            //dataType: "json",
            data: {
                choisir: "validate",
                id: id
            },
            success: (res) => {
                window.location.replace("../orders/");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("what is the problem", thrownError)
            }
        });
    }


} else {}