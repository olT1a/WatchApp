        $.ajax({
            type: 'POST',
            url: "watchHandler",
            dataType: "json",
            success: response => {
                console.log(response)
                response.map(watch => {
                document.getElementById('watches').innerHTML += `<img src='./img/${ watch.img }'>`
             })
            },
            error: response => {
                console.log(response)
            }
        })