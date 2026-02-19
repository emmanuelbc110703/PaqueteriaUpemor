<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resgistrar Paquete</title>
</head>
<body>

<h2> Registro de Paquete </h2>
    <hr>

    <form action="index.php?controller=paquete&action=insertarpaquete" method="POST">
        <fieldset>
            <legend>Ingresa datos del paquete</legend>
            <b><label for="codigoseg">Codigo de Seg: </label></b>
            <input type="text" name="codigoseg" required>
            <br><br>

            <b><label for="descripcion">Descripcion: </label></b>
            <input type="text" name="descripcion" required>
            <br><br>

            <b><label for="fechareg">Fecha de registro: </label></b>
            <input type="date" name="fechareg" required>
            <br><br>

            <b><label for="peso">Peso (Kg): </label></b>
            <input type="number" name="peso">
            <br><br>

            <b><label for="region">Region: </label></b>
            <input type="text" name="region">
            <br><br>
            
            <b><label for="direccion">Direccion: </label></b>
            <input type="text" name="direccion">
            <br><br>

            <input type="submit" value="Enviar" name="enviar" onclick="alert('Datos enviados correctamente')">
            <a href="index.php?action=mostrarmenu" class="btn-secundario">Regresar</a>
        </fieldset>
        
    </form>
</body>
</html>