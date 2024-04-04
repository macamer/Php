<!-- PHP -->

<!-- combinar con html -->
<h1><?php echo "Mi primera app"; ?></h1>

<!-- /*variables*/ -->
<?php
$name = "Maria";
$age = "30";
$isDev = true;
?>

<!-- forzar tipo  -->
<?php
$ageBool = (bool) "30";
echo ($ageBool); //result 1
echo gettype($ageBool); //boolean
?>

<!-- la forma corta de php echo ?=*/ -->
<p><?= $name ?></p>

<!-- tipado débil -->
<?php
$num = 39;
$newNum = $num + "1"; //--> result 40
?>

<!-- concatenacion -->
<?php
$num = 39;
$newNum = $num  . "1"; //--> result 391


$output = "Hola $name";
$output .= ", con una edad de $age"; // se añade al bloque anterior
?>

<!-- ver tipos -->
<?php
var_dump($name);
echo gettype($num);
?>

<!-- para hacer salto de linea -->
<h2>
    <?=
    "Hola "
        . $name
        . ",<br> ¿Cómo estas?"
    ?>
</h2>


<!-- constantes -->
<?php
define('LOGO_URL', 'https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-svg-vector.svg'); //constante global
const NOMBRE = 'Maria'; //en may y sin $
?>

<!-- utilizar una contante como imagen -->
<img src="<?= LOGO_URL ?>" alt="LOGO" width="200">

<!-- operadores -->
<?php
$isOld = $age > 40;

if ($isOld) {
    echo "<h2>Eres viejo, lo siento </h2>";
} elseif (!$isOld && $isDev) { //else if puede ir junto o separado
    echo "<h2>Eres joven pero eres Dev</h2>";
} else {
    echo "<h2>Eres joven, felicidades</h2>";
}
?>

<!-- facilitar el cod html -->
<?php if ($isOld) : ?>
    <h2>Eres viejo lo siento</h2>
<?php elseif ($isDev) : ?>
    <h2>No eres viejo pero eres Dev. Estás jodido.</h2>
<?php else : ?>
    <h2>Eres joven, felicidades</h2>
<?php endif; ?>


<!-- ternaria -->
<?php
$outputAge = $isOld
    ? 'Eres viejo, lo siento'
    : 'Eres joven, felicidades';
?>

<!-- match -->
<?php
/*
$outputAge = match ($age){
    0,1,2 => "Eres un bebé, $name",
    3,4,5,6,7,8,9,10 => "Eres un niño, $name",
    default => "Eres adulto"
}
*/
$outputAge = match (true) {
    $age < 2  => "Eres un bebé, $name",
    $age < 10 => "Eres un niño, $name",
    $age < 19 => "Eres un adolescente, $name",
    $age < 31 => "Eres un adulto joven, $name",
    default   => "Eres adulto"
}
?>
<h2><?= $outputAge ?></h2>

<!-- arrays -->
<?php
$bestLanguages = ["PHP", "JavaScript", "Python", 1];
$bestLanguages[] = "Java"; //pondrá en última posición
$bestLanguages[3] = "TypeScript"; //poner en una posición concreta
?>

<ul>
    <?php foreach ($bestLanguages as $key => $language) : ?>
        <li><?= $key . " " . $language ?></li>
    <?php endforeach; ?>
</ul>

<?php 
$peson = [
    "name" => "Maria",
    "age" => 31,
    "isDev"=> true,
    "languages" => ["PHP", "JavaScript", "Python"],
];
$person["age"] = 18;
$person["languages"][] = "Java";
?>

<!-- se pueden poner estilos -->
<style>
    body {
        display: grid;
        place-content: center;
    }
</style>