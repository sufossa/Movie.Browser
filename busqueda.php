<?php
// Este bloque se encarga de manejar las operaciones en el lado del servidor

class PerfilNode {
    public $nombre;
    public $imagen_url;
    public $categoria_destacada;
    public $fecha_creacion;
    public $izquierda;
    public $derecha;

    public function __construct($nombre, $imagen_url, $categoria_destacada, $fecha_creacion) {
        $this->nombre = $nombre;
        $this->imagen_url = $imagen_url;
        $this->categoria_destacada = $categoria_destacada;
        $this->fecha_creacion = $fecha_creacion;
        $this->izquierda = null;
        $this->derecha = null;
    }
}

class ArbolPerfiles {
    public $raiz;

    public function __construct() {
        $this->raiz = null;
    }

    public function insertarPerfil($nombre, $imagen_url, $categoria_destacada, $fecha_creacion) {
        $this->raiz = $this->_insertar($this->raiz, $nombre, $imagen_url, $categoria_destacada, $fecha_creacion);
    }

    private function _insertar($nodo, $nombre, $imagen_url, $categoria_destacada, $fecha_creacion) {
        if ($nodo === null) {
            return new PerfilNode($nombre, $imagen_url, $categoria_destacada, $fecha_creacion);
        }

        if (strcasecmp($nombre, $nodo->nombre) < 0) {
            $nodo->izquierda = $this->_insertar($nodo->izquierda, $nombre, $imagen_url, $categoria_destacada, $fecha_creacion);
        } elseif (strcasecmp($nombre, $nodo->nombre) > 0) {
            $nodo->derecha = $this->_insertar($nodo->derecha, $nombre, $imagen_url, $categoria_destacada, $fecha_creacion);
        }

        return $nodo;
    }
}

// Leer el archivo de perfiles
$lineas = file('perfiles.txt');
$arbolPerfiles = new ArbolPerfiles();

foreach ($lineas as $linea) {
    $datos = explode(',', $linea);
    $nombre = trim($datos[0]);
    $imagen_url = trim($datos[1]);
    $categoria_destacada = trim($datos[2]);
    $fecha_creacion = trim($datos[3]);
    $arbolPerfiles->insertarPerfil($nombre, $imagen_url, $categoria_destacada, $fecha_creacion);
}

// Manejar la búsqueda de perfiles

function buscarPerfilPorNombre($nodo, $nombre) {
    if ($nodo === null || strcasecmp($nodo->nombre, $nombre) === 0) {
        return $nodo;
    }

    if (strcasecmp($nombre, $nodo->nombre) < 0) {
        return buscarPerfilPorNombre($nodo->izquierda, $nombre);
    }

    return buscarPerfilPorNombre($nodo->derecha,$nombre);
}

$perfilEncontrado = null;
$errorMensaje = '';

if (isset($_GET['nombre'])) {
    $nombre_buscar = $_GET['nombre'];
    $perfilEncontrado = buscarPerfilPorNombre($arbolPerfiles->raiz, $nombre_buscar);

    if (!$perfilEncontrado) {
        $errorMensaje = 'Perfil no encontrado, Intente con otro perfil!!';
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Perfil</title>
    <link rel="stylesheet" href="busqueda.css">
</head>
<body>
    <header>
        <p align="left" onclick="location.href='usuarios.php'"><button class="out-bu">Regresar</button></p>
        <br>
        <h1>Búsqueda de Perfil</h1> 
    </header>

    <div id="container">
        <form class="search-form" method="get" action="">
            <input type="text" name="nombre" placeholder="Nombre del Perfil">
            <button type="submit">Buscar</button>
        </form>

        <?php if ($perfilEncontrado): ?>
            <div class="profile-result">
                <div class="profile" onclick="mostrarDetalle()">
                    <img src="<?php echo $perfilEncontrado->imagen_url; ?>" alt="Perfil <?php echo $perfilEncontrado->nombre; ?>">
                    <h3><?php echo $perfilEncontrado->nombre; ?></h3>
                </div>
                <div id="detalle" class="detalle">
                    <p><strong>Categoría Destacada: <?php echo $perfilEncontrado->categoria_destacada; ?></strong></p>
                    <p><strong>Fecha de Creación: <?php echo $perfilEncontrado->fecha_creacion; ?></strong></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($errorMensaje): ?>
            <p><strong><h3 style="color: #E74C3C;"><?php echo $errorMensaje; ?></h3></strong></p>
        <?php endif; ?>
    </div>

    <script>
        function mostrarDetalle() {
            var detalle = document.getElementById('detalle');
            detalle.style.display = detalle.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>