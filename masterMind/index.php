<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>master-mind</title>

    <style>
        .row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            width: 128px;
            padding: 10px;
        }

        form {
            padding: 10px;
        }

        .cell {
            width: 32px;
            height: 32px;
            border: 1px solid black;
        }

        .feedback {
            width: 32px;
            height: 32px;
            margin-left: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .pin {
            border: 1px solid black;
            border-radius: 100%;
        }

        select {
            width: 32px;
            height: 32px;
        }

        .example {
            width: 20px;
            height: 20px;
            border-radius: 100%;
            margin-right: 30px;
        }

        .legend {
            width: 10%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            row-gap: 20px;
        }

        .legend .text {
            width: 300px;
        }

        .win {
            font-size: 32px;
            color: red;
        }
    </style>

    <script>
        let colors = ['red', 'green', 'blue', 'purple', 'yellow', 'orange', 'gray', 'black'];

        const upt_color = (id) => {
            let index_color = document.querySelector('#' + id);
            let color = colors[index_color.value];
            document.getElementById(id).style.backgroundColor = color;
        };
    </script>
</head>

<?php
session_start();

function generate_psw()
{
    $psw = "";
    while (strlen($psw) < 4) {
        $x = (string) rand(0, 7);
        if (str_contains($psw, $x))
            continue;
        else
            $psw .= $x;
    }
    return $psw;
}

function feedback($sequence)
{
    $correct_pos = 0;
    $correct_color = 0;
    for ($i = 0; $i < 4; $i++) {
        if ($sequence[$i] === $_SESSION['psw'][$i])
            $correct_pos++;
        elseif (str_contains($sequence, $_SESSION['psw'][$i]))
            $correct_color++;
    }
    error_log("try " . $sequence . "\tcorrect " . $_SESSION['psw']);
    error_log("cor: ".$correct_pos."\tmis ".$correct_color);
    return [$correct_pos, $correct_color];
}

$colors = ['red', 'green', 'blue', 'purple', 'yellow', 'orange', 'gray', 'black'];

!isset($_SESSION['psw']) ? $_SESSION['psw'] = generate_psw() : null;

error_log("password = " . $_SESSION['psw']);

if (isset($_POST['clear'])) {
    $_SESSION['grid'] = "";
    $_SESSION['attemps'] = 0;
    $_SESSION['psw'] = generate_psw();
    $_SESSION['win'] = false;
}


if (!$_SESSION['win']) {
    for ($i = 0; $i < 4; $i++)
        $try .= $_POST[$i];
    if (strlen($try) == 4 && $_SESSION['attemps'] < 10) {
        $correct = feedback($try);
        if ($correct[0] == 4) {
            $_SESSION['win'] = true;
            $_SESSION['attemps'] = 10;
        }
        $_SESSION['attemps']++;
        $colors = '
    <div class="row">
    <div class="cell" style="background-color:' . $colors[$try[0]] . '"></div>
    <div class="cell" style="background-color:' . $colors[$try[1]] . '"></div>
    <div class="cell" style="background-color:' . $colors[$try[2]] . '"></div>
    <div class="cell" style="background-color:' . $colors[$try[3]] . '"></div>
    <div class="feedback">';

        for ($i = 0; $i < $correct[0]; $i++)
            $colors .= '<div class="pin" style="background-color: green"></div>';
        for ($i = 0; $i < $correct[1]; $i++)
            $colors .= '<div class="pin" style="background-color: red"></div>';
        for ($i = 0; $i < 4 - ($correct[0] + $correct[1]); $i++)
            $colors .= '<div class="pin"></div>';

        $colors .= '</div></div>';
        $_SESSION['grid'] = $colors . $_SESSION['grid'];
    }
}
?>

<body>
    <h1>Master Mind</h1>

    <?php
    if ($_SESSION['win'])
        echo '<p class="win">COMPLIMENTI HAI VINTO!!!<p>';
    else
        echo '<p>Tentativi rimansti: ' . (10 - $_SESSION['attemps']) . '</p>';
    ?>

    <!-- <p>Tentativi rimanenti :
        <?php echo 10 - $_SESSION['attemps'] ?>
    </p> -->

    <div class="grid">
        <?php
        echo $_SESSION['grid'];
        ?>
    </div>

    <form method="post">
        <?php
        for ($i = 0; $i < 4; $i++)
            echo '
            <select name="' . $i . '" id="color' . $i . '" onchange="upt_color(`color' . $i . '`)">
                <option></option>
                <option value="0" style="background-color: red"></option>
                <option value="1" style="background-color: green"></option>
                <option value="2" style="background-color: blue"></option>
                <option value="3" style="background-color: purple"></option>
                <option value="4" style="background-color: yellow"></option>
                <option value="5" style="background-color: orange"></option>
                <option value="6" style="background-color: gray"></option>
                <option value="7" style="background-color: black"></option>
            </select>'
                ?>
            <input type="submit" value="Check">
        </form>
        <form method="post">
            <input type="submit" name="clear" value="New Game">
        </form>

        <h2>Legenda:</h2>
        <div class="legend">
            <div class="example" style="background-color: green">&nbsp;</div>
            <div class="text">Colore corretto nella posizione CORRETTA</div>
            <div class="example" style="background-color: red">&nbsp;</div>
            <div class="text">Colore corretto nella posizione SBAGLIATA</div>
        </div>
        <p>N.B. non ci possono doppioni nei colori</p>
    </body>

    </html>