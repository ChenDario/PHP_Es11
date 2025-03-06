<?php
    include "db.php";
    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['departure'])){
        $_SESSION['departure'] = trim($_POST['departure']);
        $year = date('Y', strtotime($_SESSION['departure']));
        $month = date('m', strtotime($_SESSION['departure']));
        $day = date('d', strtotime($_SESSION['departure']));
    } elseif (!isset($_SESSION['departure'])) {
        header("Location: ../index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/voli.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Voli </title>
</head>
<body>
    <div>
        <table>
            <tr>
                <th> Data Partenza</th>
                <th> Città di Partenza</th>
                <th> Città di Destinazione</th>
                <th> Orario di Partenza</th>
                <th> Orario di Arrivo</th>
                <th> Codice Volo</th>
            </tr>
            <?php
                // Usa prepared statement per evitare SQL Injection
                $stmt = $conn->prepare("    SELECT V.codice_volo AS CodiceVolo, V.data AS Departure, V.ora_partenza, V.ora_arrivo, AP.citta AS CittaPartenza, AD.citta AS CittaDestinazione
                                            FROM Voli V
                                            INNER JOIN Aeroporti AP ON AP.id_aeroporto = V.id_aeroporto_partenza
                                            INNER JOIN Aeroporti AD ON AD.id_aeroporto = V.id_aeroporto_arrivo
                                            WHERE YEAR(V.data) = ?
                                            AND MONTH(V.data)= ?
                                            AND DAY(V.data) = ?");
                $stmt->bind_param("iii", $year, $month, $day);
                $stmt->execute();
                $result = $stmt->get_result();

                while($row = $result->fetch_assoc()){
                    echo "  <tr>
                                <td>{$row['Departure']}</td>
                                <td>{$row['CittaPartenza']}</td>
                                <td>{$row['CittaDestinazione']}</td>
                                <td>{$row['ora_partenza']}</td>
                                <td>{$row['ora_arrivo']}</td>
                                <td>{$row['CodiceVolo']}</td>
                            </tr>

                    ";
                }
            ?>
        </table>
    </div>
</body>
</html>