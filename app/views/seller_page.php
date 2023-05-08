<?php
require('../app/functions.php');
checkId();
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Sell</h2><br>

                                <form method="POST" action="sell">
                                    <div class="form-outline form-white mb-4">
                                        <select name="brand" id="brand_selection" class="form-control form-control-lg">

                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <select name="brand" id="model_selection" class="form-control form-control-lg">

                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="pwd" placeholder="password"
                                            class="form-control form-control-lg" /><br>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">sell</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
<script>
    $.ajax({
        type: "GET",
        url: "brandHandler",
        dataType: "json",
        success: response => {
            response.map(brand => {
                document.getElementById('brand_selection').innerHTML += `<option value=${brand.id_brand}>${brand.brand_name}</option>`
            })
        },
        error: response => {
            console.log(response)
        }
    })

    document.getElementById('brand_selection').addEventListener('change', () => {
        $.ajax({
            type: "POST",
            url: "modelHandler",
            data: {
                brandName: document.getElementById('brand_selection').value
            },
            dataType: "json",
            success: response => {
                document.getElementById('model_selection').innerHTML = ''
                if (response.message != 'error') {
                    response.map(model => {
                    document.getElementById('model_selection').innerHTML += `<option value=${model.id_model}>${model.model_name}</option>`
                    })
                } //else {
                    
                //}
            },
            error: response => {
                console.log(response)
            }
        })
    })
</script>

</html>