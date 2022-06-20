
<?php

require("../config/db_config.php");
require("VakantieHuis.php");
$conn = new mysqli($host, $user, $pass, $db);
$vakantiehuis = new VakantieHuis($_POST["personen"],$_POST["plaats"],$_POST["omschrijving"],$_POST["prijs"]);
print_r($vakantiehuis);
$addHouseSql = "insert into huizen (id, huis, personen, omschrijving, prijs) values ('".$vakantiehuis->id."', '".$vakantiehuis->huis."', '".$vakantiehuis->personen."', '".$vakantiehuis->omschrijving."', '".$vakantiehuis->prijs."');";
$result1 = $conn -> query($addHouseSql);
if (move_uploaded_file($_FILES["vakantiehuisafbeelding"]["tmp_name"], "../images/" . $vakantiehuis->id . ".png")) {
    $theImgName = $vakantiehuis->id . ".png";
    $addImageSql = "insert into afbeeldingen (huis_id, afbeelding) values ('$vakantiehuis->id', '$theImgName')";
    $result2 = $conn -> query($addImageSql);
    $x++;
    echo "success: " . $theImgName;
}

header("Location: http://localhost/?page=huizen");

?>