<?php
    function insert_into_DB($infos) {
        try {
            $connect = new mysqli("127.0.0.1", "root", "", "FILM");
            $query = "INSERT INTO `REGISTA` (`codice`, `nome`, `nazionalita`, `anno_di_nascita`)
                        VALUES ('".$infos["code"]."', '".$infos["name"]."', '".$infos["nation"]."', '".$infos["born"]."');";
    
            $ans = $connect->query($query);
            $connect->close();
            
            echo $ans ? "<h1>OPERAZIONE ANDATA A BUON FINE</h1>" : "<h1>OPERAZIONE NON RIUSCITA</h1>";
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    echo "<title>Inserimento regista</title>";

    if (isset($_POST) && $_POST["code"] != "" && $_POST["name"] != "" && $_POST["nation"] != "" && $_POST["born"] != "")
        insert_into_DB($_POST);
    else {
        echo "<h1>ERROR<br>CAMPI NON INSERIRTI</h1>";
        header("Refresh: 3, url=cellini_insert.html");
    }

    echo "<br><br><a href='cellini_insert.html' style='border: 1px solid black; background-color: grey'>back</a>";
?>