<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Domicilio</title>
</head>
<body>
    <h1 class="page-header">
        <center><?php echo $alm->idDomicilio != null ? $alm->idDomicilio : 'Nuevo Registro'; ?></center>
    </h1>

    <form id="frm-usuario" action="?h=Domicilio&i=Guardar" method="post" class="formEd">
        <input type="hidden" name="idDomicilio" value="<?php echo $alm->idDomicilio; ?>" />
        <input type="hidden" name="idUsuario" value="<?php echo $alm->idUsuario; ?>" /> <!-- Campo oculto para idUsuario -->

        <div class="form-group">
            <label>Hora</label>
            <input type="time" name="horaDomicilio" value="<?php echo $alm->horaDomicilio; ?>" class="form-control" placeholder="Ingrese la hora" required>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="estadoDomicilio" class="form-control" data-validacion-tipo="requerido">
                <option value="Activo" <?php echo $alm->estadoDomicilio == "Activo" ? 'selected' : ''; ?>>Activo</option>
                <option value="Inactivo" <?php echo $alm->estadoDomicilio == "Inactivo" ? 'selected' : ''; ?>>Inactivo</option> <!-- Corregido para Inactivo -->
            </select>
        </div>

        <br><br>
        <div class="text-right">
            <button class="btn btn-success">Guardar</button>
        </div>
    </form>
</body>
</html>
