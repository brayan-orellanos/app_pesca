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
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
        $lista = isset($_POST['lista']) ? $_POST['lista'] : '';
        $lTotal = isset($_POST['lTotal']) ? $_POST['lTotal'] : '';
        $lEstandar = isset($_POST['lEstandar']) ? $_POST['lEstandar'] : '';
        $lHorquilla = isset($_POST['lHorquilla']) ? $_POST['lHorquilla'] : '';
        $pCorporal = isset($_POST['pCorporal']) ? $_POST['pCorporal'] : '';
        $pEviserado = isset($_POST['pEviserado']) ? $_POST['pEviserado'] : '';
        $pTotal = isset($_POST['pTotal']) ? $_POST['pTotal'] : '';
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
        $eGonodal = isset($_POST['eGonodal']) ? $_POST['eGonodal'] : '';
        $cComercial = isset($_POST['cComercial']) ? $_POST['cComercial'] : '';

        insert_datos($fecha, $lista, $lTotal, $lEstandar, $lHorquilla, $pCorporal, $pEviserado, $pTotal, $sexo, $eGonodal, $cComercial);
?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Los datos se han guardado satisfactoriamente.',
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='formulario_datos.php';
            }
        });
    </script>

<?php
    } 
?>
</body>
</html>