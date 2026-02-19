<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Transporte</title>
    <link rel="stylesheet" href="app/views/CSS/consultartransporte.css">
</head>
<body>

<div class="contenedor-tabla">

    <h1>Consulta de Transporte</h1>

    <div class="boton-superior">
        <a href="index.php?action=registrarTransporte" class="btn-agregar">
            + Registrar Transporte
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Destino</th>
                <th>Tipo</th>
                <th>Seguimiento</th>
                <th>Fecha Salida</th>
                <th>Placa</th>
                <th>Unidad</th>
                <th>Acciones</th>
            </tr>
        </thead>

       <tbody>
    <?php if($usuarios && $usuarios->num_rows > 0): ?>
        <?php while($row = $usuarios->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_tran']; ?></td>
                <td><?= $row['destino']; ?></td>
                <td><?= $row['modo']; ?></td>
                <td><?= $row['seguimiento']; ?></td>
                <td><?= $row['fechasalida']; ?></td>
                <td><?= $row['placa']; ?></td>
                <td><?= $row['numunidad']; ?></td>
                <td class="acciones">
                    <a href="index.php?controller=transporte&action=editar_transporte&id=<?= $row['id_tran']; ?>" class="btn-editar">
                        Editar
                    </a>
                    <a href="index.php?controller=transporte&action=eliminar_transporte&id=<?= $row['id_tran']; ?>" class="btn-eliminar">
                        Eliminar
                    </a>
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
