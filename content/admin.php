<?php

// password is 'admin' btw
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
                echo "<br><br>je bent ingelogd, goed gedaan";
                $loggedin = true;
            } else {
                echo "je hebt het verkloot (wachtwoord fout)";
            }
        } else {
            echo "je hebt het verkloot (account bestaat niet)";
        }
    }
}
if (!$loggedin) { ?>
<script>
    function showForm(id) {
        document.getElementById("editHuis").removeAttribute("hidden")
    }
</script>
<form action="pasvakantiehuisaan.php" method="post" id="editHuis" hidden>
    <input type="number" name="personen">
    <input type="text" name="huis">
    <textarea name="omschrijving"></textarea>
    <input type="number" name="prijs">
    <input id="huisid" type="hidden" name="id" value="">
</form>
<form action="" method="post">
    <input type="text" name="user">
    <input type="password" name="pass">
    <input type="submit" value="verstuur persoonlijke gegevens naar china">
</form>
<?php } else { ?>
    <button onclick="document.getElementById('toevoegen').removeAttribute('hidden')">maak een nieuw vakantie huis</button>
    <form style="background-color: rgb(85, 255, 85); border: 50px solid rgb(96, 192, 255);" action="/content/nieuwvakantiehuis.php" id="toevoegen" enctype="multipart/form-data" method="post" hidden>
        <h1>een nieuw vakantie huis maken</h1>
        <input type="number" name="personen" placeholder="aantal personen">
        <input type="text" name="plaats" placeholder="plaats">
        <textarea name="omschrijving" cols="30" rows="10" placeholder="verklaar dit vakantie huis"></textarea>
        <input type="number" name="prijs" placeholder="hoe duur is het vakantie huis">
        <input type="file" accept=".png, .jpg, .jpeg" multiple name="vakantiehuisafbeelding">
        <input type="submit" value="versturen">
        <img src="../images/pepepok.jpg" style="width: 20%;">
        <img src="../images/stonks.jpg" style="width: 20%;">
        <style>
            #adminseehouses td {
                padding: 5px 10px;
                background-color: #FFFFEE;
                border-left: 1px solid maroon;
                border-top: 1px solid maroon;
            }
        </style>
    </form>
    <form action="/content/pasvakantiehuisaan.php" method="post" id="aanpassenhuisform" hidden>
        <h1>pas een vakantie huis aan</h1>
        <input type="number" name="personen" placeholder="aantal personen">
        <input type="text" name="plaats" placeholder="plaats">
        <textarea name="omschrijving" cols="30" rows="10" placeholder="verklaar dit vakantie huis"></textarea>
        <input type="number" name="prijs" placeholder="hoe duur is het vakantie huis">
        <input type="hidden" name="huisid" id="huisid">
        <input type="submit" value="klaar">
    </form>
    <script>
        function deleteHouse(id) {
            if (confirm("weet je het zeker")) {
                let deleteHttp = new XMLHttpRequest()
                deleteHttp.onload = function() {
                    window.location.reload()
                }
                deleteHttp.open("get", "/content/yeetVakantieHuis.php?id=" + id)
                deleteHttp.send()
            } else {
                alert("oke, kan gebeuren")
            }
        }
    </script>
    <table id="adminseehouses">
        <tr>
            <td>huis</td>
            <td>personen</td>
            <td>beschrijving</td>
            <td>euro</td>
            <td colspan="2">acties</td>
        </tr>
        <?php
        require("config/db_config.php");
        $conn = new mysqli($host, $user, $pass, $db);
        $huizenSql = "select id, huis, personen, omschrijving, prijs from huizen";
        $result = $conn -> query($huizenSql);
        if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $theId = $row["id"];
                echo "<tr>";
                echo "<td id='huis'>'".$row["huis"]."'</td>";
                echo "<td id='personen'>'".$row["personen"]."'</td>";
                echo "<td id='huis'>'".$row["omschrijving"]."'</td>";
                echo "<td id='personen'>'".$row["prijs"]."'</td>";
                echo "<td id='delete'><button onclick='document.getElementById(`aanpassenhuisform`).removeAttribute(`hidden`);document.getElementById(`huisid`).value=$theId'>edit</button></td>";
                echo "<td id='edit'><button onclick='deleteHouse(`$theId`)'>delete</button></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
<?php } ?>

