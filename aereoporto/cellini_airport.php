<?php
function get_from_DB($nation)
{
    try {
        $con = new mysqli("127.0.0.1", "root", "", "aereonautica");
        $query = "SELECT * FROM `aeroporti` WHERE `nazione` = '" . $nation . "';";
        $ans = $con->query($query);

        if (!isset($ans->fetch_row()[0]))
            echo "<h1>NESSUN AEROPORTO TROVATO</h1>";
        else {
            echo "<table border><tr>";
            echo "<th>id_aeroporto</th>";
            echo "<th>nome</th>";
            echo "<th>via</th>";
            echo "<th>città</th>";
            echo "<th>nazione</th>";
            echo "<th>n_terminal</th>";
            echo "<th>n_piste</th></tr>";
            foreach ($ans as $element) {
                echo "<tr>";
                foreach ($element as $x)
                    echo "<td>" . $x . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        header("Refresh: 5, url=cellini_search_airport.html");
    }
}

echo "<title>Risultati aereoporti</title>";


if (isset($_POST) && $_POST['nation'])
    get_from_DB($_POST['nation']);
else {
    echo "<h1>CAMPI NON COMPLETATI</h1>";
    header("Refresh: 3, url=cellini_search_airport.html");
}

echo "<br><br><a href='cellini_search_airport.html' style='border: 1px solid black; background-color: grey'>back</a>";

?>