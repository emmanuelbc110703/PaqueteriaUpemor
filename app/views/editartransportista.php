<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
</head>
<body>
    
<h1> Editar transportista - <?php echo $transportista['nombre'] ?></h1>
<hr>

<form action="index.php?controller=transportista&action=update_transportista" method="POST">

<input type="hidden" name="id" value="<?php echo $id ?>">
    
           <b><label for="nombre">Nombre del Conductor: </label></b>
            <input type="text" name="nombre" value="<?php echo $transportista['nombre'] ?>">
            <br><br>

            <b><label for="edad">Edad: </label></b>
            <input type="num" name="edad" value="<?php echo $transportista['edad'] ?>">
            <br><br>

            <b><label for="telefono">Telefono: </label></b>
            <input type="tel" name="telefono" value="<?php echo $transportista['telefono'] ?>">
            <br><br>

            <b><label for="correo">Correo Electronico: </label></b>
            <input type="email" name="correo" value="<?php echo $transportista['correo'] ?>">
            <br><br>

            <b><label for="matricula">Matricula: </label></b>
            <input type="text" name="matricula" value="<?php echo $transportista['matricula'] ?>">
            <br><br>

            <b><label for="tipolicencia">Tipo de licencia: </label></b>
            <input type="num" name="tipolicencia" value="<?php echo $transportista['tipolicencia'] ?>">
            <br><br>

            <b><label for="ultimafecha">Ultima fecha de salida: </label></b>
            <input type="date" name="ultimafecha" value="<?php echo $transportista['ultimafecha'] ?>">
            <br><br>
            <button name="editar"> Enviar </enviar>

</form>

</body>
</html>