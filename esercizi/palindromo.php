<?php

$str = "i topi non avevano Nipoti";
$str = str_replace(" ", "", $str);
if (!strcmp(strtolower($str), strrev(strtolower($str))))
		echo "La parola è palindroma";
else
		echo "La parola non è palindroma";

?>
