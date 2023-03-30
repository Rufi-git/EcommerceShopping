<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Contents/css/HomeCss/index.css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
            <div class="container">
                <a class="navbar-brand" href="#">Product List</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../Views/Add/productadd.php">Add</a>
                    </li>
                    <form action="../../Includes/deleteProds.inc.php" method="post">
                        <li class="nav-item">
                            <button type="submit" name="delete_multiple_prods" class="nav-link">Mass Delete</button>
                        </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="wrapper">
            <div class="container-fluid">
                <?php
                include "../../Includes/getProds.inc.php";
                if (isset($_SESSION["ids"])) {
                    echo $_SESSION["ids"];
                }
                ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>