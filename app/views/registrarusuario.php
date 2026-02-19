<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resgistrar Usuario</title>
</head>
<body>

<h2> Registro de Paquete </h2>
    <hr>

    <form action="index.php?controller=usuario&action=insert" method="POST">
        <fieldset>
            <legend>Ingresa datos del paquete</legend>
            <b><label for="nombre">Nombre: </label></b>
            <input type="text" name="nombre" required>
            <br><br>

            <b><label for="edad">Descripcion: </label></b>
            <input type="int" name="edad" required>
            <br><br>

            <b><label for="contrasena">Contraseña: </label></b>
            <input type="text" name="contrasena" required>
            <br><br>

            <b><label for="rol">Rol: </label></b>
            <input type="text" name="rol">
            <br><br>

            <input type="submit" value="Enviar" name="enviar" onclick="alert('Datos enviados correctamente')">
        
        </fieldset>
        
    </form>
</body>
</html>