<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="website.css">

    <style>
        .error {
            color: #d00000;
        }

        input:not(.ignoreFloat) {
            float: right;
            width: 100%;
        }

        #submit {
            margin-top: 25px;
        }

        #files {
            display: block;
        }

    </style>

</head>
<body>
<div class="wrapper">
<div id="header">
    <p id="datum"><?php $dateofvisitor = date("d-m-Y"); echo $dateofvisitor; ?> </p>
    <p id="time"></p>
    <h1>Jan Garretsen</h1>
</div>

