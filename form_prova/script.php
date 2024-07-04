<?php

foreach($_POST as $key => $value) {
    if ($key == "civile" && intval($value)) { $value = "Coniugato"; }
    elseif ($key == "civile") { $value = "Non coniugato"; }
    echo "Il campo POST: [".$key."] contiene il valore = ".$value."<br>";
}

extract($_POST);            // trasforma i dati della POST in variabile in base al name

error_log($username);

?>
