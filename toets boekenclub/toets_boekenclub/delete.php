<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8">
	<title>Boekenclub van Tante Toos</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">	
	<link rel="stylesheet" href="css/styles.css">
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

$id = $_POST['bookname'];
$sql = "SELECT book_name, book_author FROM bookdb WHERE book_id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$entry = $stmt->fetch();
$value = [$entry['book_name'], $entry['book_author']];

?>
	<div class="container">
		<h1>Boek verwijderen</h1>

		<form action="remove.php" method="POST">
			<h4>Wilt u het boek "<?php echo "$value[0]".' - '."$value[1]" ?>" verwijderen?</h4>
            <input type="text" class="hidden form-control" name="id" value="<?php echo $id?>">
			<button type="submit" class="btn btn-primary">Verwijderen</button>
		</form>
		<p><a href="index.php">Overzicht boeken</a></p>
	</div>

</body>
</html>