<?php

$a = ["x" => 0, "y" => 0];
$b = ["x" => 1, "y" => 1];

echo sqrt(abs($a["x"] - $b["x"]) + abs($a["y"] - $b["y"]));

?>
