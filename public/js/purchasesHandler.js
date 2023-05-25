$.ajax({
    type: 'POST',
    url: 'seePurchases',
    dataType: 'json',
    success: response => {
        console.log(response)
        response.map(purchase => {
            document.getElementById('purchases').innerHTML += `
                <div class='col col-lg my-2' style='width: 18rem;'>
                <img style='max-height: 250px; width: auto;' src='./img/${ purchase.img }' class='card-img-top'>
                    <div class='card-body'>
                        <p class='card-subtitle mb-2 text-body-secondary'>Model: ${purchase.model_name}</p>
                        <p class='card-subtitle mb-2 text-body-secondary'>Brand: ${purchase.brand_name}</p>
                        <p class='card-subtitle mb-2 text-body-secondary'>Reference: ${purchase.reference}</p>
                    </div>
                </div>
                `
        })
    },
    error: response => {
        console.log(response)
    }
})
