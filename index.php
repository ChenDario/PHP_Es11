<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ES11</title>
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <form action="pages/aereoporti.php" method="post">
                <label for="nations">Nazione (Aeroporti)</label>
                <input type="text" name="nations" id="nations" placeholder="Nome Nazione..." >
                <input type="submit" value="Cerca Aeroporti">
            </form>
        </div>

        <div class="form-container">
            <form action="pages/voli.php" method="post">
                <label for="departure">Data Partenza</label>
                <div class="date-input">
                    <input type="date" id="departure" name="departure" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <input type="submit" value="Cerca Voli">
            </form>
        </div>
    </div>
</body>
</html>
