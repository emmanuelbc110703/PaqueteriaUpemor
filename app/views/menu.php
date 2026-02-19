<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección Registro - Lobos Rojos</title>

    <!-- Enlace al archivo CSS -->
   <link rel="stylesheet" href="app/views/CSS/menu.css">
</head>
<body>

    <div class="contenedor">

        <header>
            <h1>Paquetería Upemor</h1>
        </header>

        <!-- Sección Registrar -->
        <section class="menu-seccion">
            <h3>Registrar Información</h3>

            <div class="botones">
                <a href="index.php?action=registrarPaquete"><button class="btn">Registrar Paquete</button></a>
                <a href="index.php?action=registrarTransporte"><button class="btn">Registrar Transporte</button></a>
                <a href="index.php?action=registrarTransportista"><button class="btn">Registrar Transportista</button></a>
            </div>
        </section>

        <!-- Sección Visualizar -->
        <section class="menu-seccion">
            <h3>Consultar Registros</h3>

            <div class="botones">
                <a href="index.php?action=consultarPaquete"><button class="btn">Registros de Paquetes</button></a>
                <a href="index.php?controller=transporte&action=consultarTransporte"><button class="btn">Registros de Transportes</button></a>
                <a href="index.php?controller=transportista&action=consultarTransportista"><button class="btn">Registros de Transportistas</button></a>
            </div>
        </section>

        <!-- Generar Reportes y Respaldos -->
        <section class="menu-seccion">
            <h3>Generar Reportes y Respaldos</h3>

            <div class="botones">
                <a href="index.php?action=consultarPaquete"><button class="btn">Paquetes</button></a>
                <a href="index.php?action=consultarTransporte"><button class="btn">Transportes</button></a>
                <a href="index.php?action=consultarTransportista"><button class="btn">Transportistas</button></a>
            </div>
        </section>

        <!-- Sección Usuario -->
        <section class="menu-seccion">
            <h3>Registrar Usuarios</h3>

            <div class="botones">
                <a href="index.php?action=registrarUsuario"><button class="btn">Registrar</button></a>
            </div>
        </section>

    </div>

</body>
</html>
