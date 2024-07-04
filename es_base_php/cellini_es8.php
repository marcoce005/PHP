<?php
$n = 5;
$tot = 1;

for ($i = $n; $i > 0; $i--)
    $tot *= $i;

echo "$n --> $tot";