<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="stylecatalogo.css">
</head>
<body>

    <div id="container">
        <nav>
        <a href="usuarios.php"><img src="usuario3.jpg" class="logo"></a>
        <a href="catalogo3.php">Inicio</a>
        <a href="catalogoAccion3.php">Acción</a>
        <a href="catalogoComedia3.php">Comedia</a>
        <a href="catalogoInfantil3.php">Infantil</a>
        </nav>

        <?php
        $peliculaDestacada = [
            'titulo' => 'Forrest Gump',
            'imagen' => 'https://media.cnn.com/api/v1/images/stellar/prod/140702154952-02-forrest-gump-restricted.jpg?q=w_2434,h_1631,x_0,y_0,c_fill',
            'tiempo' => '2h 22m',
            'genero'=> 'Drama',
        ];
        ?>

        <!-- Enlace a la página de perfil para la película destacada -->
        <a href='detalle2.php?categoria=<?php echo urlencode($peliculaDestacada['genero']); ?>&titulo=<?php echo urlencode($peliculaDestacada['titulo']); ?>'>
            <div class="featured-movie">
                <img src="<?php echo $peliculaDestacada['imagen']; ?>" alt="<?php echo $peliculaDestacada['titulo']; ?>">
                <div class="movie-info">
                    <div class="movie-title"><?php echo $peliculaDestacada['titulo']; ?></div>
                    <div class="movie-details">Duración: <?php echo $peliculaDestacada['tiempo']; ?></div>
                    <div class="movie-details">Género: <?php echo $peliculaDestacada['genero']; ?></div>
                </div>
            </div>
        </a>


        <?php
       
        $peliculasEjemplo = [
            'Drama' => [
                ['titulo' => 'El padrino', 'imagen' => 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2023/07/padrino-3096022.jpg?tf=3840x', 'tiempo' => '2h 55m'],
                ['titulo' => 'La lista de Schindler', 'imagen' => 'https://static.filmin.es/images/media/39953/2/still_2_3_1920x1080.webp', 'tiempo' => '3h 15m'],
                ['titulo' => 'Cadena perpetua', 'imagen' => 'https://media.revistagq.com/photos/5ca5ff9aec3cd11ede8df1cc/16:9/w_1280,c_limit/cadena_7362.png', 'tiempo' => '2h 22m'],
                ['titulo' => '10 cosas que odio de ti', 'imagen' => 'https://e.radio-grpp.io/large/2019/04/08/122012_775532.jpg', 'tiempo' => '1h 47m'],
                ['titulo' => 'Pequeñas grandes amigas', 'imagen' => 'https://televisa.brightspotcdn.com/dims4/default/30c953e/2147483647/strip/true/crop/1450x816+0+32/resize/1200x675!/quality/90/?url=https%3A%2F%2Ftelevisa-brightspot.s3.amazonaws.com%2Fapi%2F38%2F95%2Fad47b9014b5fa2414b6af5ade3d7%2Fb030.jpg', 'tiempo' => '1h 32m'],
                ['titulo' => 'Cuestión de tiempo', 'imagen' => 'https://legacy.tyt.com/wp-content/uploads/AboutTime-Clip01.png', 'tiempo' => '2h 3m'],
            ],
        ];

        foreach ($peliculasEjemplo as $categoria => $peliculas) {
            echo "<div class='genre-container'>";
            echo "<div class='genre-title'>$categoria</div>";
            echo "<div class='movie-container'>";
            for ($i = 0; $i < count($peliculas); $i++) {
                echo "<div class='small-movie'>";
                
                // Enlace a la página de perfil
                echo "<a href='detalle2.php?categoria=$categoria&titulo={$peliculas[$i]['titulo']}'>";

                echo "<img src='{$peliculas[$i]['imagen']}' alt='{$peliculas[$i]['titulo']}'>";
                echo "</a>";
            
                echo "<div class='small-movie-info'>";
                echo "<div class='small-movie-title'>{$peliculas[$i]['titulo']}</div>";
                echo "<div class='small-movie-details'>Duración: {$peliculas[$i]['tiempo']}</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>"; // Cierre de movie-container
            echo "</div>"; // Cierre de genre-container
        }
        ?>
    </div>
</body>
</html>
