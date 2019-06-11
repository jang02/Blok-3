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


        $sql = "DELETE FROM planning WHERE planning.game_id = ".$_GET["id"];
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        echo "<div class=\"alert alert-success alert-dismissible fade show\">
        Success! <strong>".$_GET['name'] ."</strong> was successfully deleted!</div>";
        header("refresh:2 ../index.php")

        ?>
    </div>
</div>
<?php
include('../../Week 3 PHP/footer/footer.php');
?>
</body>
</html>




