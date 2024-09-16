<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*Ejecutar la petición
y guardamos el resultado
*/
$result = curl_exec( $ch);
$data = json_decode($result, true);

curl_close( $ch );

// var_dump( $data );
?>

<head>
    <meta charset="UTF-8"/>
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
>
</head>

<main>
    <!-- En este "pre" comentado veríamos en json el contenido de la API
        <pre style="font-size: 8px; overflow: scroll; height:250px">
        <?php var_dump($data); ?>
    </pre> -->
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>" style="border-radius:16px; box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5) " />
    </section>

    <hgroup>
        <br><h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3><br>
        <p>Fecha de estreno: <?= $data ["release_date"]; ?> </p><br>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>


</main>

<style>
    :root {
        color-scheme: dark;
    }

    body {
        display: grid;
        place-content: center;
        text-align: center;
    }

</style>


