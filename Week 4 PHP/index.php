<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planningstool - Planning</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="website.css">
</head>
<body>
<div id="wrapper">
<?php
include('../Week 3 PHP/header/header.php');
?>
<div id="menu">
    <ul>
        <a href="#"><li>Planning</li></a>
        <a href="create/create.php"><li>Spel toevoegen</li></a>
        <a href="delete/delete.php"><li>Spel Verwijderen</li></a>
        <a href="update/update.php"><li>Spel aanpassen</li></a>
    </ul>
</div>
<div id="container">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=planningstool", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

        $sql = "SELECT explenator, start_time, players, image, explain_minutes, play_minutes FROM planning, games WHERE id = spelid ORDER BY start_time ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($entry = $stmt->fetch()){
            echo "<image class='gameimage' src='afbeeldingen/$entry[image]'></image>"
                ."<br><h5>Uitlegger</h5>"
                .$entry["explenator"]
                ."<br><h5>Spelers</h5>"
                .$entry["players"]
                ."<br><h5>Start tijd</h5>"
                .$entry["start_time"]
                ."<br><h5>Uitleg tijd</h5>"
                .$entry["explain_minutes"].' Minuten'
                ."<br><h5>Speel tijd</h5>"
                .$entry["play_minutes"].' Minuten'
                ."<br/><br/>";
    }
    ?>
</div>
</div>
<?php
include('../Week 3 PHP/footer/footer.php');
?>
</body>
</html>