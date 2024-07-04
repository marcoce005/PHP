<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcolatrice</title>
</head>

<?php
session_start();
switch ($_POST['click']) {
    case '+':
    case '-':
    case '*':
    case '/':
        $_SESSION['type_of_operation'] = $_POST['click'];
        $_SESSION['n1'] = $_POST['label'];
        $value = $_POST['label'] . $_POST['click'];
        break;
    case '=':
        $_SESSION['n2'] = substr($_POST['label'], strlen($_SESSION['n1']) + 1);
        switch ($_SESSION['type_of_operation']) {
            case '+':
                $value = $_SESSION['n1'] + $_SESSION['n2'];
                break;
            case '-':
                $value = $_SESSION['n1'] - $_SESSION['n2'];
                break;
            case '*':
                $value = $_SESSION['n1'] * $_SESSION['n2'];
                break;
            case '/':
                $value = $_SESSION['n1'] / $_SESSION['n2'];
                break;
        }
        break;
    case 'C':
        $value = '';
        $_SESSION['n1'] = 0;
        $_SESSION['n2'] = 0;
        $_SESSION['type_of_operation'] = '';
        break;
    default:
        $value = $_POST['label'] . $_POST['click'];
        break;
}
?>

<body>
    <form method="post">
        <input name="label" type="text" value="<?php echo $value; ?>">
        <div class="container">
            <div><input name="click" type="submit" value="C"></div>
            <div><input name="click" type="submit" value="+"></div>
            <div><input name="click" type="submit" value="-"></div>
            <div><input name="click" type="submit" value="="></div>
            <div><input name="click" type="submit" value="7"></div>
            <div><input name="click" type="submit" value="8"></div>
            <div><input name="click" type="submit" value="9"></div>
            <div><input name="click" type="submit" value="*"></div>
            <div><input name="click" type="submit" value="4"></div>
            <div><input name="click" type="submit" value="5"></div>
            <div><input name="click" type="submit" value="6"></div>
            <div><input name="click" type="submit" value="/"></div>
            <div><input name="click" type="submit" value="1"></div>
            <div><input name="click" type="submit" value="2"></div>
            <div><input name="click" type="submit" value="3"></div>
            <div><input name="click" type="submit" value="."></div>
            <div><input name="click" type="submit" value="0"></div>
        </div>
    </form>
</body>

</html>

<style>
    #monitor {
        border: 1px solid black;
        width: 100%;
    }

    body {
        width: 50%;
        margin: auto;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        row-gap: 10px;
    }

    .container input {
        width: 32px;
        height: 32px;
    }
</style>