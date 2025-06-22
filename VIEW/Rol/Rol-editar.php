<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Rol</title>
</head>
<body>
    <h1 class="page-header">
        <center><?php echo $alm->idRol != null ? $alm->descripcionRol : 'Nuevo Registro'; ?></center>
    </h1>

    <form action="?c=Rol&d=Guardar" method="post" class="formEd">
        <input type="hidden" name="idRol" value="<?php echo $alm->idRol; ?>" />

        <div class="form-group">
            <label>DESCRIPCIÓN</label>
            <input type="text" name="descripcionRol" value="<?php echo $alm->descripcionRol; ?>" class="form-control">
        </div>

        <br><br>
        <div class="text-right">
            <button class="btn btn-success">Guardar</button>
        </div>
</body>
</html>
