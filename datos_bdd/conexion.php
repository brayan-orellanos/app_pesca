<?php 
    error_reporting(E_ALL);
    require_once('connection.php');
    
    $msg = '';
    $class = '';
    $border = '';
    $display = 'd-none';
    $enviar = '';

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $mysqli->query("SET NAMES 'utf8'");
    $result = '';
    if($mysqli->connect_errno) {
        echo 'Eror en la conexion';
        exit;
    } 


    function buscar() {
        global $mysqli, $result;
        $sql = "SELECT * FROM embarcaciones";
        return $mysqli->query($sql);
    }

    function datos($nombre) {
        global $mysqli, $result, $msg, $class, $border, $display, $enviar;
        $sql = "SELECT * FROM embarcaciones WHERE name = '{$nombre}'";
        $result = $mysqli->query($sql);

        if($result->num_rows) {
            $display = 'd-flex';
            $enviar = '
            <div class="d-grid gap-2 d-md-block text-center pb-4">
                <input type="submit" class="btn btn-primary"  value="Guardar registro">
            </div>';
            return $result->fetch_assoc();
        } else {
            $msg = 'Debe seleccionar o escribir un nombre existente';
            $border = 'border border-danger';
            $class = 'p-2 text-danger';
            $display = 'd-none';
            return false;
        }
    }

    function insert_emb($name, $name_emb, $met_pro, $caballos, $tp_emb, $met_pes, $zona_pes) {
        global $mysqli, $result;
        $sql = "INSERT INTO `embarcaciones`(`name`, `name_embarcacion`, `metodo_propulsion`, `caballos_fuerza`, `tipo_embarcacion`, `metodo_pesca`, `zona_pesca`) VALUES ('{$name}','{$name_emb}','{$met_pro}','{$caballos}','{$tp_emb}','{$met_pes}', '{$zona_pes}')";
        return $mysqli->query($sql);
    }

    function embarcacion() {
        global $mysqli, $result;
        $sql = "SELECT * FROM tipo_embarcacion";
        return $mysqli->query($sql);
    }

    function metodo_pesca() {
        global $mysqli, $result;
        $sql = "SELECT * FROM metodo_pesca";
        return $mysqli->query($sql);
    }

    function metodo_prop() {
        global $mysqli, $result;
        $sql = "SELECT * FROM metodo_propulsion";
        return $mysqli->query($sql);
    }


    function especie() {
        global $mysqli;
        $sql = "SELECT * FROM especie";
        return $mysqli->query($sql);
    }

    function presentacion() {
        global $mysqli;
        $sql = "SELECT * FROM presentacion";
        return $mysqli->query($sql);
    }

    function categoria() {
        global $mysqli;
        $sql = "SELECT * FROM categoria";
        return $mysqli->query($sql);
    }

    function insert_registro($id_embarcacion, $num_pescadores, $fecha_llegada, $fecha_salida, $hora_llegada, $hora_salida, $respuesta, $especie, $presentacion, $categoria, $ejemplares, $peso, $valor, $combustible, $alquiler, $artes, $hielo, $comida, $carnada) {
        global $mysqli, $result;
        $sql = "INSERT INTO `registros`(`id_embarcacion`, `num_pescadores`, `fecha_llegada`, `fecha_salida`, `hora_llegada`, `hora_salida`, `detalles`, `especie`, `presentacion`, `categoria`, `numero_ejemplares`, `peso`, `valor`, `combustible`, `alquiler_embarcacion`, `alquiler_artes`, `hielo`, `comida`, `carnada`) VALUES ('{$id_embarcacion}', '{$num_pescadores}', '{$fecha_llegada}', '{$fecha_salida}', '{$hora_llegada}', '{$hora_salida}', '{$respuesta}', '{$especie}', '{$presentacion}', '{$categoria}', '{$ejemplares}', '{$peso}', '{$valor}', '{$combustible}', '{$alquiler}', '{$artes}', '{$hielo}', '{$comida}', '{$carnada}')";
        return $mysqli->query($sql);
    }

    function zona_pesca() {
        global $mysqli, $result;
        $sql = "SELECT * FROM zona_pesca";
        return $mysqli->query($sql);
    }

    function caballos_fuerza() {
        global $mysqli, $result;
        $sql = "SELECT * FROM caballos_fuerza";
        return $mysqli->query($sql);
    }
?>