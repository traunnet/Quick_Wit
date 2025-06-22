<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h1 class="page-header">
        <center><?php echo $alm->idProducto != null ? $alm->idProducto : 'Nuevo Producto'; ?></center>
    </h1>

    <form action="?z=Producto&x=Guardar" method="post" class="formEd">
        <input type="hidden" name="idProducto" value="<?php echo $alm->idProducto; ?>" />

        <div class="form-group">
            <label>CATEGORÍA</label>
            <input type="text" name="categoria" value="<?php echo $alm->categoria; ?>" class="form-control" placeholder="Ingrese la categoría del producto">
        </div>

        <div class="form-group">
            <label>NOMBRE PRODUCTO</label>
            <input type="text" name="nombreProducto" value="<?php echo $alm->nombreProducto; ?>" class="form-control" placeholder="Ingrese el nombre del producto">
        </div>

        <div class="form-group">
            <label>DESCRIPCIÓN</label>
            <input type="text" name="descripcionProducto" value="<?php echo $alm->descripcionProducto; ?>" class="form-control" placeholder="Ingrese la descripción del producto">
        </div>

        <div class="form-group">
            <label>IMAGEN</label>
            <input type="text" name="ImgProducto" value="<?php echo $alm->ImgProducto; ?>" class="form-control" placeholder="Ingrese la URL o ruta de la imagen del producto">
        </div>

        <div class="form-group">
            <label>VALOR UNITARIO</label>
            <input type="text" name="valorUnitarioProducto" value="<?php echo $alm->valorUnitarioProducto; ?>" class="form-control" placeholder="Ingrese el valor unitario del producto">
        </div>

        <div class="form-group">
            <label>ESTADO</label>
            <select name="estadoProducto" class="form-control" data-validacion-tipo="requerido">
                <option value="Nuevo" <?php echo $alm->estadoProducto == "Nuevo" ? 'selected' : ''; ?>>Nuevo</option>
                <option value="Renovado" <?php echo $alm->estadoProducto == "Renovado" ? 'selected' : ''; ?>>Renovado</option>            </select>
        </div>

        <br><br>
        <div class="text-right">
            <button class="btn btn-success">Guardar</button>
        </div>
    </form>
</body>
</html>
