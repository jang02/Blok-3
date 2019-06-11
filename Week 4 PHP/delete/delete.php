<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planningstool - Planning</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../website.css">

</head>
<body>
<div id="wrapper">
<?php
include('../../Week 3 PHP/header/header.php');
?>
<div id="menu">
    <ul>
        <a href="../index.php"><li>Planning</li></a>
        <a href="../create/create.php"><li>Spel toevoegen</li></a>
        <a href="#"><li>Spel Verwijderen</li></a>
        <a href="../update/update.php"><li>Spel aanpassen</li></a>
    </ul>
</div>
<div id="container" class="grid">
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

    $sql = "SELECT image, name, game_id, players, start_time, explenator FROM planning, games WHERE id = spelid ORDER BY start_time ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    while ($data = $stmt->fetch())
        echo '<div class="card">'
            .'<img class="card-img-top" src="../afbeeldingen/'.$data["image"].'"  alt="logo">'
            .'<div class="card-body">'
            .'<h3 class="card-title">'.$data['name'].'</h3>'
            .'<br>'
            .'<h5>Uitlegger</h5>'
            .$data["explenator"]
            .'<h5>Spelers</h5>'
            .$data["players"]
            .'<h5>Starttijd</h5>'
            .$data["start_time"]
            .'<br>'
            .'<br>'
            .'<a href="deleteconfirm.php?id='.$data["game_id"].'" class="btn btn-primary">'.'Delete game'.'</a>'
            .'</div>'
            .'</div>';

    ?>
</div>
</div>
<?php
include('../../Week 3 PHP/footer/footer.php');
?>
</body>
</html>