var productList = [{
        Id: 1,
        Name: 'Medical and Veterinary Anesthesia Machine',
        Description: 'The anesthesia gas machine is a device which delivers a precisely-known but variable gas mixture, including anesthetizing and life-sustaining gases',
        Price: 620,
        ImageUrl: 'https://5.imimg.com/data5/FS/PF/MY-3716699/anesthesia-equipment-500x500.jpg',
        ProductCode: 'V00101'

    },
    {
        Id: 2,
        Name: 'Jasper Blood Chemistry Analyser',
        Description: 'Clinical chemistry analyzers run assays on clinical samples such as blood serum, plasma, urine,' +
            'to detect the presence of analytes relating to disease or drug',
        Price: 800,
        ImageUrl: 'https://images.sciex.com/products/ce/genomelab/GenomeLab-GeXP-550x600.png',
        ProductCode: 'V00102'

    },
    {
        Id: 3,
        Name: 'Centrifuge',
        Description: 'A centrifuge is a laboratory device that is used for the separation of fluids, gas or liquid, based on density. Separation is achieved by spinning a vessel containing material at high speed;' +
            'the centrifugal force pushes heavier materials to the outside of the vessel',
        Price: 100,
        ImageUrl: 'https://assets.fishersci.com/TFS-Assets/CCG/product-images/F175973~p.eps-650.jpg',
        ProductCode: 'V00103'

    },
    {
        Id: 4,
        Name: 'Defibrillator',
        Description: 'Defibrillator is required for reviving the heart functions by providing selected quantum' +
            'of electrical shocks with facility for monitoring vital parameters.',
        Price: 300,
        ImageUrl: 'https://5.imimg.com/data5/NO/IM/MY-49231027/e-heart-defibrillator-500x500.jpg',
        ProductCode: 'V00104'

    },
    {
        Id: 5,
        Name: 'X-Ray View Box',
        Description: 'The X-Ray Film Viewer(Illuminator) has superior advantages in luminescence mechanism,' +
            'light source quality and service life compared with those of the traditional X- Ray Film View Boxes / Lobby, the entire screen of the observation X - Ray Film Viewer is more brighter, uniform and softer.',
        Price: 600,
        ImageUrl: 'https://smhttp-ssl-77207.nexcesscdn.net/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/2/8/2886m2.jpg',
        ProductCode: 'V00105'

    }

]

//initialize cart data
var cartDataList = [];

//initialize cart total
var cartTotal = 0;

function addProductsToPage(productamount) {

    var productRow = document.querySelector("#productsrow");

    for (var i = 0; i < productamount; i++) {
        productRow.innerHTML += `<div class="col-md-4"> <div class="card product-card">
            <img src= "${productList[i].ImageUrl}" class = "card-img-top product-img" alt = "${productList[i].Description}">
            <div class="card-body">
            <h5 class="card-title product-title"> ${productList[i].Name} <span class="badge badge-pill badge-primary">$${productList[i].Price}</span></h5> 
            <p class="card-text product-description"> Product code: ${productList[i].ProductCode}</p>
            <button class="btn btn-outline-success btn-sm btn-block btn-addto-cart" data-productname="${productList[i].Name}" data-productimage="${productList[i].ImageUrl}" data-productid="${productList[i].Id}" data-productprice="${productList[i].Price}"> Add to cart </button></div> </div> </div>`
    }


}

