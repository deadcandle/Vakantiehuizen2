
<br>
<div class="row">
    <div class="col-fluid">
        <?php
        require("config/db_config.php");
        $conn = new mysqli($host, $user, $pass, $db);
        $pageData = "select titel, tekst from teksten where pagina = 'index'";
        if ($result = $conn -> query($pageData)) { ?>
        <?php
            $row = $result -> fetch_assoc();
            echo "<h1>".$row["titel"]."</h1>";
            echo "<hp>".$row["tekst"]."</hp>";
        ?>
        <?php } ?>
        <br><br>
        <div class="row">
            <img src="images/armoedehuis.jpg" alt="">
        </div>
    </div>
</div>
