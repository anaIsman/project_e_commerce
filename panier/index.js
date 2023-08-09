let productCart = [];
if (localStorage.getItem("productCart") !== null) {
    productCart = JSON.parse(localStorage.getItem("productCart"));
    if (productCart.length > 0) {
        document.getElementById('cart-badge').innerHTML = productCart.length.toString();

        for (let i = 0; i < productCart.length; i++) {
            let pr = productCart[i]

            let productBox = document.createElement("div");
            productBox.classList.add("box-product")


            let productDivImg = document.createElement("div")
            productDivImg.classList.add("box-product-img")
            productDivImg.innerHTML = `<img src="../assets/${pr.product_picture}" />`

            productBox.appendChild(productDivImg)

            let productDetailsDiv = document.createElement("div")
            productDetailsDiv.classList.add("box-product-details")

            let productDetailsName = document.createElement("div")
            productDetailsName.classList.add("box-product-details-name")
            productDetailsName.innerHTML = pr.product_name

            let productDetailsDescription = document.createElement("div")
            productDetailsDescription.classList.add("box-product-details-description")
            productDetailsDescription.innerText = pr.description

            let productDetailsPrice = document.createElement("div")
            productDetailsPrice.classList.add("box-product-details-price")
            productDetailsPrice.innerText = "Prix : " + pr.product_price + "€"

            productDetailsDiv.appendChild(productDetailsName)
            productDetailsDiv.appendChild(productDetailsDescription)
            productDetailsDiv.appendChild(productDetailsPrice)


            let divQty = document.createElement("div")
            divQty.classList.add("box-product-details-qty")

            let spanQty = document.createElement("span")
            spanQty.innerText = pr.quantity

            let labelQty = document.createElement("label")
            labelQty.textContent = "Quantité";


            let rangeQty = document.createElement("input")
            rangeQty.type = "range"
            rangeQty.min = 0
            rangeQty.max = pr.product_quantity
            rangeQty.value = pr.quantity

            divQty.appendChild(labelQty)
            divQty.appendChild(spanQty)
            divQty.appendChild(rangeQty)

            productDetailsDiv.appendChild(divQty)

            productBox.appendChild(productDetailsDiv)

            document.getElementById("product_container").appendChild(productBox)

        }
    }
}

