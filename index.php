
<?php

// testing if vscode pushing works

$loggedin = false;
if (isset($_POST["user"]) && isset($_POST["pass"])) {
    require("config/db_config.php");
    $conn = new mysqli($host, $user, $pass, $db);
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $login_sql = "select account_pass from accounts where account_user = '".$user."'";
    if ($result = $conn -> query($login_sql)) {
        if ($result -> num_rows == 1) {
            $row = $result -> fetch_assoc();
            if (password_verify($pass, $row["account_pass"])) {
                echo "je bent ingelogd, goed gedaan";
                $loggedin = true;
            } else {
                echo "je hebt het verkloot (wachtwoord fout)";
            }
        } else {
            echo "je hebt het verkloot (account bestaat niet)";
        }
    }
}
if (!$loggedin) {
?>
<form action="" method="post">
    <input type="text" name="user">
    <input type="password" name="pass">
    <input type="submit" value="verstuur persoonlijke gegevens naar china">
</form>
<?php
    }
?>
