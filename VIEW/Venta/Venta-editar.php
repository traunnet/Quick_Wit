<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Venta</title>
</head>
<body>
    <h1 class="page-header">
    <center><?php echo $alm->idVenta != null ? $alm->idVenta : 'Nuevo Registro'; ?></center>
    </h1>

    <form action="?a=Venta&b=Guardar" method="post" class="formEd">
        <input type="hidden" name="idVenta" value="<?php echo $alm->idVenta; ?>" />
        <input type="hidden" name="idProducto" value="<?php echo $alm->idProducto; ?>" /> <!-- Campo oculto para idProducto -->

        <div class="form-group">
            <label>CATEGORÍA</label>
            <input type="text" name="categoria" value="<?php echo $alm->categoria; ?>" class="form-control" placeholder="Ingrese la categoría" required>
        </div>

        <div class="form-group">
            <label>NOMBRE DEL PRODUCTO</label>
            <input type="text" name="nombreProducto" value="<?php echo $alm->nombreProducto; ?>" class="form-control" placeholder="Ingrese el nombre del producto" required>
        </div>

        <div class="form-group">
            <label>VALOR UNITARIO</label>
            <input type="number" name="valorUnitario" value="<?php echo $alm->valorUnitario; ?>" class="form-control" placeholder="Ingrese el valor unitario" required>
        </div>

        <div class="form-group">
            <label>CANTIDAD</label>
            <input type="number" name="cantidad" value="<?php echo $alm->cantidad; ?>" class="form-control" placeholder="Ingrese la cantidad" required>
        </div>

        <div class="form-group">
            <label>VALOR TOTAL</label>
            <input type="number" name="valorTotal" value="<?php echo $alm->valorTotal; ?>" class="form-control" placeholder="Ingrese el valor total" required>
        </div>

        <div class="form-group">
            <label>ESTADO PRODUCTO</label>
            <select name="estadoProducto" class="form-control" data-validacion-tipo="requerido">
                <option value="Usado" <?php echo $alm->estadoProducto == "Usado" ? 'selected' : ''; ?>>Usado</option>
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
