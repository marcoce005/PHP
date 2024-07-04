<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>es3</title>
</head>

<body>

    <form method="post">
        Name: <input type="text" name="nome">
        Cognome: <input type="text" name="cognome">
        <input type="submit">
    </form>

    <?php
    function create_cookie() {
        if (!isset ($_COOKIE['nome']) && !isset ($_COOKIE['cognome'])) {
            setcookie('nome', $_POST['nome'], time() + 3600);
            setcookie('cognome', $_POST['cognome'], time() + 3600);
        }
    }

    if ($_POST['nome'] != '' && $_POST['nome'] != '')
        create_cookie();

    ?>

</body>

</html>