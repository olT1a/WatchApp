$.ajax({
    type: 'POST',
    url: 'watchHandler',
    dataType: 'json',
    success: response => {
        console.log(response)
        response.map(watch => {
                document.getElementById('watches').innerHTML += `
                <div class='col col-lg my-2' style='width: 18rem;'>
                    <img style='max-height: 250px; width: auto;' src='./img/${ watch.img }' class='card-img-top'>
                    <div class='card-body'>
                        <h5 class='card-title'> Model: ${ watch.model_name }</h5>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Brand: ${ watch.brand_name }</h6>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Condition: ${ watch.watch_condition }</h6>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Prezzo: ${ watch.price } €</h6>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Venditore: ${ watch.username }</h6>
                        ${ watch.disponibile ? `<a href="purchaseHandler?id_watch=${watch.id_watch}" class="btn btn-success" id="btnBuy">Buy</a>` : `<div class="alert alert-warning my-2 container" style='width: 50%;'>Not available</div>` }
                    </div>
                </div>
                `
        })
    },
    error: response => {
        console.log(response)
    }
})
