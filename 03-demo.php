<!DOCTYPE html>
<html lang="en">


<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'User-Agent: Mozilla/5.0'
]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //ERROR AL INTENTAR VERIFICAR USUARIO - NO HACER NUNCA EN PRODUCCION
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //ERROR AL INTENTAR VERIFICAR HOST - NO HACER NUNCA EN PRODUCCION

$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error cURL: ' . curl_error($ch);
}

curl_close($ch);

$data = json_decode($result, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error JSON: ' . json_last_error_msg();
}

//var_dump($data);
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
        <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h3>
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