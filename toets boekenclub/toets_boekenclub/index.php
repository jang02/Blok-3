<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8">
	<title>Boekenclub van Tante Toos</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">	
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div class="container">
		<h1>Boekenclub van tante Toos</h1>
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
        <table>

            <tr>
                <th>Naam boek</th>
                <th>Auteur boek</th>
                <th>Boek omschrijving</th>
                <th colspan="2"></th>
            </tr>

<?php
        $sql = "SELECT book_id, book_name, book_author, book_comment FROM bookdb";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($entry = $stmt->fetch()){
            echo "<tr>
				<td>$entry[book_name]</td>
				<td>$entry[book_author]</td>
				<td>$entry[book_comment]</td>
				
				
				<td><form action=\"update.php\" method='POST'><input class='hidden' name='bookname' value='$entry[book_id]'><button type='submit'>Bewerken</button></form></td>
				<td><form action=\"delete.php\" method='POST'><input class='hidden' name='bookname' value='$entry[book_id]'><button type='submit'>Verwijderen</button></input></form></td>
				
				
			</tr>";
        }

    ?>
        </table>

		<p><a href="create.php">Toevoegen</a></p>
	</div>
</body>
</html>