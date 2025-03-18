<?php declare(strict_types=1); //habilitar el tipo estricto para los tipados 

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

?>