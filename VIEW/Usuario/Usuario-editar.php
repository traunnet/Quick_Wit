<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h1 class="page-header">
        <center><?php echo $alm->idUsuario != null ? $alm->idUsuario : 'Nuevo Registro'; ?></center>
    </h1>

    <form action="?u=Usuario&f=Guardar" method="post" class="formEd">
        <input type="hidden" name="idUsuario" value="<?php echo $alm->idUsuario; ?>" />

        <div class="form-group">
            <label>TIPO DOCUMENTO</label>
            <input type="text" name="tipoDocUsuario" value="<?php echo $alm->tipoDocUsuario; ?>" class="form-control" placeholder="Ingrese Tipo Documento">
        </div>

        <div class="form-group">
            <label>NUMERO DOCUMENTO</label>
            <input type="text" name="numDocUsuario" value="<?php echo $alm->numDocUsuario; ?>" class="form-control" placeholder="Ingrese Numero Documento ">
        </div>

        <div class="form-group">
            <label>NOMBRE</label>
            <input type="text" name="nombreUsuario" value="<?php echo $alm->nombreUsuario; ?>" class="form-control" placeholder="Ingrese nombre Usuario">
        </div>

        <div class="form-group">
            <label>APELLIDO/S</label>
            <input type="text" name="apellidosUsuario" value="<?php echo $alm->apellidosUsuario; ?>" class="form-control" placeholder="Ingrese Apellido/s">
        </div>

        <div class="form-group">
            <label>DIRECCION</label>
            <input type="text" name="direccionUsuario" value="<?php echo $alm->direccionUsuario; ?>" class="form-control" placeholder="Ingrese la Direccion">
        </div>

        <div class="form-group">
            <label>TELEFONO</label>
            <input type="text" name="telefonoUsuario" value="<?php echo $alm->telefonoUsuario; ?>" class="form-control" placeholder="Ingrese Numero Telefonico">
        </div>

        <div class="form-group">
            <label>CORREO</label>
            <input type="text" name="correoUsuario" value="<?php echo $alm->correoUsuario; ?>" class="form-control" placeholder="Ingrese Correo">
        </div>

        <div class="form-group">
            <label>CONTRASEÑA</label>
            <input type="text" name="claveUsuario" value="<?php echo $alm->claveUsuario; ?>" class="form-control" placeholder="Ingrese la Contraseña">
        </div>

        <div class="form-group">
            <label>ESTADO</label>
            <select name="estadoUsuario" class="form-control" data-validacion-tipo="requerido">
                <option value="Activo" <?php echo $alm->estadoUsuario == "Activo"? 'selected' : ''; ?>>Activo</option>
                <option value="Inactivo" <?php echo $alm->estadoUsuario == "Inactivo" ? 'selected' : ''; ?>>Inactivo</option>
            </select>
        </div>

        <div class="form-group">
            <label>TIPO USUARIO</label>
            <select name="idRol" class="form-control" data-validacion-tipo="requerido">
                <option value="1" <?php echo $alm->idRol == 1 ? 'selected' : ''; ?>>Administrador</option>
                <option value="2" <?php echo $alm->idRol == 2 ? 'selected' : ''; ?>>Cliente</option>
            </select>
        </div>

        <br><br>
        <div class="text-right">
            <button class="btn btn-success">Guardar</button>
        </div>
    </form>
</body>
</html>
