<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
</head>
<body>
    
<!-- El codigo de seguimiento parece encriptado -->
<!--<h1> Editar Paquete - Codigo de Seguimiento=/*<?php /*echo $paquete['codigoseg'];*/?></h1>-->
<h1> Editar Paquete - Codigo de Seguimiento <?php echo $paquete['id_paquete']; ?></h1>
<hr>

<form action="index.php?controller=paquete&action=actualizarpaquete" method="POST">

<input type="hidden" name="id_paquete" 
value="<?php echo $paquete['id_paquete']; ?>">
    
            <b><label for="codigoseg">Codigo de Seguimiento: </label></b>
            <input type="text" name="codigoseg" value="<?php echo $paquete['codigoseg']; ?>">
            <br><br>

            <b><label for="descripcion">Descripcion: </label></b>
            <input type="text" name="descripcion" value="<?php echo $paquete['descripcion']; ?>">
            <br><br>

            <b><label for="fechareg">Fecha de Registro: </label></b>
            <input type="date" name="fechareg" value="<?php echo $paquete['fechareg']; ?>">
            <br><br>

            <b><label for="peso">Peso en Kg: </label></b>
            <input type="num" name="peso" value="<?php echo $paquete['peso']; ?>">
            <br><br>

            <b><label for="region">Region: </label></b>
            <input type="text" name="region" value="<?php echo $paquete['region']; ?>">
            <br><br>

            <b><label for="direccion">Direccion: </label></b>
            <input type="text" name="direccion" value="<?php echo $paquete['direccion']; ?>">
            <br><br>

            <button type="submit">Actualizar</button>
</form>


</body>
</html>