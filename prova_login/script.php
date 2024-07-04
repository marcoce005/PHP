<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>body {color: red}</style>
</head>
<body>
    


<?php
function add_log_DB($u) {
    try {
        $db = new mysqli("127.0.0.1", "root", "", "log");
        $query = "INSERT INTO `login` (`id`, `name`, `hour`) VALUES (NULL, '".$u."', '".date("Y-m-d H:i:s")."');";
        $res = $db->query($query);
        error_log($res);
        $db->close();
        return true;
    } catch (Exception $e) {
        error_log($e->getMessage()) ;
        return false;
    }
}

function check_person($name, $psw) {
    try {
        $file = fopen("./autorized.txt", "r");
        $cont = fread($file, filesize("./autorized.txt")); 
        fclose($file);

        foreach (explode("\n", $cont) as $k => $v) {
            $user[explode("~", $v)[0]] = explode("~", $v)[1];
        }
        
        if (key_exists($name, $user) && $user[$name] === $psw)
            return add_log_DB($name);
        else 
            return false;
    } catch (Exception $error) {
        echo $error->getMessage();
    }
}

if (isset($_POST)) {
    echo check_person($_POST['username'], $_POST['psw']) ? "<h1>Benvenuto ".$_POST['username']."</h1>" : header("Refresh: 0; url=login.html");
}

echo "<a href='login.html' style='border: 1px solid black; background-color: grey'>back</a>";

?>

</body>
</html>