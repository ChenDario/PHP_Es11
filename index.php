<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ES11</title>
</head>
<body>
    <div>
        <form action="pages/aereoporti.php" method="post">
            <label for="nations">Nazione (Aeroporti)</label>
            <input type="text" name="nations" id="nations" placeholder="Nome Nazione..." required>
            
            <!-- Pulsante di invio -->
            <input type="submit" value="Cerca Voli">
        </form>
    </div>
</body>
</html>
