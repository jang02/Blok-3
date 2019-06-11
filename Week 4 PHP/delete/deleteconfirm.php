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

        $sql = "SELECT name FROM games WHERE id = (SELECT spelid FROM planning WHERE game_id =".$_GET['id']." )";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetch();

        echo "<h1>Weet u zeker dat u <span style='color:red;'>$data[name]</span> wilt verwijderen?<h1>"
        .'<a href="deletegamepage.php?id='.$_GET["id"].'&name='.$data["name"].'" class="btn btn-primary">'.'Delete'.'</a>      '
        .'<a href="delete.php" class="btn btn-primary">'.'Cancel'.'</a>'

        ?>
    </div>
</div>
<?php
include('../../Week 3 PHP/footer/footer.php');
?>
</body>
</html>