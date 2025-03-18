<?php declare(strict_types=1); //habilitar el tipo estricto para los tipados 

function render_template (string $template, array $data = [])
{
    extract($data); //extrae los datos y los devuelve como variables por ejemplo title en lugar de array $data['title']
    require "templates/$template.php";
}

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