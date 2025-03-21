<?php 
if (isset($_POST['username'])) {
    echo "Usuario: " . $_POST['username'];
} else {
    echo "No se ingresó ningún usuario.";
}
?>