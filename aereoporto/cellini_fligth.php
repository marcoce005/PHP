<?php
function get_from_DB($data)
{
    try {
        $con = new mysqli("127.0.0.1", "root", "", "aereonautica");
        $query = "SELECT codice_volo, partenza.citta AS citta_partenza, arrivo.citta AS citta_arrivo
        FROM `voli`
        INNER JOIN aeroporti AS partenza ON  voli.id_aeroporto_partenza = partenza.id_aeroporto
        INNER JOIN aeroporti AS arrivo ON voli.id_aeroporto_arrivo = arrivo.id_aeroporto
        WHERE `data` = '".$data."'
        GROUP BY codice_volo;";
        $ans = $con->query($query);

        if (!isset($ans->fetch_row()[0]))
            echo "<h1>NESSUN VOLO TROVATO</h1>";
        else {
            echo "<table border><tr>";
            echo "<th>codice_volo</th>";
            echo "<th>aeroporto_partenza</th>";
            echo "<th>aeroporto_arrivo</th></tr>";
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
        header("Refresh: 5, url=cellini_search_fligth.html");
    }
}

echo "<title>Risultati Voli</title>";


if (isset($_POST) && $_POST['data'])
    get_from_DB($_POST['data']);
else {
    echo "<h1>CAMPI NON COMPLETATI</h1>";
    header("Refresh: 3, url=cellini_search_fligth.html");
}

echo "<br><br><a href='cellini_search_fligth.html' style='border: 1px solid black; background-color: grey'>back</a>";

?>