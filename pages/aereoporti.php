<?php
    include "db.php";
    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nations'])){
        $_SESSION['nation'] = trim($_POST['nations']);
    } elseif (!isset($_SESSION['nation'])) {
        header("Location: ../index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/aeroporti.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AEROPORTI </title>
</head>
<body>
    <div class="aeroporti">
        <table>
            <tr>
                <th>Nome</th>
                <th>Via</th>
                <th>Città</th>
                <th>Nazione</th>
                <th>Numero Terminali</th>
                <th>Numero Piste</th>
            </tr>
            <?php
                // Usa prepared statement per evitare SQL Injection
                $stmt = $conn->prepare("SELECT * FROM Aeroporti WHERE nazione = ? ");
                $stmt->bind_param("s", $_SESSION['nation']);
                $stmt->execute();
                $result = $stmt->get_result();

                // Stampa i risultati in tabella
                while ($row = $result->fetch_assoc()) {
                    echo "  <tr>
                                <td>{$row['nome']}</td>
                                <td>{$row['via']}</td>
                                <td>{$row['citta']}</td>
                                <td>{$row['nazione']}</td>
                                <td>{$row['num_terminali']}</td>
                                <td>{$row['num_piste']}</td>
                            </tr>";
                }

                $stmt->close();
            ?>
        </table>
    </div>
</body>
</html>