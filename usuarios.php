
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Perfil</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            padding: 0;
            background: linear-gradient(to left, #ff69b4, #F48FB1,#ffe1ff); 
            color: #fff; 
        }

        header {
            text-align: center;
        }

        h1 {
            margin: 90px 0 10px;
            font-size: 32px;
            color:#C2185B;
        }

        #container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        .profiles {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .profile {
            width: 200px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            cursor: pointer;
            background-color: #AD1457;
        }

        .profile:hover {
            transform: scale(1.05);
        }

        img {
            width: 100%;
            height: auto;
        }

        h3 {
            margin: 10px;
            font-size: 18px;
        }
        button{
            border-radius:15px;
            text-decoration: Helvetica;
            color:#880E4F;
            background: #F06292;
            border: 3px solid #C2185B;
        }
    </style>
</head>
<body>
    <p align="right" onclick="location.href='close.php'"><button class="out-bu"><h3 style="color: #880E4F;">Cerrar Sesión</h3></button></p>
    <header>
        <h1><strong>¿Quién eres?</strong></h1> 
    </header>

    <div id="container">
        <div class="profiles">
            <div class="profile" onclick="window.location='catalogo1.php'">
                <img src="https://i.pinimg.com/736x/06/d4/cd/06d4cd616a5827cbced2f1778dd7941d.jpg" alt="Perfil 1">
                <h3>María</h3>
            </div>

            <div class="profile" onclick="window.location='catalogo2.php'">
                <img src="https://www.primerahora.com/resizer/m4L1mbmA5N21takDSA1wtNO8WNE=/2560x0/smart/filters:quality(75):format(jpeg)/arc-anglerfish-arc2-prod-gfrmedia.s3.amazonaws.com/public/XCYWVEDDP5FCDANN2ZXESI3KAM.jpg" alt="Perfil 2">
                <h3>Alonso</h3>
            </div>

            <div class="profile" onclick="window.location='catalogo3.php';">
                <img src="https://pm1.aminoapps.com/7472/9fd8af1ad958439d8beaec958463cce07fba78f3r1-735-736v2_hq.jpg" alt="Perfil 3">
                <h3>Felipe</h3>
            </div>
        </div>
    </div>
    <p align="center" onclick="location.href='busqueda.php'"><button><h3 style="color: #880E4F;">Administrar perfiles</h3></button></p>
</body>
</html>
