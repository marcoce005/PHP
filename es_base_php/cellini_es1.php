<?php
$arr = ['carne' => 11, 'verdura' => 5, 'droga' => 50, 'erba' => 17];

foreach ($arr as $key => $value) {
    echo ($value > 10 && $value <= 20) ? "$key --> $value\n" : null;
}
