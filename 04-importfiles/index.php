<!DOCTYPE html>
<html lang="en">

<?php 
require 'functions.php'; //--> es como copiar todo el codigo de functions.php

$data = get_data(API_URL);
$untilMessage = get_until_message($data["days_until"]);
?>

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