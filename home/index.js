function getAllProducts() {

    $.ajax({
        url: "../php/admin_products.php",
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
                let productBox = `<div class="box">
                    <a href="">
                        <div class="img-box">
                        <img src="../assets/${pr.product_picture}" alt="">
                        </div>
                        <div class="detail-box">
                        <h6>
                        ${pr.product_name}
                        </h6>
                        <h6>
                        €
                            <span>
                            ${pr.product_price}
                            </span>
                        </h6>
                        </div>
                        <div class="new">
                        <span>
                            New
                        </span>
                        </div>
                    </a>
                    </div>`;
                document.getElementById('shop_container').insertAdjacentHTML("afterbegin", productBox)
            }





            // for (let i = 0; i < res.products.length; i++) {
            //     pr = res.products[i];
            //     let tr = `
            //     <tr>
            //         <td>${pr.id_product}</td>
            //         <td>${pr.product_name}</td>
            //         <td><img class="img-fluid" src="../../assets/${pr.product_picture}" /></td>
            //         <td>${pr.description}</td>
            //         <td>${pr.product_quantity}</td>
            //         <td>${pr.product_price}</td>
            //         <td>${pr.category}</td>
            //         <td><a href="form.php?id=${pr.id_product}"><i class="fa fa-edit"></i></a></td>
            //     </tr>
            // `;
            //     $("#products_tbody").append(tr)
            // }



        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("what is the problem", thrownError)
        }
    });

}

getAllProducts();