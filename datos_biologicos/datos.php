<?php
    error_reporting(E_ALL);
    require_once('../datos_bdd/conexion.php');

    $esp = isset($_POST['lista']) ? $_POST['lista'] : 'Hello world';

    function gonodal() {
        global $mysqli, $esp;
        $sql = "SELECT * FROM images_gonodal WHERE especie = '{$esp}'";
        return $mysqli->query($sql);
    }

?>