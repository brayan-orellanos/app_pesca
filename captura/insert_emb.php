<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    require_once('../datos_bdd/conexion.php');

    if($_POST) {
        $name = isset($_POST['ins_name']) ? $_POST['ins_name'] : '';
        $name_emb = isset($_POST['ins_emb']) ? $_POST['ins_emb'] : '';
        $met_pro = isset($_POST['selects2']) ? $_POST['selects2'] : '';
        $caballos = isset($_POST['caballos_fuerza']) ? $_POST['caballos_fuerza'] : '';
        $tp_emb = isset($_POST['radios2']) ? $_POST['radios2'] : '';
        $met_pes = isset($_POST['metodo_pes2']) ? $_POST['metodo_pes2'] : '';
        $zona_pes = isset($_POST['zona_pesca']) ? $_POST['zona_pesca'] : '';

        global $mysqli;
        $sql = "SELECT * FROM embarcaciones WHERE name = '{$name}'";
        $result = $mysqli->query($sql);
        
        if($result->num_rows) {
?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Error el usuario ya existe.',
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='formulario_captura.php';
            }
        });
    </script>

<?php
        } else {
            insert_emb($name, $name_emb, $met_pro, $caballos, $tp_emb, $met_pes, $zona_pes);   
?>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'La embarcacion se ha guardado satisfactoriamente.',
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
    }
?>
    
</body>
</html>

