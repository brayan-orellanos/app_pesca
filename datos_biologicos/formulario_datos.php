<?php 
    require_once('../datos_bdd/conexion.php');

    $name = isset($_POST['lista']) ? $_POST['lista'] : '';
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

        <form action="">
            <select name="lista" id="lista" onchange="xd(this.value)">
                <option value="datos.jpg">pez1</option>
                <option value="pez.jpeg">pez2</option>
                <option value="mas-info.jpg">pez3</option>
            </select>
            <img src="../images/<?php echo $name?>" alt="">
        </form>
    </main>
    <script src="datos.js"></script>
</body>
</html>