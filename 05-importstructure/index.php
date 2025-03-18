<!DOCTYPE html>
<html lang="en">

<?php  
require_once 'consts.php';
include_once 'functions.php';

$data = get_data(API_URL);
$untilMessage = get_until_message($data["days_until"]);
?>

<?php render_template('head', $data); ?>
<?php require 'sections/main.php'; ?>
<?php require 'sections/styles.php'; ?>

</html>