<?php

    $nomi_colori = [
                    "ciro" => dechex(random_int(0x000000, 0xffffff)),
                    "pippo" => dechex(random_int(0x000000, 0xffffff)),
                    "tranaso" => dechex(random_int(0x000000, 0xffffff))
                    ];

    echo "<h1>Elenco di persone</h1>";
    echo "<br><br>";

    foreach ($nomi_colori as $name => $color) {
        echo "<p style='color: #$color'>$name</p><br>";
    }

?>