<?php

if (isset($_POST['s'])) {
    echo "Nome:     " . $_POST['username'] . "<br>";
    echo "Nome:     " . $_POST['name'] . "<br>";
} else {
    echo '<form name="form" action='.$_SERVER['PHP_SELF'].'" method="post">
    Name: <input type="text" name="username"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" value="Invia">
    <input type="reset" value="Reset"></form>';
}