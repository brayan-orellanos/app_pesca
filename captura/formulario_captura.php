<?php
    require_once('../datos_bdd/conexion.php');
    error_reporting(E_ALL);
    
    
    if($_POST){
        $nombre = isset($_POST['buscar']) ? $_POST['buscar'] : '';
        $campos = datos($nombre); 
    } 
    
    $result = buscar();
    $metodo_prop = metodo_prop();
    $embarcacion = embarcacion();
    $metodo_pesca = metodo_pesca();
    $zona_pesca = zona_pesca();
    $especie = especie();
    $presentacion = presentacion();
    $categoria = categoria();
    $mp = metodo_prop();
    $emb = embarcacion();
    $mtp = metodo_pesca();
    $caballos_fuerza = caballos_fuerza();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/captura_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Registro</title>
</head>

<body>
    <main>
        <p id="test" class="m-0"></p>
        <div class="mb-4">
            <img src="../images/captura_esfuerzo.jpg" class="img-fluid col-12" style="max-height: 350px;" alt="banner">
            <h2 class="bg-primary text-white align-middle text-center py-3">Captura y esfuerzo</h2>
        </div>


        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.html">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulario-captura</li>
                </ol>
            </nav>
            
            <form action="formulario_captura.php" method="POST" class="form my-4" id="form_buscar" autocomplete="off">
                <div class="mb-4" id="container_buscar">
                    <label for="buscar" class="form-label fs-5">Crear registro*</label>
                    <input type="text" name="buscar" class="form-control <?php echo $border; ?>" id="buscar" placeholder="Ingresar nombre" list="empleados">
                    <p id="error" class="<?php echo $class; ?>"><?php echo $msg; ?></p>
                    <datalist id="empleados">
                        <?php 
                        while($embar = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $embar['name']; ?>"></option>
                        <?php } ?>
                    </datalist>
                </div>
                <input type="submit" class="btn btn-primary" id="btnBuscar" value="Buscar">
                
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Nueva embarcacion</button>
            </form>


            <form action="insert_registro.php" method="POST" class="mb-4 row g-3 form_captura <?php echo $display; ?>" id="form_captura" autocomplete="on">

                <p class="fs-5">Los campos con asteriscos *, son campos requeridos.</p>

                <div class="mb-4 col-12 visually-hidden" disabled>
                    <label for="name" class="form-label">Id</label>
                    <input type="text" id="id_embarcacion" name="id_embarcacion" value="<?php echo $campos['id'];?>">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="name" class="form-label">Nombre*</label>
                    <input type="text" id="name_captura" name="name_captura" class="form-control" value="<?php if(isset($_POST['buscar'])) {echo $campos['name'];} ?>">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="ambarcacion" class="form-label">Nombre de embarcacion*</label>
                    <input type="text" id="embarcacion" name="embarcacion" class="form-control"
                        value="<?php if(isset($_POST['buscar'])) {echo $campos['name_embarcacion'];} ?>">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="selects" class="form-label">Metodo de Propulsion*</label>
                    <select name="selects" id="selects" class="form-select">
                    <?php 
                        while($prop = $metodo_prop->fetch_assoc()) {
                            if($campos['metodo_propulsion'] == $prop['id']) {
                    ?>
                        <option value="<?php echo $prop['id']; ?>" selected><?php echo $prop['name']; ?></option>

                    <?php } else {?>
                        <option value="<?php echo $prop['id']; ?>"><?php echo $prop['name']; ?></option>
                    <?php } } ?>
                    </select>
                </div>

                <div class="mb-4  col-md-6">
                    <label for="num_pescadores" class="form-label">Numero de pescadores*</label>
                    <input type="number" name="num_pescadores" id="num_pescadores" class="form-control" min="1">
                </div>

                <div class="mb-4  col-md-6">
                    <label for="fecha_llegada" class="form-label">Fecha llegada*</label>
                    <input type="date" name="fecha_llegada" id="fecha_llegada" class="form-control">
                </div>

                <div class="mb-4  col-md-6">
                    <label for="fecha_salida" class="form-label">Fecha salida*</label>
                    <input type="date" name="fecha_salida" id="fecha_salida" class="form-control">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="hora_llegada" class="form-label">Hora llegada*</label>
                    <input type="time" name="hora_llegada" id="hora_llegada" class="form-control">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="hora_salida" class="form-label">Hora salida*</label>
                    <input type="time" name="hora_salida" id="hora_salida" class="form-control">
                </div>

                <div class="mb-4 col-md-6" id="tipEmb">
                    <label for="checks" class="form-label d-block">Tipo de embarcacion*</label>
                    <?php
                        while($checks = $embarcacion->fetch_assoc()) {
                            if($campos['tipo_embarcacion'] == $checks['id']) {
                    ?>
                        <div class="form-check form-check-inline" id="checks">
                            <input class="form-check-input check" type="radio" name="inlineRadioOptions" id="inlineRadio<?php echo $checks['id']; ?>" value="<?php echo $checks['id'];?>" checked>
                            <label class="form-check-label" for="inlineRadio<?php echo $checks['id'];?>"><?php echo $checks['name']; ?></label>
                        </div>
                    <?php } else {?>
                        <div class="form-check form-check-inline" id="checks">
                            <input class="form-check-input check" type="radio" name="inlineRadioOptions"
                                id="inlineRadio<?php echo $checks['id']; ?>" value="<?php echo $checks['id'];?>">
                            <label class="form-check-label"
                                for="inlineRadio<?php echo $checks['id'];?>"><?php echo $checks['name']; ?></label>
                        </div>
                    <?php }} ?>
                </div>

                <div class="mb-4 col-md-6">
                    <label for="selectd" class="form-label">Metodo de pesca*</label>
                    <select name="selectd" id="selectd" class="form-select">
                        <?php 
                            while($selects = $metodo_pesca->fetch_assoc()) {
                                if($campos['metodo_pesca'] == $selects['id']) {
                        ?>
                            <option value="<?php echo $selects['id']; ?>" selected><?php echo $selects['name']; ?></option>
                        <?php } else {?>
                            <option value="<?php echo $selects['id']; ?>"><?php echo $selects['name']; ?></option>
                        <?php }} ?>
                    </select>
                </div>

                <div class="mb-4 col-md-6">
                    <label for="selectx" class="form-label">Zona de pesca*</label>
                    <select name="selectx" id="selectx" class="form-select">
                        <option value="0" selected>Seleccionar una zona</option>
                        <?php 
                            while($selects = $zona_pesca->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $selects['id']; ?>"><?php echo $selects['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-4 col-md-6">
                    <label for="respuesta" class="form-label">Detalles del metodo de pesca</label>
                    <textarea class="form-control textarea" placeholder="Respuesta" id="respuesta" name="respuesta"></textarea>
                </div>

                <div class="mb-4 col-md-6">
                    <label for="especie" class="form-label">Especie*</label>
                    <select name="especie" id="especie" class="form-select">
                        <option value="0" selected disabled>Seleccionar especie</option>
                        <?php 
                            while($pez = $especie->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $pez['id'];?>"><?php echo $pez['name']; ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="mb-4 col-md-6">
                    <label for="presentacion" class="form-label">presentacion*</label>
                    <select name="presentacion" id="presentacion" class="form-select">
                        <option value="0" selected disabled>Seleccionar presentacion</option>
                        <?php 
                            while($pre = $presentacion->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $pre['id'];?>"><?php echo $pre['name']; ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="mb-4 col-md-6">
                    <label for="categoria" class="form-label">categoria*</label>
                    <select name="categoria" id="categoria" class="form-select">
                        <option value="0" selected disabled>Seleccionar categoria</option>
                        <?php 
                            while($item = $categoria->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $item['id'];?>"><?php echo $item['name']; ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="mb-4 col-md-6">
                    <label for="ejemplares" class="form-label">Numero de ejemplares*</label>
                    <input type="number" class="form-control" name="ejemplares" id="ejemplares" min="1">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="peso" class="form-label">peso(kg)*</label>
                    <input type="number" class="form-control" id="peso" placeholder="Peso" name="peso" min="1" step=".01">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="valor" class="form-label">Valor*</label>
                    <input type="number" class="form-control" id="valor" placeholder="Valor" name="valor" min="1">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="combustible" class="form-label">Combustible</label>
                    <input type="number" class="form-control" id="combustible" placeholder="Combustible" name="combustible" min="1">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="alquiler" class="form-label">Alquiler embarcacion</label>
                    <input type="number" class="form-control" id="alquiler" placeholder="Alquiler embarcacion" name="alquiler" min="1">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="artes" class="form-label">Alquiler artes</label>
                    <input type="number" class="form-control" id="artes" placeholder="Alquiler artes" name="artes" min="1">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="hielo" class="form-label">Hielo</label>
                    <input type="number" class="form-control" id="hielo" placeholder="Hielo" name="hielo" min="1">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="comida" class="form-label">Comida</label>
                    <input type="number" class="form-control" id="comida" placeholder="Comida" name="comida" min="1">
                </div>

                <div class="mb-4 col-md-6">
                    <label for="carnada" class="form-label">Carnada</label>
                    <input type="number" class="form-control" id="carnada" placeholder="Carnada" name="carnada">
                </div>
                <p id="p"></p>
                <?php echo $enviar; ?>
            </form>
        </div>



        <div class="modal" id="myModal" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Insertar embarcacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form action="insert_emb.php" method="POST" class="form" id="form_new_user" autocomplete="off">
                            <div class="mb-4">
                                <label for="ins_name" class="form-label">Nombre*</label>
                                <input type="text" name="ins_name" id="ins_name" class="form-control" placeholder="Nombre">    
                            </div>

                            <div class="mb-4">
                                <label for="ins_emb" class="form-label">Nombre embarcacion*</label>
                                <input type="text" name="ins_emb" id="ins_emb" class="form-control" placeholder="Nombre">    
                            </div>

                            <div class="mb-4">
                                <label for="selects2" class="form-label">Metodo de Propulsion*</label>
                                <select name="selects2" id="selects2" class="form-select">
                                    <option value="0" selected>Seleccione un metodo</option>
                                <?php 
                                    while($met_pr = $mp->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $met_pr['id']; ?>"><?php echo $met_pr['name']; ?></option>
                                <?php }  ?>
                                </select>
                            </div>

                            <div class="mb-4 caballos">
                                <label for="caballos_fuerza" class="form-label">Caballos de fuerza*</label>
                                <select name="caballos_fuerza" id="caballos_fuerza" class="form-select">
                                    <option value="0" selected>Seleccione los caballos de fuerza</option>
                                <?php 
                                    while($result = $caballos_fuerza->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                                <?php }  ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="checks2" class="form-label d-block">Tipo de embarcacion*</label>
                                <?php
                                    while($checks = $emb->fetch_assoc()) {
                                ?>
                                    <div class="form-check form-check-inline" id="checks<?php echo $checks['id']; ?>">
                                        <input class="form-check-input" type="radio" name="radios2" id="checkd<?php echo $checks['id'];?>" value="<?php echo $checks['id'];?>">
                                        <label class="form-check-label" for="checkd<?php echo $checks['id'];?>"><?php echo $checks['name']; ?></label>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="mb-4">
                                <label for="metodo_pes2" class="form-label">Metodo de pesca*</label>
                                <select name="metodo_pes2" id="metodo_pes2" class="form-select">
                                    <option value="0" selected>Seleccione un metodo</option>
                                <?php 
                                    while($selects = $mtp->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $selects['id']; ?>"><?php echo $selects['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cerrar"></input>
                                <input type="submit" class="btn btn-primary" value="Guardar"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../scripts/guardar_registro.js"></script>
    <script src="../scripts/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous" type="module">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous" type="module">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous" type="module"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="module" src="../scripts/guardar_usuario.js"></script>
</body>

</html>