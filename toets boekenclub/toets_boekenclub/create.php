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


?>
	<div class="container">
		<h1>Boek toevoegen</h1>
		<form method="POST">
			<div class="form-group">
		    	<label for="book">Naam</label>
		    	<input name="bookname" type="text" class="form-control">
		  	</div>

		  	<div class="form-group">
		    	<label for="author">Auteur</label>
		    	<input name="bookauthor" type="text" class="form-control" list="authors">
                <datalist id="authors">
                    <?php
                    $sql = "SELECT DISTINCT book_author FROM bookdb";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    while ($entry = $stmt->fetch()){
                        echo "<option>$entry[book_author]</option>";
                    }

                    ?>
                </datalist>
		  	</div>

		  	<div class="form-group">
		    	<label for="description">Beschrijving</label>
		    	<input name="bookcomment" type="text" class="form-control">
		  	</div>

			<button type="submit" class="btn btn-primary">Toevoegen</button>
		</form>
	</div>
<?php


if (empty($_POST['bookname']) || empty($_POST['bookauthor']) || empty($_POST['bookcomment'])){

}
else {
    $sql = "INSERT INTO `bookdb` (`book_name`, `book_author`, `book_comment`) VALUES ('$_POST[bookname]', '$_POST[bookauthor]', '$_POST[bookcomment]')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: index.php");
}

?>
</body>
</html>