$.ajax({
    type: 'POST',
    url: 'watchHandler',
    dataType: 'json',
    success: response => {
        console.log(response)
        response.map(watch => {
            document.getElementById('watches').innerHTML += `
                <div class='card col' style='width: 18rem;'>
                    <div class='card-body'>
                        <img src='./img/${ watch.img }' class='card-img-top' alt='...'>
                        <h5 class='card-title'>${ watch.model_name }</h5>
                        <h6 class='card-subtitle mb-2 text-body-secondary'>${ watch.brand_name}</h6>
                        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href='#' class='card-link'>Card link</a>
                        <a href='#' class='card-link'>Another link</a>
                    </div>
                </div>
                `
        })
    },
    error: response => {
        console.log(response)
    }
})