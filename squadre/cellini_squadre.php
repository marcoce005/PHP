<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squadre</title>

    <style>
        form label {
            margin-left: 10px;
        }
    </style>
</head>

<?php
    foreach ($_POST as $value) {
        error_log($value);
    }

?>

<body>
    
    <form method="post">
        <input type="text" name="nome"><label for="name">Nome squadra</label><br><br>
        <input type="number" min="0" max="35" name="wins"><label for="win">Partite vinte</label><br><br>
        <input type="number" min="0" max="35" name="pareggi"><label for="pareggio">Partite paraggiate</label><br><br>
        <input type="number" min="0" max="35" name="lose"><label for="perse">Partite perse</label><br><br>
        <input type="submit" value="Invia">
    </form>

</body>
</html>