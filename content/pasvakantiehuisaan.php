
<?php

require("../config/db_config.php");
$conn = new mysqli($host, $user, $pass, $db);

$personen = $_POST["personen"];
$huis = $_POST["plaats"];
$omschrijving = $_POST["omschrijving"];
$prijs = $_POST["prijs"];
$id = $_POST["huisid"];

$addHouseSql = "update huizen set personen='$personen',huis='$huis',omschrijving='$omschrijving',prijs='$prijs' where id=$id";
$result1 = $conn -> query($addHouseSql);

header("Location: http://localhost/?page=admin");

?>