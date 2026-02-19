<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Transporte</title>
    <link rel="stylesheet" href="app/views/CSS/registrartransporte.css">
</head>
<body>

<div class="contenedor-form">

    <h1>Registrar Transporte</h1>

    <form action="index.php?controller=transporte&action=inserttransporte" method="POST">

        <div class="grupo">
            <label>Destino</label>
            <input type="text" name="destino" required>
        </div>

        <div class="grupo">
            <label>Tipo de Transporte</label>
            <input type="text" name="modo" required>
        </div>

        <div class="grupo">
            <label>Seguimiento</label>
            <input type="text" name="seguimiento" required>
        </div>

        <div class="grupo">
            <label>Fecha de Salida</label>
            <input type="date" name="fechasalida" required>
        </div>

        <div class="grupo">
            <label>Placas</label>
            <input type="text" name="placa" required>
        </div>

        <div class="grupo">
            <label>Número de Unidad</label>
            <input type="number" name="numunidad" required>
        </div>

        <div class="botones">
            <input type="submit" value="Registrar" name="enviar" onclick="alert('Datos enviados correctamente') class="btn">
             <a href="index.php?action=mostrarmenu" class="btn-secundario">Regresar</a>
        </div>

    </form>

</div>

</body>
</html>
