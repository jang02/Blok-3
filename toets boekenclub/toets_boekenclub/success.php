<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=books", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage()."<br/>";
}

$sql = "UPDATE `bookdb` SET `book_name` = '$_POST[book]', `book_author` = '$_POST[bookauthor]', `book_comment` = '$_POST[comment]' WHERE `bookdb`.`book_id` = $_POST[id]";
$stmt = $conn->prepare($sql);
$stmt->execute();

echo "success, redirecting you to the homepage";

header("Location: index.php")
?>
</body>
</html>
