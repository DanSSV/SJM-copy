<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sales | Samantha</title>
    <link rel="stylesheet" href="css/user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    include('php/icon.php');
    ?>
    <style>
        .navbar {
            background-color: rgb(36, 131, 19) !important;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background: rgb(36, 131, 19);
            background-repeat: no-repeat;
            font-family: "Inter", sans-serif;
            overflow: hidden;
            color: white !important;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include('php/navbar_user.php');
        ?>
    </header>
    <div class="container">
        <div class="input_product">
            <div class="input-group" style="width: 400px;">
                <input id="product-name" class="form-control" type="text" placeholder="Enter Product Name"
                    aria-label="Brand input field">
                <button id="submit-button" type="button" class="btn btn-primary">Enter</button>
            </div>
            <input id="brand" class="form-control" type="text" value="Brand" aria-label="Disabled input example"
                disabled readonly>
            <input id="category" class="form-control" type="text" value="Category" aria-label="Disabled input example"
                disabled readonly>
            <input id="price" class="form-control" type="text" value="Price" aria-label="Disabled input example"
                disabled readonly>
            <input id="stock" class="form-control" type="text" value="Stock" aria-label="Disabled input example"
                disabled readonly>
            <input id="status" class="form-control" type="text" value="Status" aria-label="Disabled input example"
                disabled readonly>
        </div>



        <div class="product_info">
            <input id="quantity" class="form-control" type="text" placeholder="Enter Quantity"
                aria-label="Quantity input field">
            <input id="total" class="form-control" type="text" value="Total" aria-label="Disabled input example"
                disabled readonly>
            <button id="clear-button" type="button" class="btn btn-secondary">Clear</button>
            <button id="clear-button" type="button" class="btn btn-primary">Confirm</button>
        </div>
    </div>
    <script>
        const priceInput = document.getElementById("price");
        const quantityInput = document.getElementById("quantity");
        const totalInput = document.getElementById("total");
        const stockInput = document.getElementById("stock");

        quantityInput.addEventListener("input", () => {
            const price = parseFloat(priceInput.value);
            const quantity = parseFloat(quantityInput.value);
            const stock = parseFloat(stockInput.value);

            if (quantity > stock) {
                quantityInput.value = stock.toFixed(0);
            }

            const total = price * quantity;

            totalInput.value = total.toFixed(2);
        });
        const clearButton = document.getElementById("clear-button");
        const inputFields = document.querySelectorAll("input.form-control");

        clearButton.addEventListener("click", function () {
            inputFields.forEach(function (inputField) {
                inputField.value = "";
            });
        });
        



    </script>
    <script src="js/user.js"></script>


</body>

</html>