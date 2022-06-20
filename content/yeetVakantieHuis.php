
<?php

require("../config/db_config.php");
$conn = new mysqli($host, $user, $pass, $db);

$id = $_GET["id"];

$addHouseSql = "delete from huizen where (id=$id)";
$result1 = $conn -> query($addHouseSql);

die();

?>