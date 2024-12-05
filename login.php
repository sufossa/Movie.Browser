<?php
// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica las credenciales (usuario y contraseña)
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Credenciales establecidas
    $credenciales = array(
        'Alonso@gmail.com' => 'Alonso01',
        'Maria@gmail.com' => 'Maria01',
        'Felipe@gmail.com' => 'Felipe01'
    );

    // Verifica si las credenciales son correctas
    if (isset($credenciales[$correo]) && $credenciales[$correo] === $contrasena) {
        // Inicio de sesión exitoso
        session_start();
        $_SESSION['correo'] = $correo;
        header('Location: usuarios.php'); // Redirecciona a la página principal
        exit();
    } else {
        $mensajeError = 'Correo o contraseña incorrectos, intente nuevamente.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("1366_2000.jpg");
            backdrop-filter: blur(10px);
            /* background: linear-gradient(to bottom right, #ff69b4, #ffe1ff); Degradado rosa Barbie */
            color: #333; /* Texto oscuro */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #container {
            max-width: 400px;
            width: 100%;
            background-color: #fff; /* Fondo blanco */
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #ff1493; /* Rosa Barbie */
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333; /* Texto oscuro */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #f9f9f9; /* Fondo gris claro */
            border: 1px solid #ff69b4; /* Borde rosa Barbie */
            color: #333; /* Texto oscuro */
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #ff69b4; /* Rosa Barbie */
            color: #fff; /* Texto blanco */
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #ff1493; /* Rosa más oscuro al pasar el ratón */
        }

        p {
            color: #333; /* Texto oscuro */
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="container">
        <h2>Iniciar Sesión</h2>
        <?php
        if (isset($mensajeError)) {
            echo "<p>$mensajeError</p>";
            
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="usuario">Correo:</label>
            <input type="text" name="correo" id="correo" required>
            
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
