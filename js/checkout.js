$(document).ready(function () {

    // var cartItems = JSON.parse(localStorage.getItem('cartData'));

    // console.log(cartItems);

    // var cartTotal = 0;

    // for (var i = 0; i < cartItems.length; i++) {

    //     cartTotal += cartItems[i].productPrice * cartItems[i].Quantity;


    //     var cartItemRow = document.querySelector("#cartItem");


    //     cartItemRow.innerHTML += `<div class="row cartitem-row">
    //                                 <div class="col-md-6">
    //                                     <p> <img src="${cartItems[i].Image}" class="img-fluid" alt="" style="max-width: 20%; height: auto">
    //                                     <strong class="p-name">${cartItems[i].ProductName}</strong></p>
    //                                 </div>
    //                                 <div class="col-md-4">
    //                                     <p><strong>Price: ${cartItems[i].productPrice}</strong>
    //                                    </p>
    //                                 </div>

    //                                 <div class="col-md-2>
    //                                  <span class="badge badge-primary quantity">Quantity ${cartItems[i].Quantity}</span>
    //                                 </div>

    //                             </div>`
    // }


    // var carttotal = document.getElementById("carttotal");

    // carttotal.innerHTML = cartTotal;

    $("#paybtn").click(function () {

        var name = $("#name").val();
        var email = $("#email").val();
        var address = $("#address").val();


        var postalcode = $("#postalcode").val();

        var isValid = Validate(postalcode, "postalcode");

        if (Validate(postalcode, "postalcode")) {
            //var form = $("#checkoutForm");

            //form.submit();

            var handler = PaystackPop.setup({
                key: 'pk_test_6d9060c356f6aad0d9a0cfbd47dea671a1bcd105',
                email: "groupf@info.com",
                amount: 100000,
                ref: '' + Math.floor((Math.random() * 1000000000) +
                    1
                ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                metadata: {
                    custom_fields: [{
                            display_name: "First Name",
                            variable_name: "first_name",
                            value: "group f"
                        },
                        {
                            display_name: "Last Name",
                            variable_name: "last_name",
                            value: "group f"
                        },
                    ]
                },
                callback: function (response) {
                    alert('Successful Transaction!!!. Transaction ref is ' + response
                        .reference);
                },
                onClose: function () {
                    alert('window closed');
                }
            });
            handler.openIframe();

        } else {
            console.log(isValid)
            alert('invalid postal code')
        }


    });
});

function Validate(value, control) {

    if (control == "postalcode") {

        if (/^([A-Z][0-9][A-Z]){1}(\s||)([0-9][A-Z][0-9]){1}$/.test(value)) {
            return true;
        } else {
            return false;
        }


    }


}