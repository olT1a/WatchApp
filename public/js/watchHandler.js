$.ajax({
    type: 'POST',
    url: 'watchHandler',
    dataType: 'json',
    success: response => {
        console.log(response)
        response.map(watch => {
            if(watch.disponibile == 1){
            document.getElementById('watches').innerHTML += `
                <div class='card col' style='width: 20rem;'>
                    <div class='card-body'>
                        <img src='./img/${ watch.img }' class='card-img-top' alt='...' height=300rem>
                        <h5 class='card-title'> Model: ${ watch.model_name }</h5>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Brand: ${ watch.brand_name }</h6>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Condition: ${ watch.watch_condition }</h6>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Prezzo: ${ watch.price } €</h6>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Venditore: ${ watch.username }</h6>

                        <a href="#" class="btn btn-success" id="btnBuy">Buy</a>
                    </div>
                </div>
                `
            } else{
                document.getElementById('watches').innerHTML += `
                <div class='card col' style='width: 20rem;'>
                    <div class='card-body'>
                        <img src='./img/${ watch.img }' class='card-img-top' alt='...' height=300rem>
                        <h5 class='card-title'> Model: ${ watch.model_name }</h5>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Brand: ${ watch.brand_name }</h6>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Condition: ${ watch.watch_condition }</h6>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Prezzo: ${ watch.price } €</h6>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>Venditore: ${ watch.username }</h6>
                        <a href="notDisponible" class="btn btn-danger" id="btnBuy">Buy</a>
                    </div>
                </div>
                `
            }
        })
    },
    error: response => {
        console.log(response)
    }
})

{/* <h6 class='card-subtitle mb-2 text-body-secondary'>Reference: ${ watch.reference }</h6>
<h6 class='card-subtitle mb-2 text-body-secondary'>Dimensione: ${ watch.case_size }</h6>
<h6 class='card-subtitle mb-2 text-body-secondary'>Materiale: ${ watch.case_material }</h6> */}