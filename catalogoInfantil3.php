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
        <a href="catalogoDrama3.php">Drama</a>
        </nav>

        <?php
        $peliculaDestacada = [
            'titulo' => 'El gran showman',
            'imagen' => 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2017/12/gran-showman_7.jpg',
            'tiempo' => '1h 45m',
            'genero'=> 'Infantil',
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
            'Infantil' => [
                ['titulo' => 'Hannah Montana: La película', 'imagen' => 'https://play-lh.googleusercontent.com/proxy/XOeFhw3kN2oZrmzyPQ5Gqg-AJiyANGKTWIePHIW4JUg4fcKZc037KRoxdtPIp2BLYvPKAuS4LNsorQtZwsoFkWITXEBLHHVaJDSWKU5RuPJik_wYNKn6=s1920-w1920-h1080', 'tiempo' => '1h 42m'],
                ['titulo' => 'Moana', 'imagen' => 'https://wallpapershome.com/images/pages/pic_h/11731.jpg', 'tiempo' => '1h 47m'],
                ['titulo' => 'Alvin y las Ardillas', 'imagen' => 'https://prod-ripcut-delivery.disney-plus.net/v1/variant/disney/B8CBED0C05F575C88CC655F9D304C061C17F906FD08BCEA097B8F47B2CDD631D/scale?width=1200&aspectRatio=1.78&format=jpeg', 'tiempo' => '1h 32m'],
                ['titulo' => 'Pinocchio', 'imagen' => 'https://m.media-amazon.com/images/M/MV5BN2VlM2FhOWUtOWUyNi00OTFlLWIwMjktZDhmMTM4ZDliMGJkXkEyXkFqcGdeQWFybm8@._V1_.jpg', 'tiempo' => '1h 54m'],
                ['titulo' => 'Luca', 'imagen' => 'https://s1.eestatic.com/2021/06/16/actualidad/589452147_191886287_1706x960.jpg', 'tiempo' => '1h 35m'],
                ['titulo' => 'Gato con botas: el último deseo', 'imagen' => 'https://occ-0-2794-2219.1.nflxso.net/dnm/api/v6/E8vDc_W8CLv7-yMQu8KMEC7Rrr8/AAAABW8lspYY_QESkchIEh-Zr5Ak3ZI9GMROyIBOke7O_jZhKnyXDKpUcuCtWPr1lUO91kfWsYILUXrGqiX5o8OrVXjIU45pSlQTvLEJ.jpg', 'tiempo' => '1h 40m'],
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
