<?php
$arr = [1, 2, 3, 4, 5];
$tot = 0;

foreach ($arr as $e)
    $tot += $e;

echo "media --> ".($tot / count($arr));