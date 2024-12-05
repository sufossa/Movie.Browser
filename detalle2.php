<?php
    // Obtén la información de la película desde la consulta GET
    $titulo = $_GET['titulo'];

    // Lee la información de las películas desde el archivo
    $peliculasContenido = file_get_contents('peliculas.txt');
    $lineasPeliculas = explode(PHP_EOL, $peliculasContenido);
    // ...

    // Almacena la información de las películas
    $peliculas = [];
    for ($i = 0; $i < count($lineasPeliculas); $i += 4) {
        if (isset($lineasPeliculas[$i + 3])) {
            $pelicula = [
                'titulo' => $lineasPeliculas[$i],
                'categoria' => $lineasPeliculas[$i + 1],
                'descripcion' => $lineasPeliculas[$i + 2],
                'imagen' => $lineasPeliculas[$i + 3],
            ];
            $peliculas[] = $pelicula;
        }
    }

    // Encuentra la información de la película seleccionada
    $peliculaDetalles = null;
    foreach ($peliculas as $pelicula) {
        

        if (strcasecmp(trim($pelicula['titulo']), trim($titulo)) === 0) {
            $peliculaDetalles = $pelicula;
            break;
        }
    }
    function obtenerImagen($peliculas, $titulo) {
        foreach ($peliculas as $pelicula) {
            if (strcasecmp(trim($pelicula['titulo']), trim($titulo)) === 0) {
                return $pelicula['imagen'];
            }
        }
        // Devuelve una imagen predeterminada si no se encuentra la película
        return 'URL de imagen predeterminada';
    }
    // Si se encontró la película, obtén la categoría y busca recomendaciones
    if ($peliculaDetalles) {
        $categoria = $peliculaDetalles['categoria'];

        // Construye el grafo basado en género
        $grafo = [];
        foreach ($peliculas as $p) {
            $genero = $p['categoria'];
            $titulo = $p['titulo'];
            $grafo[$genero][] = $titulo;
        }

        // Función para realizar una búsqueda en anchura (BFS)
        function bfs($grafo, $inicio, $visitados = []) {
            $cola = [$inicio];
            $visitados[] = $inicio;
            $recomendaciones = [];

            while (!empty($cola)) {
                $nodo = array_shift($cola);
                $recomendaciones[] = $nodo;

                if (isset($grafo[$nodo])) {
                    foreach ($grafo[$nodo] as $vecino) {
                        if (!in_array($vecino, $visitados)) {
                            $visitados[] = $vecino;
                            $cola[] = $vecino;
                        }
                    }
                }
            }

            return $recomendaciones;
        }

        // Obtiene las recomendaciones del mismo género
        $recomendacionesCategoria = bfs($grafo, $categoria);

    } else {
        echo "La película no se encontró.";
    }
    ?>
   <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Película</title>
    <link rel="stylesheet" href="detalle.css">
</head>
<body>

    <div class="container">
        <?php if ($peliculaDetalles): ?>
            <div class="pelicula-detalles">
                <p align="right" onclick="location.href='catalogo3.php'"><button>X</button></p>
                <h1><?php echo strtoupper($peliculaDetalles['titulo']); ?></h1>
                <div class="imagen-container">
                    <img src="<?php echo $peliculaDetalles['imagen']; ?>" alt="<?php echo $peliculaDetalles['titulo']; ?>">
                </div>
                <h3>RESUMEN</h3>
                <?php
                echo '<p style="font-weight: bold; font-size: 20px;"> ' . $peliculaDetalles['descripcion'] . '</p>';
                ?>
            </div>

            <h2>TAMBIÉN TE PUEDE GUSTAR:</h2>
            <div class="recomendaciones">
                <?php
                $primerRecomendacion = true;

                foreach ($recomendacionesCategoria as $recomendacion):
                    if ($recomendacion === $peliculaDetalles['titulo']) {
                        continue;
                    }

                    $recomendacionImagen = obtenerImagen($peliculas, $recomendacion);

                    if ($primerRecomendacion) {
                        $primerRecomendacion = false;
                        continue;
                    }
                ?>
                    <div class="recomendacion">
                        <a href='detalle2.php?titulo=<?php echo urlencode($recomendacion); ?>'>
                            <img src="<?php echo $recomendacionImagen; ?>" alt="<?php echo $recomendacion; ?>">
                            <h3><?php echo $recomendacion; ?></h3>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="mensaje">La película no se encontró.</p>
        <?php endif; ?>
    </div>
</body>
</html>
