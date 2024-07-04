<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatture</title>

    <style>
        form {
            width: 10%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            row-gap: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <form method="post">
        <label>Min:</label><input type="number" name="min" min="0">
        <label>Max:</label><input type="number" name="max" min="0">
        <input type="submit" value="Invia">
    </form>

    <?php
    function get_from_DB()
    {
        try {
            $connection = new mysqli('127.0.0.1', 'root', '', 'fatture');
            $query = "SELECT nome, cognome, ultimo_fatturato FROM nominativi 
                      WHERE ultimo_fatturato > " . $_POST['min'] . " AND ultimo_fatturato < ".$_POST['max'];
            $ans = $connection->query($query);
            echo "<div name='output' style='display: grid;grid-template-columns: 1fr 1fr 1fr;'><div><b>Nome</b></div><div><b>Cognome</b></div><div><b>Fatturato</b></div>";
            foreach ($ans as $row) {
                echo "<div>".$row['nome']."</div>";
                echo "<div>".$row['cognome']."</div>";
                echo "<div>".$row['ultimo_fatturato']."</div>";
            }
            echo "</div>";
        } catch (Exception $e) {
            error_log("\nConnessione non effettuata:\n" . $e . "\n");
        }
    }

    isset($_POST["min"]) && isset($_POST["max"]) ? get_from_DB() : null;

    ?>
</body>

</html>