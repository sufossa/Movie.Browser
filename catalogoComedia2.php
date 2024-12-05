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
        <a href="usuarios.php"><img src="usuario2.jpg" class="logo"></a>
        <a href="catalogo2.php">Inicio</a>
        <a href="catalogoAccion2.php">Acción</a> 
        <a href="catalogoDrama2.php">Drama</a>
        <a href="catalogoInfantil2.php">Infantil</a>
        </nav>

        <?php
        $peliculaDestacada = [
            'titulo' => 'Embriagado de amor',
            'imagen' => 'https://hacerselacritica.com/wp-content/uploads/2015/04/03.jpg',
            'tiempo' => '1h 35m',
            'genero'=> 'Comedia',
        ];
        ?>

        <!-- Enlace a la página de perfil para la película destacada -->
        <a href='detalle1.php?categoria=<?php echo urlencode($peliculaDestacada['genero']); ?>&titulo=<?php echo urlencode($peliculaDestacada['titulo']); ?>'>
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
                ['titulo' => 'Super', 'imagen' => 'https://r2.abcimg.es/resizer/resizer.php?imagen=https%3A%2F%2Fs1.abcstatics.com%2Fmedia%2Fpeliculas%2F000%2F034%2F450%2Fsuper-2.jpg', 'tiempo' => '1h 36m'],
                ['titulo' => 'Extrañas coincidencias', 'imagen' => 'https://i.ytimg.com/vi/LJl1VJWgmEs/mqdefault.jpg', 'tiempo' => '1h 47m'],
                ['titulo' => 'Chicas malas', 'imagen' => 'https://images.ecestaticos.com/2YdHczdbylJru1_3ykB9gfZ6jN0=/17x0:961x529/1200x675/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2F700%2Fd3d%2F10a%2F700d3d10a5fe68234d4abaa12b8affe7.jpg', 'tiempo' => '1h 37m'],
                ['titulo' => 'Misterio a la vista', 'imagen' => 'https://www.otroscines.com/images/fotos/misterio-a-la-vista-1000.jpg', 'tiempo' => '1h 29m'],
                ['titulo' => 'Hazme el favor', 'imagen' => 'https://tiempolibreqro.com/wp-content/uploads/2023/06/HAZME-EL-FAVOR-REDES.jpg', 'tiempo' => '1h 43m'],
                ['titulo' => 'Una esposa de mentira', 'imagen' => 'https://media.diariouno.com.ar/p/048b3f341d939267c3f46dbb9c1095c7/adjuntos/298/imagenes/009/222/0009222706/1200x0/smart/asi-luce-griffin-gluck-una-esposa-de-mentirajpg.jpg', 'tiempo' => '1h 57m'],
            ],
        ];

        foreach ($peliculasEjemplo as $categoria => $peliculas) {
            echo "<div class='genre-container'>";
            echo "<div class='genre-title'>$categoria</div>";
            echo "<div class='movie-container'>";
            for ($i = 0; $i < count($peliculas); $i++) {
                echo "<div class='small-movie'>";
                
                // Enlace a la página de perfil
                echo "<a href='detalle1.php?categoria=$categoria&titulo={$peliculas[$i]['titulo']}'>";

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
