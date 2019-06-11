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
$sql = "SELECT book_name, book_author, book_comment FROM bookdb WHERE book_id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $entry = $stmt->fetch();
$value = [$entry['book_name'], $entry['book_author'], $entry['book_comment']];

?>
	<div class="container">
		<h1>Boek bewerken</h1>
		<form method="POST" action="success.php">
			<div class="form-group">
		    	<label for="book">Naam</label>
                <input type="text" class="hidden form-control" name="id" value="<?php echo $id?>">
		    	<input type="text" class="form-control" name="book" value="<?php echo $value[0]?>">
		  	</div>

            <div class="form-group">
                <label for="author">Auteur</label>
                <input name="bookauthor" type="text" class="form-control" list="authors" value="<?php echo $value[1] ?>">
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
		    	<input type="text" class="form-control" name="comment" value="<?php echo $value[2]?>">
		  	</div>

			<button type="submit" class="btn btn-primary">Bewerken</button>
		</form> 
	</div>
</body>
</html>