function addToCart(productMetaData, cartItem) {

    var cartItemRow = document.querySelector("#cartItem");


    cartItemRow.innerHTML += `<div class="row cartitem-row">
                                    <div class="col-md-6">
                                    <input type="hidden" value="${productMetaData.productid}" class="p-id" />
                                        <p> <img src="${productMetaData.productimage}" class="img-fluid" alt="" style="max-width: 20%; height: auto">
                                        <strong class="p-name">${productMetaData.productname}</strong></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p><strong>${productMetaData.productprice}</strong></p>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="badge badge-primary quantity">${1}</span>
                                        <button class="btn btn-secondary btn-sm increase-cart-Item" data-productid="${productMetaData.productid}" data-productprice="${productMetaData.productprice}">+</button>
                                        <button class="btn btn-secondary btn-sm decrease-cart-item" data-productprice="${productMetaData.productprice}">-</button>
                                        <button class="btn btn-secondary btn-sm remove-cart-item" data-productid="${productMetaData.productid}" data-productprice="${productMetaData.productprice}">x</button>
                                    </div>
                                </div>`

    cartItem.ProudtId = productMetaData.productid;
    cartItem.Price = productMetaData.productprice;
    cartItem.Quantity = 1;
    cartItem.Total = productMetaData.productprice * cartItem.Quantity;
    cartItem.Name = productMetaData.productname;

    var cartItemsDomList = document.querySelectorAll(".cartitem-row");

    var newCartTotal = 0;

    cartItemsDomList.forEach(element => {

        var increaseItemButton = element.querySelector(".increase-cart-Item");

        var decreaseItemButton = element.querySelector(".decrease-cart-item");

        var removeItemButton = element.querySelector(".remove-cart-item");

        var productId = element.querySelector(".p-id");

        var quantity = element.querySelector(".quantity");

        removeItemButton.addEventListener("click", function () {

            // console.log(productId.value);

            var removeItemData = removeItemButton.getAttribute("data-productid");
            var removeItemDataPrice = removeItemButton.getAttribute("data-productprice");

            if (removeItemData = productId.value) {

                // console.log(cartTotal);

                // console.log(removeItemDataPrice);

                newCartTotal = UpdateCartTotal(cartTotal, removeItemDataPrice, "minus");

                carttotal.innerText = newCartTotal;

                cartTotal = newCartTotal;

                console.log(newCartTotal)

                element.remove();

                newCartTotal = 0;

            }

        });

        increaseItemButton.addEventListener("click", function () {

            var increaseItemData = increaseItemButton.getAttribute("data-productid");
            var increaseItemDataPrice = increaseItemButton.getAttribute("data-productprice");

            if (increaseItemData = productId.value) {

                var carttotal = document.getElementById("carttotal");


                var item_quantity = parseInt(quantity.innerText) + 1;

                quantity.innerText = item_quantity;

                newCartTotal = UpdateCartTotal(parseInt(cartTotal), parseInt(increaseItemDataPrice), "add");

                cartTotal = newCartTotal;


                carttotal.innerText = cartTotal;


                // console.log(newCartTotal)


            }

        });

        decreaseItemButton.addEventListener("click", function () {

            var decreaseItemData = decreaseItemButton.getAttribute("data-productid");
            var decreaseItemDataPrice = decreaseItemButton.getAttribute("data-productprice");

            if (decreaseItemData = productId.value) {

                var carttotal = document.getElementById("carttotal");


                var item_quantity = parseInt(quantity.innerText) - 1;

                quantity.innerText = item_quantity;

                newCartTotal = UpdateCartTotal(parseInt(cartTotal), parseInt(decreaseItemDataPrice), "minus");

                cartTotal = newCartTotal;


                carttotal.innerText = cartTotal;


                console.log(newCartTotal)

            }

        });


    });

    return cartItem;
}


function UpdateCartTotal(cartTotal, productValue, operation) {

    if (operation === "add") {

        return cartTotal + productValue;

    } else {
        return cartTotal - productValue;

    }
}

$(document).ready(function () {

    //check if user is logged in
    var isLogin = localStorage.getItem("islogin")

    if (isLogin != null || undefined) {
        var logoutbutton = document.getElementById("loginatag");
        logoutbutton.innerText = "Log out";
    } else {
        window.location.replace("http://127.0.0.1:5500/login.html");
    }

    //add products
    addProductsToPage(5);


    for (var i = 0; i < cartDataList.length; i++) {
        cartTotal = cartTotal + cartDataList[i].Total;
    };

    var carttotal = document.getElementById("carttotal");

    carttotal.innerHTML = cartTotal;

    //clear cart button
    $("#clearcart").click(function () {

        cartDataList.length = 0;

        var cartItemRow = document.querySelector("#cartItem");

        cartItemRow.innerHTML = ``;

        cartTotal = UpdateCartTotal(0, 0, "");

        carttotal.innerText = cartTotal;

        alert("Cart cleared");
    });


    //add to cart buttion
    $("button.btn-addto-cart").click(function () {

        var cartItem = {
            ProudtId: 0,
            Name: '',
            Quantity: '',
            Price: 0,
            Total: 0
        }

        //alert("clicked");
        var productMetaData = $(this).data();
        var cartItem = addToCart(productMetaData, cartItem);
        cartDataList.push(cartItem);
        cartTotal = UpdateCartTotal(cartTotal, productMetaData.productprice, "add");

        carttotal.innerText = cartTotal;
    });

    $("#checkOut").click(function () {



        cartDataList.length = 0;

        var cartItemsDomList = document.querySelectorAll(".cartitem-row");

        cartItemsDomList.forEach(element => {

            var cartSummary = {

                ProductId: 0,
                ProductName: "",
                Quantity: 0,
                Image: "",
                productPrice: 0

            }

            var productImage = element.querySelector(".img-fluid");
            var productName = element.querySelector(".p-name");
            var quantity = element.querySelector(".quantity");
            var increaseItemButton = element.querySelector(".increase-cart-Item");
            var productId = increaseItemButton.getAttribute("data-productid");
            var productPrice = increaseItemButton.getAttribute("data-productprice");

            cartSummary.ProductId = parseInt(productId);
            cartSummary.ProductName = productName.innerText;
            cartSummary.Quantity = parseInt(quantity.innerText);
            cartSummary.Image = productImage.src;
            cartSummary.productPrice = parseInt(productPrice);

            cartDataList.push(cartSummary);
        })

        localStorage.setItem("cartData", JSON.stringify(cartDataList));


        window.location.replace("http://127.0.0.1:5500/checkout.html");

    })


});