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

    $array = [$vraag1 = "$_GET[vraag1]",$vraag2 = "$_GET[vraag2]",$vraag3 = "$_GET[vraag3]",$vraag4 = "$_GET[vraag4]",$vraag5 = "$_GET[vraag5]",
        $vraag6 = "$_GET[vraag6]",$vraag7 = "$_GET[vraag7]",$vraag8 = "$_GET[vraag8]"];
    foreach($array as $dat){
        changeInput($dat);
    }

    function changeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    include('headermenu.php');

    echo("<div id='form'>Er heerst paniek in het koninkrijk $vraag3. Koning $vraag6 is ten einde raad en als koning 
$vraag6 ten einde raad is, dan roept hij zijn ten-einde-raadsheer $vraag2.
$vraag2 Het is een ramp! Het is een schande!
Sire, Majestieit. Uwe luidruchtigheid, wat is er aan de hand?
    Mijn $vraag1 is verdwenen, Zo maar, zonder waarschuwing. En ik had net $vraag5 voor hem gekocht!
Majesteit, uw $vraag1 komt vast vanzelf terug!
Ja da's leuk en aardig, maar hoe moet ik nu in de tussentijd $vraag8 leren? 
Maar Sire, daar kunt u toch uw $vraag7 voor gebruiken. 
$vraag2, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had. 
Mij $vraag4, Sire.</div>");

    include('footer.php');
    ?>
    </div>
</body>
</html>