<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="content/theme.css">
    <title>Document</title>
</head>
<body>
    <?php
    include "content/menu.php";
    ?>
    <div class="container">
        <?php
        include "config/db_config.php";
        $validpages = array("index", "huizen", "contact");
        if (isset($_GET["page"])) {
            if (!in_array($_GET["page"], $validpages)) {die("<h1>page went no</h1>");}
            include "content/" . $_GET["page"] . ".php";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>