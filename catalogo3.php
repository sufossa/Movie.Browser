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
        <a href="usuarios.php"><img src="https://pm1.aminoapps.com/7472/9fd8af1ad958439d8beaec958463cce07fba78f3r1-735-736v2_hq.jpg" class="logo"></a>
        <a href="CatalogoAccion3.php">Acción</a>
        <a href="CatalogoComedia3.php">Comedia</a>
        <a href="CatalogoDrama3.php">Drama</a>
        <a href="CatalogoInfantil3.php">Infantil</a>
        </nav>

        <?php
        $peliculaDestacada = [
            'titulo' => 'La boda de mi mejor amiga',
            'imagen' => 'https://media.vogue.es/photos/60a2969efae5608e730974a0/master/w_1600%2Cc_limit/24141_0039__20160922231209.jpg',
            'tiempo' => '2h 5m',
            'genero'=> 'Comedia',
        ];
        ?>

        <!-- Enlace a la página de perfil para la película destacada -->
        <a href='detalle.php?categoria=<?php echo urlencode($peliculaDestacada['genero']); ?>&titulo=<?php echo urlencode($peliculaDestacada['titulo']); ?>'>
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
            'Comedia' => [
                ['titulo' => 'Embriagado de amor', 'imagen' => 'https://pics.filmaffinity.com/punch_drunk_love-329709815-large.jpg', 'tiempo' => '1h 35m'],
                ['titulo' => 'Extrañas coincidencias', 'imagen' => 'https://i.ytimg.com/vi/LJl1VJWgmEs/mqdefault.jpg', 'tiempo' => '1h 47m'],
                ['titulo' => 'Chicas malas', 'imagen' => 'https://images.ecestaticos.com/2YdHczdbylJru1_3ykB9gfZ6jN0=/17x0:961x529/1200x675/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2F700%2Fd3d%2F10a%2F700d3d10a5fe68234d4abaa12b8affe7.jpg', 'tiempo' => '1h 37m'],
            ],
            'Acción' => [
                ['titulo' => 'The Warriors', 'imagen' => 'https://i.blogs.es/a93fa5/the-warriors-pelicula/1366_2000.jpg', 'tiempo' => '1h 32m'],
                ['titulo' => 'Operación dragón', 'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Saxon_and_Kelly.jpg/280px-Saxon_and_Kelly.jpg', 'tiempo' => '1h 42m'],
                ['titulo' => 'Arma Letal', 'imagen' => 'https://imagenes.20minutos.es/files/image_1920_1080/uploads/imagenes/2021/11/28/arma-letal.jpeg', 'tiempo' => '1h 57m'],
            ],
            'Drama' => [
                ['titulo' => 'El padrino', 'imagen' => 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2023/07/padrino-3096022.jpg?tf=3840x', 'tiempo' => '2h 55m'],
                ['titulo' => 'La lista de Schindler', 'imagen' => 'https://static.filmin.es/images/media/39953/2/still_2_3_1920x1080.webp', 'tiempo' => '3h 15m'],
                ['titulo' => 'Cadena perpetua', 'imagen' => 'https://media.revistagq.com/photos/5ca5ff9aec3cd11ede8df1cc/16:9/w_1280,c_limit/cadena_7362.pngg', 'tiempo' => '2h 22m'],
            ],
            'Infantil' => [
                ['titulo' => 'Hannah Montana: La película', 'imagen' => 'https://play-lh.googleusercontent.com/proxy/XOeFhw3kN2oZrmzyPQ5Gqg-AJiyANGKTWIePHIW4JUg4fcKZc037KRoxdtPIp2BLYvPKAuS4LNsorQtZwsoFkWITXEBLHHVaJDSWKU5RuPJik_wYNKn6=s1920-w1920-h1080', 'tiempo' => '1h 42m'],
                ['titulo' => 'Moana', 'imagen' => 'https://wallpapershome.com/images/pages/pic_h/11731.jpg', 'tiempo' => '1h 47m'],
                ['titulo' => 'Alvin y las Ardillas', 'imagen' => 'https://prod-ripcut-delivery.disney-plus.net/v1/variant/disney/B8CBED0C05F575C88CC655F9D304C061C17F906FD08BCEA097B8F47B2CDD631D/scale?width=1200&aspectRatio=1.78&format=jpeg', 'tiempo' => '1h 32m'],
            ],
        ];

        foreach ($peliculasEjemplo as $categoria => $peliculas) {
            echo "<div class='genre-container'>";
            echo "<div class='genre-title'>$categoria</div>";
            echo "<div class='movie-container'>";
            for ($i = 0; $i < count($peliculas); $i++) {
                echo "<div class='small-movie'>";
                
                // Enlace a la página de perfil
                echo "<a href='detalle.php?categoria=$categoria&titulo={$peliculas[$i]['titulo']}'>";

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
