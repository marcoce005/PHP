<?php
    function get_from_DB($regista) {
        try {
            $connect = new mysqli("127.0.0.1", "root", "", "FILM");
            $query = "SELECT * FROM `REGISTA` WHERE `nome` = '".$regista."';";
            $ans = $connect->query($query);
            $connect->close();
            $ans = $ans->fetch_row();

            if (!isset($ans[0]))
                echo "<h1>NESSUN REGISTA TROVATO</h1>";
            else {
                echo "<table border><tr>
                        <th>codice</th>
                        <th>nome</th>
                        <th>nazionalità</th>
                        <th>anno_di_nascita</th></tr><tr>";
                foreach ($ans as $x => $y) {
                    echo "<td>".$y."</td>";
                }
                echo "</tr></table>";
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    echo "<title>Risultati ricerca registi</title>";

    if (isset($_POST) && $_POST["name"] != "")
        get_from_DB($_POST["name"]);
    else {
        echo "<h1>ERROR<br>CAMPI NON INSERIRTI</h1>";
        header("Refresh: 3, url=cellini_search.html");
    }


    echo "<br><br><a href='cellini_search.html' style='border: 1px solid black; background-color: grey'>back</a>";
?>