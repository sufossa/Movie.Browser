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
        <a href="usuarios.php"><img src="usuario1.jpg" class="logo"></a>
        <a href="catalogo1.php">Inicio</a>
        <a href="catalogoDrama1.php">Drama</a>
        <a href="catalogoComedia1.php">Comedia</a>
        <a href="catalogoInfantil1.php">Infantil</a>
        </nav>

        <?php
        $peliculaDestacada = [
            'titulo' => 'Robocop',
            'imagen' => 'https://static.theclinic.cl/media/2023/07/28-225511_aoeh_Peter-weller-de-robocop.jpg',
            'tiempo' => '2h 1m',
            'genero'=> 'Acción',
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
            'Acción' => [
                ['titulo' => 'The Warriors', 'imagen' => 'https://i.blogs.es/a93fa5/the-warriors-pelicula/1366_2000.jpg', 'tiempo' => '1h 32m'],
                ['titulo' => 'Operación dragón', 'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Saxon_and_Kelly.jpg/280px-Saxon_and_Kelly.jpg', 'tiempo' => '1h 42m'],
                ['titulo' => 'Arma Letal', 'imagen' => 'https://imagenes.20minutos.es/files/image_1920_1080/uploads/imagenes/2021/11/28/arma-letal.jpeg', 'tiempo' => '1h 57m'],
                ['titulo' => 'Contrarreloj', 'imagen' => 'https://www.eltiempo.com/files/article_main_1200/uploads/2023/09/09/64fd4432604da.jpeg', 'tiempo' => '1h 31m'],
                ['titulo' => 'El Justiciero: Capítulo final', 'imagen' => 'https://imgmedia.larepublica.pe/640x371/larepublica/original/2023/10/17/652efba2c2cd860c30137690.webp', 'tiempo' => '1h 49m'],
                ['titulo' => 'Ghosted', 'imagen' => 'https://fotografias.antena3.com/clipping/cmsimages01/2023/03/07/70050457-49A9-4D97-A9B2-5E0F0587AF09/chris-evans-ana-armas-ghosted_98.jpg', 'tiempo' => '1h 56m'],
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
