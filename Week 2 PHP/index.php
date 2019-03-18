<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div id="container">
    <?php
    include('headermenu.php');

    ?>
    <div id="form">
        <h1 id="title">Er heerst paniek...</h1>
        <?php
        $useranswer = ["", "", "", "", "", "", "", ""];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            for ($i=0; $i<=7; $i++){
                $useranswer[$i] = $_POST["vraag". ($i + 1)];
            }
        }
        ?>
        <form method="POST">
            <p>Welk dier zou je nooit als huisdier willen hebben? </p><input type="text" name="vraag1" required value="<?php echo($useranswer[0]) ?>"><span style="color: red;"> *</span><br/>
            <p>Wie is de belangrijkste persoon in je leven? </p><input type="text" name="vraag2" required value="<?php echo($useranswer[1]) ?>"><span style="color: red;"> *</span><br/>
            <p>In welk land zou je graag willen wonen? </p><input type="text" name="vraag3" required value="<?php echo($useranswer[2]) ?>"><span style="color: red;"> *</span><br/>
            <p>Wat doe je als je je verveelt? </p><input type="text" name="vraag4" required value="<?php echo($useranswer[3]) ?>"><span style="color: red;"> *</span><br/>
            <p>Met welk speelgoed speelde je vroeger het meest? </p><input type="text" name="vraag5" value="<?php echo($useranswer[4]) ?>"><span style="color: red;"> *</span><br/>
            <p>Bij welke docent spijbel je het liefst? </p><input type="text" name="vraag6" required value="<?php echo($useranswer[5]) ?>"><span style="color: red;"> *</span><br/>
            <p>Als je €100.000,- had, Wat zou je dan kopen? </p><input type="text" name="vraag7" required value="<?php echo($useranswer[6]) ?>"><span style="color: red;"> *</span><br/>
            <p>Wat is je favoriete bezigheid? </p><input type="text" name="vraag8" required value="<?php echo($useranswer[7]) ?>"><span style="color: red;"> *</span><br/>
            <input id="enter" type="submit">
        </form>
    </div>
    <div id="result">
        <?php

        function changeInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        for($i=0; $i<=7; $i++){
            $useranswer[$i] = changeInput($useranswer[$i]);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST["vraag1"]) || empty($_POST["vraag2"]) || empty($_POST["vraag3"]) || empty($_POST["vraag4"]) || empty($_POST["vraag5"]) || empty($_POST["vraag6"]) || empty($_POST["vraag7"]) || empty($_POST["vraag8"])){
            }else{
                echo("<script>document.getElementById('form').style.display='none'</script>");
                echo("<p>Er heerst paniek in het koninkrijk $useranswer[2]. Koning $useranswer[5] is ten einde raad en als koning 
$useranswer[5] ten einde raad is, dan roept hij zijn ten-einde-raadsheer $useranswer[1].
$useranswer[1] Het is een ramp! Het is een schande!
Sire, Majestieit. Uwe luidruchtigheid, wat is er aan de hand?
    Mijn $useranswer[0] is verdwenen, Zo maar, zonder waarschuwing. En ik had net $useranswer[4] voor hem gekocht!
Majesteit, uw $useranswer[0] komt vast vanzelf terug!
Ja da's leuk en aardig, maar hoe moet ik nu in de tussentijd $useranswer[7] leren? 
Maar Sire, daar kunt u toch uw $useranswer[6] voor gebruiken. 
$useranswer[1], je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had. $useranswer[3], Sire.</p>");
            }
        }


        ?>
    </div>
    <?php
    include('footer.php');
    ?>
</div>
</body>
</html>