<?php 
    error_reporting(E_ALL);
    require_once('../datos_bdd/conexion.php');
    require_once('../datos_biologicos/datos.php');

    $especies = especie();
    $sexos = sexo();
    $eGonodales = gonodal();
    $cComerciales = cComercial();
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
    <title>Datos biologicos</title>
</head>

<body>
    <main>
        <div class="mb-4">
            <img src="../images/datos.jpg" class="img-fluid col-12" style="max-height: 350px;" alt="banner">
            <h2 class="bg-primary text-white align-middle text-center py-3">Datos biologicos</h2>
        </div>

        <div class="container mb-4">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.html">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Datos biologicos</li>
                </ol>
            </nav>

            <form action="" method="POST" class="row g-3" autocomplete="off" id="form_datos">

                <p class="fs-5">Los campos con asteriscos *, son campos requeridos.</p>


                <div class="col-md-6 mb-4">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha">                
                </div>

                <div class="col-md-6 mb-4">
                    <label for="lista" class="form-label">Especie</label>
                    <select name="lista" class="form-select" id="lista" onchange="consulta(this.value)">
                        <option value="0">seleccionar especie</option>
                        <?php while($especie = $especies->fetch_assoc()) {?>
                        <option value="<?php echo $especie['id'];?>"><?php echo $especie['name']?></option>
                        <?php } ?>
                    </select>
                    <img id="imagen" class="img-fluid rounded d-block mx-auto pt-2 m-0">               
                </div>

                <div class="col-md-6 mb-4">
                    <label for="lTotal" class="form-label">Longitud total</label>
                    <input type="number" class="form-control" name="lTotal" id="lTotal" min="1" step=".01">                
                </div>

                <div class="col-md-6 mb-4">
                    <label for="lEstandar" class="form-label">Longitud estandar</label>
                    <input type="number" class="form-control" name="lEstandar" id="lEstandar" min="1" step=".01">                
                </div>

                <div class="col-md-6 mb-4">
                    <label for="lHorquilla" class="form-label">Longitud horquilla</label>
                    <input type="number" class="form-control" name="lHorquilla" id="lHorquilla" min="1" step=".01">                
                </div>

                <div class="col-md-6 mb-4">
                    <label for="pCorporal" class="form-label">Perimetro corporal</label>
                    <input type="number" class="form-control" name="pCorporal" id="pCorporal" min="1" step=".01">                
                </div>

                <div class="col-md-6 mb-4">
                    <label for="pEviserado" class="form-label">Peso eviserado</label>
                    <input type="number" class="form-control" name="pEviserado" id="pEviserado" min="1" step=".01">                
                </div>

                <div class="col-md-6 mb-4">
                    <label for="pTotal" class="form-label">Peso total</label>
                    <input type="number" class="form-control" name="pTotal" id="pTotal" min="1" step=".01">                
                </div>

                <div class="col-md-6 mb-4">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="sexo" class="form-select" id="sexo">
                        <option value="">seleccionar especie</option>
                        <?php while($sexo = $sexos->fetch_assoc()) {?>
                        <option value="<?php echo $sexo['id'];?>"><?php echo $sexo['name']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="eGonodal" class="form-label">Estado gonodal</label>
                    <select name="eGonodal" class="form-select" id="eGonodal">
                        <option value="">seleccionar especie</option>
                        <?php while($eGonodal = $eGonodales->fetch_assoc()) {?>
                        <option value="<?php echo $eGonodal['id'];?>"><?php echo $eGonodal['estado']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="cComercial" class="form-label">Categoria comercial</label>
                    <select name="cComercial" class="form-select" id="cComercial">
                        <option value="">seleccionar especie</option>
                        <?php while($cComercial = $cComerciales->fetch_assoc()) {?>
                        <option value="<?php echo $cComercial['id'];?>"><?php echo $cComercial['categoria']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="d-grid gap-2 d-md-block text-center pb-4">
                    <input type="submit" class="btn btn-primary"  value="Guardar Datos">
                </div>

            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"
        type="module">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"
        type="module">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"
        type="module"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../scripts/datos.js"></script>
</body>

</html>