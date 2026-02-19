<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
</head>
<body>
    
<h1> Editar Transporte - <?php echo $placa['placa'] ?></h1>
<hr>

<form action="index.php?action=update" method="POST">

<input type="hidden" name="id" value="<?php echo $id ?>">
    
           <b><label for="destino">Destino: </label></b>
            <input type="text" name="destino">
            <br><br>

            <b><label for="modo">Tipo de transporte: </label></b>
            <input type="text" name="modo">
            <br><br>

            <b><label for="seguimiento">Seguimiento: </label></b>
            <input type="text" name="seguimiento">
            <br><br>

            <b><label for="fechasalida">Fecha de Registro: </label></b>
            <input type="date" name="fechasalida">
            <br><br>

            <b><label for="placa">Placas: </label></b>
            <input type="text" name="placa">
            <br><br>

            <b><label for="numunidad">Numero de Unidad: </label></b>
            <input type="num" name="numunidad">
            <br><br>

            <button name="editar"> Enviar </enviar>

</form>

</body>
</html>