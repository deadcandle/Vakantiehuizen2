
<?php

require("../config/db_config.php");
$conn = new mysqli($host, $user, $pass, $db);
$personen = $_POST["personen"];
$huis = $_POST["plaats"];
$id = random_int(100, 10000);
$omschrijving = $_POST["omschrijving"];
$prijs = $_POST["prijs"];
$addHouseSql = "insert into huizen (id, huis, personen, omschrijving, prijs) values ('$id', '$huis', '$personen', '$omschrijving', '$prijs');";
$result1 = $conn -> query($addHouseSql);
$addImageSql = "insert into ";

?>