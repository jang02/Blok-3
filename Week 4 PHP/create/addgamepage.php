<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planningstool - <?php echo $_GET['name'] ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../website.css">
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

    $sql = "SELECT image, min_players, max_players, play_minutes, explain_minutes, description, id, name FROM games WHERE name = '".$_GET["name"]."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetch();
    $must = $data["min_players"];
    $optional = $data["max_players"] - $data["min_players"];

    echo "<form method='POST' action='addgamesuccess.php'><h1>U bent <span style='color:red'>$data[name]</span> aan het toevoegen.</h1></br>";

    echo "<h2>Uitlegger</h2>"
        ."<input name='explainer' type='text' class='form-control' required></br>";

    echo "<h2>Spelernamen</h2>";

    for ($i = 0; $i < $must; $i++){
    echo "<input name='player".$i."' type='text' required class='form-control'></br>";
    }
    for ($i = 0; $i < $optional; $i++){
    echo "<input name='player".($i + $data['min_players'])."' type='text' class='form-control'></br>";
    }
    echo "<h2>Start tijd <span style='font-size:0.5em'>(uur:min)</span></h2>"
     ."<input name='starttime' type='time' class='form-control' required></br>"
     ."<input class='hidden' type='text' name='gameid' value='$data[id]'>"
     ."<button style='margin-bottom:20px' type='submit' class='btn btn-primary'>Spel toevoegen</button>      "
     ."<a style='margin-bottom:20px' href='create.php' class='btn btn-primary'>"."Cancel"."</a></form>";

    ?>
</div>
</div>
<?php
include('../../Week 3 PHP/footer/footer.php');
?>
</body>
</html>