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

                                <form method="POST" action="saleHandler" enctype="multipart/form-data">
                                    <div class="form-outline form-white mb-4">
                                        <label>Brand</label>
                                        <select name="id_brand" id="brand_selection"
                                            class="form-control form-control-lg" required>
                                            <option selected hidden disabled>Scegli una marca</option>
                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Model</label>
                                        <select name="id_model" id="model_selection"
                                            class="form-control form-control-lg" required>
                                            <option selected hidden disabled>Scegli un modello</option>

                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Reference</label>
                                        <select name="reference" id="reference_selection"
                                            class="form-control form-control-lg" required>

                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Condition</label>
                                        <select name="condition" id="condition_selection"
                                            class="form-control form-control-lg" required>
                                            <option selected hidden disabled>Scegli una condizione</option>
                                            <option>Unworn</option>
                                            <option>Mint</option>
                                            <option>Fine</option>
                                            <option>Fair</option>
                                            <option>Poor</option>
                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Price (€)</label>
                                        <input type="number" min=0 max=2000000 name="price"
                                            class="form-control form-control-lg" required>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Image</label>
                                        <input type="file" name="img" class="form-control form-control-lg"
                                            accept="image/*" required>
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
        type: "POST",
        url: "brandHandler",
        dataType: "json",
        success: response => {
            console.log(response)

            $.each(response, function (i, item) {
                $('#brand_selection').append($('<option>', {
                    value: item.id_brand,
                    text: item.brand_name
                }));
            });
        },
        error: response => {
            console.log(response)
        }
    })

    document.getElementById('brand_selection').addEventListener('change', () => {
        $("#model_selection option").each(function () {
            $(this).remove();
        });
        $('#model_selection').append($('<option>', {
            value: "",
            text: "Seleziona un modello"
        }));
        $("#reference_selection option").each(function () {
            $(this).remove();
        });
        $("#model_selection option").attr("disabled", "disabled");
        $("#model_selection option").attr("hidden", "hidden");
        $("#model_selection option").attr("selected", "selected");
        $.ajax({
            type: "POST",
            url: "modelHandler",
            data: {
                brandName: document.getElementById('brand_selection').value
            },
            dataType: "json",
            success: response => {

                $.each(response, function (i, item) {
                    $('#model_selection').append($('<option>', {
                        value: item.id_model,
                        text: item.model_name
                    }));
                });
            },
            error: response => {
                console.log(response)
            }
        })
    })

    document.getElementById('model_selection').addEventListener('change', () => {
        $("#reference_selection option").each(function () {
            $(this).remove();
        });
        $('#reference_selection').append($('<option>', {
            value: "",
            text: "Seleziona una referenza"
        }));
        $("#reference_selection option").attr("disabled", "disabled");
        $("#reference_selection option").attr("hidden", "hidden");
        $("#reference_selection option").attr("selected", "selected");

        $.ajax({
            type: "POST",
            url: "referenceHandler",
            data: {
                modelName: document.getElementById('model_selection').value
            },
            dataType: "json",
            success: response => {
                $.each(response, function (i, item) {
                    $('#reference_selection').append($('<option>', {
                        value: item.id_model,
                        text: item.reference
                    }));
                });
            },
            error: response => {
                console.log(response)
            }
        })
    })
</script>

</html>