<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Paquetes</title>
    <link rel="stylesheet" href="app/views/CSS/consultarpaquete.css">
</head>
<body>

<div class="contenedor-tabla">

    <h1>Consulta de Paquetes</h1>

    <div class="boton-superior">
        <a href="index.php?action=registrarPaquete" class="btn-agregar">
            + Registrar Nuevo
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Peso</th>
                <th>Región</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php if($usuarios && $usuarios->num_rows > 0): ?>
                <?php while($row = $usuarios->fetch_assoc()): ?>
                    <tr> 
                        <td><?= $row['id_paquete']; ?></td>
                        <td><?= $row['codigoseg']; ?></td>
                        <td><?= $row['descripcion']; ?></td>
                        <td><?= $row['fechareg']; ?></td>
                        <td><?= $row['peso']; ?></td>
                        <td><?= $row['region']; ?></td>
                        <td><?= $row['direccion']; ?></td>
                        <td class="acciones">
                            <a href="index.php?controller=paquete&action=editarPaquete&id=<?= $row['id_paquete']; ?>" class="btn-editar">Editar</a>
                            <a href="index.php?controller=paquete&action=eliminarPaquete&id=<?= $row['id_paquete']; ?>" class="btn-eliminar">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No hay registros</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
                <a href="index.php?action=mostrarmenu" class="btn-secundario">Regresar</a>
</div>

</body>
</html>