<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Transportista</title>
    <link rel="stylesheet" href="app/views/CSS/registrartransportista.css">
</head>
<body>

<div class="contenedor-form">

    <h1>Registrar Transportista</h1>

    <form action="index.php?controller=transportista&action=inserttransportista" method="POST">

        <div class="grupo">
            <label>Nombre del Conductor</label>
            <input type="text" name="nombre" required>
        </div>

        <div class="grupo">
            <label>Edad</label>
            <input type="number" name="edad" required>
        </div>

        <div class="grupo">
            <label>Teléfono</label>
            <input type="tel" name="telefono" required>
        </div>

        <div class="grupo">
            <label>Correo Electrónico</label>
            <input type="email" name="correo" required>
        </div>

        <div class="grupo">
            <label>Matrícula</label>
            <input type="text" name="matricula" required>
        </div>

        <div class="grupo">
            <label>Tipo de Licencia</label>
            <input type="text" name="tipolicencia" required>
        </div>

        <div class="grupo">
            <label>Última Fecha de Salida</label>
            <input type="date" name="ultimafecha" required>
        </div>

        <div class="botones">
            <input type="submit" value="Registrar" name="enviar" onclick="alert('Datos enviados correctamente') class="btn">
             <a href="index.php?action=mostrarmenu" class="btn-secundario">Regresar</a>
        </div>

    </form>

</div>

</body>
</html>
