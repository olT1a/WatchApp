$.ajax({
    type: 'POST',
    url: 'seePurchases',
    dataType: 'json',
    success: response => {
        console.log(response)
        response.map(purchase => {
            document.getElementById('purchases').innerHTML += `
                <div class='card col' style='width: 20rem;'>
                    <div class='card-body'>
                        <img src='./img/${ purchase.img }' class='card-img-top' alt='...' height=300rem>
                        <p class='card-subtitle mb-2 text-body-secondary'>Model: ${ purchase.model_name }</p>
                        <p class='card-subtitle mb-2 text-body-secondary'>Brand: ${ purchase.brand_name }</p>
                        <p class='card-subtitle mb-2 text-body-secondary'>Reference: ${ purchase.reference }</p>
                    </div>
                </div>
                `
        })
    },
    error: response => {
        console.log(response)
    }
})
