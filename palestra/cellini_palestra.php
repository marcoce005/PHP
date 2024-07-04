<?php
    $risultato = "Devi pagare: ";

    if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["pagamento"])) {
        $prize = $_POST["age"] < 18 || $_POST["age"] > 65 ? 35 : 45;
        switch ($_POST["pagamento"]) {
            case 'Biennale':
                $prize -= $prize / 10;
                break;
            case 'Trimestrale':
                $prize -= ($prize / 20) * 3;
                break;
            case 'Annuale':
                $prize -= $prize / 5;
                break;
        }
        $risultato .= $prize;
        $tmp = "Nome\t".$_POST["name"]."\nEtà\t".$_POST["age"]."\nPagamento\t".$_POST["pagamento"]."\nPrezzo\t".$prize."\n\n";
        file_put_contents("log.txt", file_get_contents("log.txt").$tmp);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestra</title>
</head>

<body>
    <form method="post" name="form">
        <input type="text" name="name"><label for="name">Nome e Cognome</label><br>
        <input type="number" min="0" max="100" name="age"><label for="name">Età</label><br>
        <select name="pagamento">
            <option value="Mesile">Mesile</option>
            <option value="Bimestrale">Bimestrale</option>
            <option value="Trimestrale">Trimestrale</option>
            <option value="Annuale">Annuale</option>
        </select>
        <input type="submit" value="Invia">
    </form>

    <?php
        echo $risultato;
    ?>
</body>

</html>