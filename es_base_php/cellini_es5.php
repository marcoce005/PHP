<?php
$string = "C'era una volta tanto tempo fa...";

for ($i = 0; $i < strlen($string); $i++)
    switch ($string[$i]) {
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
            echo "$string[$i]\t";
            break;
    }