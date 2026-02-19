<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    

<h1>Consultar Transportista</h1>
<hr>
<table border="1">

        <thead>
            <th> ID </th>
            <th> Conductor</th>
            <th> Edad</th>
            <th> telefono </th>
            <th> Correo </th>
            <th> Matricula</th>
            <th> Tipo de licencia </th>
            <th> Ultima Salida </th>
        </thead>

        <tbody>
<?php if(isset($usuarios) && $usuarios->num_rows > 0): ?>
    
    <?php while($row = $usuarios->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id_conductor']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['matricula']; ?></td>
            <td><?php echo $row['tipolicencia']; ?></td>
            <td><?php echo $row['ultimafecha']; ?></td>
            <td>
                <a href="index.php?controller=transportista&action=editar_transportista&id=<?php echo $row['id_conductor']; ?>">
                    <button>Editar</button>
                </a>
                <a href="index.php?controller=transportista&action=eliminar_transportista&id=<?php echo $row['id_conductor']; ?>">
                    <button>Eliminar</button>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>

<?php else: ?>
    <tr>
        <td colspan="9">No hay registros</td>
    </tr>
<?php endif; ?>
</tbody>


    </table>
<a href="insertar.php?">
                    <button>insertar</button>
                    </a>
                     <a href="index.php?action=mostrarmenu" class="btn-secundario">Regresar</a>

</body>
</html>