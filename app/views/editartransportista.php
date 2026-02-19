<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
</head>
<body>
    
<h1> Editar transportista - <?php echo $nombre['nombre'] ?></h1>
<hr>

<form action="index.php?action=update" method="POST">

<input type="hidden" name="id" value="<?php echo $id ?>">
    
           <b><label for="nombre">Nombre del Conductor: </label></b>
            <input type="text" name="nombre">
            <br><br>

            <b><label for="edad">Edad: </label></b>
            <input type="num" name="edad">
            <br><br>

            <b><label for="telefono">Telefono: </label></b>
            <input type="tel" name="telefono">
            <br><br>

            <b><label for="correo">Correo Electronico: </label></b>
            <input type="email" name="correo">
            <br><br>

            <b><label for="matricula">Matricula: </label></b>
            <input type="text" name="matricula">
            <br><br>

            <b><label for="tipolicencia">Tipo de licencia: </label></b>
            <input type="num" name="tipolicencia">
            <br><br>

            <b><label for="ultimafecha">Ultima fecha de salida: </label></b>
            <input type="date" name="ultimafecha">
            <br><br>
            <button name="editar"> Enviar </enviar>

</form>

</body>
</html>