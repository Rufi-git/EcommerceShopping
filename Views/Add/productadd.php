<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Contents/css/CreateCss/create.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
            <div class="container">
                <a class="navbar-brand" href="#">Product Add</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Save</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Views/Home/index.php">Cancel</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <form action="../../Includes/product.inc.php" method="POST">
                <div class="wrapper">
                    <div class="box">
                        <input type="text" name="sku" id="sku" required>
                        <label for="sku">SKU</label>
                    </div>
                    <div class="box">
                        <input type="text" name="name" id="name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="box">
                        <input type="number" name="price" id="price" required>
                        <label for="price">Price ($)</label>
                    </div>
                    <div class="box">
                        <select name="type" id="type">
                            <option value="weight" name="weight">Weight (Kq)</option>
                            <option value="dimension" name="dimension">Dimension</option>
                            <option value="size" name="size">Size (Mb)</option>
                        </select>
                    </div>
                    <div class="box">
                        <input type="number" name="typevalue" id="typevalue" required>
                    </div>
                </div>
                <button type="submit">Add</button>
                <?php
                session_start();
                if (isset($_SESSION['error_values'])) {
                    foreach ($_SESSION["error_values"] as $error){
                        echo "<li class='error text-danger'>".$error."</li>";
                    }
                }
                ?>
            </form>
        </div>
    </main>
</body>

</html>