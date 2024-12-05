<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("1366_2000.jpg");
            backdrop-filter: blur(10px);
            display: flex;
            height: 100vh;
        }
        header {
            background-color: #111;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #b10058;
            padding: 10px 0; /* Ajuste aquí para reducir el padding superior e inferior */
            display: flex;
            justify-content: space-around; /* Alinea los elementos a lo largo del ancho de la barra de navegación */
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            margin: 0; /* Añade este estilo para eliminar márgenes */
            box-sizing: border-box; /* Añade este estilo para incluir padding y border en el ancho total */
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-weight: bold; /* Agrega negrita */
            text-transform: uppercase; /* Convierte a mayúsculas */
        }

        nav a:hover {
            color: #F48FB1; /* Cambia el color al pasar el mouse */
            border-bottom: 2px solid #F48FB1; /* Agrega un borde inferior al pasar el mouse */
            padding-bottom: 8px; /* Ajusta el espacio entre el texto y el borde inferior */
            transition: color 0.3s, border-bottom 0.3s; /* Agrega transiciones suaves */
        }

        #text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }
    </style>
</head>
<body>
    <div id="container">
        <nav>
            <a href="login.php">Iniciar Sesión</a>
        </nav>
        <div id="text-overlay">
            <h1>PARA VER LAS PELÍCULAS DEBES INICIAR SESIÓN</h1>
        </div>
    </div>
</body>
</html>