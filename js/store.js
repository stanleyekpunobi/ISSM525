var productList = [{
        Name: 'Medical and Veterinary Anesthesia Machine',
        Description: 'The anesthesia gas machine is a device which delivers a precisely-known but variable gas mixture, including anesthetizing and life-sustaining gases',
        Price: 6226,
        ImageUrl: 'https://5.imimg.com/data5/FS/PF/MY-3716699/anesthesia-equipment-500x500.jpg',
        ProductCode: 'V00101'

    },
    {
        Name: 'Jasper Blood Chemistry Analyser',
        Description: 'Clinical chemistry analyzers run assays on clinical samples such as blood serum, plasma, urine,' +
            'to detect the presence of analytes relating to disease or drug',
        Price: 8000,
        ImageUrl: 'https://images.sciex.com/products/ce/genomelab/GenomeLab-GeXP-550x600.png',
        ProductCode: 'V00102'

    },
    {
        Name: 'Centrifuge',
        Description: 'A centrifuge is a laboratory device that is used for the separation of fluids, gas or liquid, based on density. Separation is achieved by spinning a vessel containing material at high speed;' +
            'the centrifugal force pushes heavier materials to the outside of the vessel',
        Price: 10000,
        ImageUrl: 'https://assets.fishersci.com/TFS-Assets/CCG/product-images/F175973~p.eps-650.jpg',
        ProductCode: 'V00103'

    },
    {
        Name: 'Defibrillator',
        Description: 'Defibrillator is required for reviving the heart functions by providing selected quantum' +
            'of electrical shocks with facility for monitoring vital parameters.',
        Price: 3000,
        ImageUrl: 'https://5.imimg.com/data5/NO/IM/MY-49231027/e-heart-defibrillator-500x500.jpg',
        ProductCode: 'V00104'

    },
    {
        Name: 'X-Ray View Box',
        Description: 'The X-Ray Film Viewer(Illuminator) has superior advantages in luminescence mechanism,' +
            'light source quality and service life compared with those of the traditional X- Ray Film View Boxes / Lobby, the entire screen of the observation X - Ray Film Viewer is more brighter, uniform and softer.',
        Price: 6000,
        ImageUrl: 'https://smhttp-ssl-77207.nexcesscdn.net/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/2/8/2886m2.jpg',
        ProductCode: 'V00105'

    }

]

function addProductsToPage(productamount) {

    var productRow = document.querySelector("#productsrow");

    for (var i = 0; i < productamount; i++) {
        productRow.innerHTML += `<div class="col-md-4"> <div class="card product-card">
            <img src= "${productList[i].ImageUrl}" class = "card-img-top product-img" alt = "${productList[i].Description}">
            <div class="card-body">
            <h5 class="card-title product-title"> ${productList[i].Name} </h5> <p class="
            card-text product-description"> Product code: ${productList[i].ProductCode}</p><button
            class="btn btn-outline-success btn-sm btn-block"> Add to cart </button></div> </div> </div>`
    }
}

$(document).ready(function () {
    addProductsToPage(5);
})