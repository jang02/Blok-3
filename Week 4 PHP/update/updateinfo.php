<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Planningstool - Update</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../website.css">
</head>
<body>
<div id="wrapper">
<?php
include('../../Week 3 PHP/header/header.php');
?>
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


$sql = "SELECT players, start_time, explenator, start_time, max_players, min_players, name FROM planning, games WHERE game_id = $_GET[id] AND id = (SELECT spelid FROM planning where game_id = $_GET[id])";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetch();

$must = $data["min_players"];
$optional = $data["max_players"] - $data["min_players"];

$players = [];

$players = explode(", ", $data["players"]);

for ($i = 0; $i < $data["max_players"]; $i++){
    if(empty($players[$i])){
        $players[$i] = '';
    }
}

        echo "<form method='POST' action='updatesuccess.php'><h1>U bent <span style='color:red'>$data[name]</span> aan het bewerken.</h1></br>";

        echo "<h2>Uitlegger</h2>"
            ."<input name='explainer' type='text' class='form-control' required value='".$data['explenator']."'></br>";

        echo "<h2>Spelernamen</h2>";

        for ($i = 0; $i < $must; $i++){
            echo "<input name='player".$i."' type='text' required class='form-control' value='".$players[$i]."'></br>";
        }
        for ($j = 0; $j < ($optional); $j++){
            echo "<input name='player".($j + $data['min_players'])."' type='text' class='form-control' value='".$players[($j + $data['min_players'])]."'></br>";
        }
        echo "<h2>Start tijd <span style='font-size:0.5em'>(uur:min)</span></h2>"
            ."<input name='starttime' type='time' class='form-control' required value='$data[start_time]'></br>"
            ."<input class='hidden' type='text' name='gameid' value='$_GET[id]'>"
            ."</br>"
            ."<button type=\"submit\" class=\"btn btn-primary\">Bewerken</button>     "
            ."<a href='update.php' class='btn btn-primary'>Terug</a></form>"
            ."</br>";

        ?>
</div>
</div>
<?php
include('../../Week 3 PHP/footer/footer.php');
?>
</body>
</html>