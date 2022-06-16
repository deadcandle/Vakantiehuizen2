
<?php

require("../config/db_config.php");
$conn = new mysqli($host, $user, $pass, $db);
$personen = $_POST["personen"];
$huis = $_POST["plaats"];
$id = random_int(10, 10000);
$omschrijving = $_POST["omschrijving"];
$prijs = $_POST["prijs"];

$addHouseSql = "insert into huizen (id, huis, personen, omschrijving, prijs) values ('$id', '$huis', '$personen', '$omschrijving', '$prijs');";
$result1 = $conn -> query($addHouseSql);

if (move_uploaded_file($_FILES["vakantiehuisafbeelding"]["tmp_name"], "../images/" . $id . ".png")) {
    $theImgName = $id . ".png";
    $addImageSql = "insert into afbeeldingen (huis_id, afbeelding) values ('$id', '$theImgName')";
    $result2 = $conn -> query($addImageSql);
    $x++;
    echo "success: " . $theImgName;
}

header("Location: http://localhost/?page=huizen");

?>