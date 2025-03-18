<?php declare(strict_types=1); //habilitar el tipo estricto para los tipados 

function render_template (string $template, array $data = [])
{
    extract($data); //extrae los datos y los devuelve como variables por ejemplo title en lugar de array $data['title']
    require "templates/$template.php";
}


?>