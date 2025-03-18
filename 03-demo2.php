<?php declare(strict_types=1); //habilitar el tipo estricto para los tipados ?>

<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

//string en el parametro, y array es lo que devuelve
function get_data(string $url) : array 
{
    $result = file_get_contents(API_URL);
    $data = json_decode($result, true);
    return $data;
}

function get_until_message(int $days): string
{
    return match (true) {
        $days === 0  => "¡Hoy se estrena! 🥳",
        $days === 1 => "Mañana se estrena 🚀",
        $days < 7 => "Esta semana se estrena 🫢",
        $days < 30 => "Este mes se estrena... 📅",
        default   => "$days días hasta el estreno 📅"
    };
}

$data = get_data(API_URL);
$untilMessage = get_until_message($data["days_until"]);
?>

<!-- HTML + PHP -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>
<main>
    <!-- 
        <pre style="font-size:8px; overflow:scroll; height: 250px"> <?php //var_dump($data)
                                                                    ?></pre>
        -->
    <section>
        <img src="<?= $data["poster_url"]; ?>" alt="poster de <?= $data["title"] ?>" width="300" style="border-radius: 16px;">
    </section>

    <hgroup>
        <h3><?= $data["title"] ?> - <?= $untilMessage ?></h3>
        <p>Fecha de estreno: <?= $data["release_date"] ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"] ?></p>
    </hgroup>
</main>
<style>
    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0;
    }
</style>

</html>