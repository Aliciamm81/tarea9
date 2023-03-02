<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import "style.css";
    </style>
</head>

<body>
    <header>
        <div id="cabecera">

        </div>
    </header>

    <?php
    require_once 'eltiempo.php';
    /**
     * Si esta seteado llama a la función getTiempo y le pasa por parámetro
     * la url de la API y el codigo de la ciudad introducida por el usuario, la función devuelve una cadena
     * de la que se almacenan en $tiempo el tiempo que hace hoy en la ciudad indicada y
     * en $ciudad el nombre de la ciudad. Si no está seteado 
     * borra el valor de las variable $ciudad y $tiempo. 
     */

    if (isset($_GET["ciudades"])) {

        $ciudades = $_GET["ciudades"];
        $url = 'https://www.el-tiempo.net/api/json/v2/provincias/' . $ciudades;

        $buscarTiempo = new Eltiempo();
        $datos = $buscarTiempo->getTiempo($url);

        $tiempo = $datos["today"]["p"];
        $ciudad = $datos['provincia']['NOMBRE_PROVINCIA'];
        $texto = "Ciudad de: ";
       
    } else {
        $ciudad = ""; 
        $tiempo = "";
        $texto = "";
    }

    ?>
    
    <div id="formulario">

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="get">
            <label for="ciudad">Introduce un código de provincia (ejemplo: 28 - Madrid). Si no lo sabes puedes consultarlo en este <a href="https://www.ine.es/daco/daco42/codmun/cod_provincia.htm"  target="_blank">enlace</a>.</label>
            <input id="ciudad" name="ciudades" type="text">
            <input type="submit" value="Buscar">
        </form>
        
        <div>
            <p><b><?=$texto?></b><span class="contenido"><?= $ciudad  ?></span></p>
            <p><span class="contenido"><?=$tiempo ?></span></p>
        </div>

    </div>
    <footer>
        <div id="pie">
            <p> <b>Api:</b> El tiempo</p>
            <p> <b>Trabajo de:</b> DWES Tarea 9</p>
            <p id="firma">Alicia Martínez Maqueda 53430956R</p>
        </div>

    </footer>
</body>

</html>