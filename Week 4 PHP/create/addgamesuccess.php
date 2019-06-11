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

        $sql = "SELECT max_players, play_minutes, explain_minutes, id, name FROM games WHERE id =".$_POST["gameid"];
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetch();

        $playerlist = [];

        for ($i = 0; $i < $data["max_players"]; $i++){
            if (empty($_POST["player$i"])){
            }
            else{
                $playerlist[$i] = $_POST["player$i"];
            }
        }

        $sql = "INSERT INTO planning (explenator, start_time, players, spelid) VALUES ('$_POST[explainer]','$_POST[starttime]:00','".implode(', ',$playerlist)."',$_POST[gameid])";
        $stmt = $conn->prepare($sql);   
        $stmt->execute();
        echo "<div class=\"alert alert-success alert-dismissible fade show\">
        Success! <strong>".$data['name'] ."</strong> was successfully added!</div>";
        header("refresh:2 ../index.php")

        ?>
    </div>
</div>
<?php
include('../../Week 3 PHP/footer/footer.php');
?>
</body>
</html>