<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planningstool - Planning</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../website.css">

</head>
<body>
<?php
include('../../Week 3 PHP/header/header.php');
?>
<div id="menu">
    <ul>
        <a href="../index.php"><li>Planning</li></a>
        <a href="#"><li>Spel toevoegen</li></a>
        <a href="../delete/delete.php"><li>Spel Verwijderen</li></a>
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
    $sql = "SELECT url, youtube, image, min_players, max_players, play_minutes, explain_minutes, description, name, id FROM games";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    while ($data = $stmt->fetch())
        echo '<div class="card">'
            .'<img class="card-img-top" src="../afbeeldingen/'.$data["image"].'"  alt="logo">'
            .'<div class="card-body">'
            .'<h5 class="card-title">'.$data['name'].'</h5>'
            .'<br>'
            .'<h5 class="card-title">Aantal spelers</h5>'
            .'<p>'.$data["min_players"].' - '.$data["max_players"].'</p>'
            .'<h5 class="card-title">Beschrijving</h5>'
            .$data["description"]
            .'<a target="_blank" href="'.$data["url"].'">Meer informatie</a></br></br>'
            .$data["youtube"].'<br><br>'
            .'<a href="addgamepage.php?name='.$data["name"].'" class="btn btn-primary">'.'Add game'.'</a></form>'
            .'</div>'
            .'</div>';

    ?>
</div>
<?php
include('../../Week 3 PHP/footer/footer.php');
?>
</body>
</html>