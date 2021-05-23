<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    

<?php
    error_reporting(E_ALL);
    require_once('../datos_bdd/conexion.php');

    if($_POST) {
        $id_embarcacion = isset($_POST['id_embarcacion']) ? $_POST['id_embarcacion'] : '';
        $num_pescadores = isset($_POST['num_pescadores']) ? $_POST['num_pescadores'] : 0;
        $fecha_llegada = isset($_POST['fecha_llegada']) ? $_POST['fecha_llegada'] : '';
        $fecha_salida = isset($_POST['fecha_salida']) ? $_POST['fecha_salida'] : '';
        $hora_llegada = isset($_POST['hora_llegada']) ? $_POST['hora_llegada'] : '';
        $hora_salida = isset($_POST['hora_salida']) ? $_POST['hora_salida'] : '';
        $respuesta = isset($_POST['respuesta']) ? $_POST['respuesta'] : '';
        $especie = isset($_POST['especie']) ? $_POST['especie'] : '';
        $presentacion = isset($_POST['presentacion']) ? $_POST['presentacion'] : '';
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
        $ejemplares = isset($_POST['ejemplares']) ? $_POST['ejemplares'] : 0;
        $peso = isset($_POST['peso']) ? $_POST['peso'] : 0;
        $valor = isset($_POST['valor']) ? $_POST['valor'] : 0;
        $combustible = isset($_POST['combustible']) ? $_POST['combustible'] : 0;
        $alquiler = isset($_POST['alquiler']) ? $_POST['alquiler'] : 0;
        $artes = isset($_POST['artes']) ? $_POST['artes'] : 0;
        $hielo = isset($_POST['hielo']) ? $_POST['hielo'] : 0;
        $comida = isset($_POST['comida']) ? $_POST['comida'] : 0;
        $carnada = isset($_POST['carnada']) ? $_POST['carnada'] : 0;

        insert_registro($id_embarcacion, $num_pescadores, $fecha_llegada, $fecha_salida, $hora_llegada, $hora_salida, $respuesta, $especie, $presentacion, $categoria, $ejemplares, $peso, $valor, $combustible, $alquiler, $artes, $hielo, $comida, $carnada);
?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'El registro se ha guardado satisfactoriamente.',
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='formulario_captura.php';
            }
        });
    </script>

<?php
    } 
?>
</body>
</html>