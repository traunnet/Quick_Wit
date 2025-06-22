<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Pedido</title>
</head>
<body>
    <h1 class="page-header">
        <center><?php echo $alm->idPedido != null ? $alm->idPedido : 'Nuevo Registro'; ?></center>
    </h1>

    <form action="?j=Pedido&k=Guardar" method="post" class="formEd">
        <input type="hidden" name="idPedido" value="<?php echo $alm->idPedido; ?>" />
        <input type="hidden" name="idUsuario" value="<?php echo $alm->idUsuario; ?>" /> <!-- Campo oculto para idUsuario -->
        <input type="hidden" name="idDomicilio" value="<?php echo $alm->idDomicilio; ?>" /> <!-- Campo oculto para idDomicilio -->
        <input type="hidden" name="idProducto" value="<?php echo $alm->idProducto; ?>" /> <!-- Campo oculto para idProducto -->

        <div class="form-group">
            <label>FECHA</label>
            <input type="datetime" name="fechaPedido" value="<?php echo $alm->fechaPedido; ?>" class="form-control" placeholder="Ingrese la fecha">
        </div>

        <div class="form-group">
            <label>CANTIDAD</label>
            <input type="number" name="cantidadPedido" value="<?php echo $alm->cantidadPedido; ?>" class="form-control" placeholder="Ingrese la cantidad">
        </div>

        <div class="form-group">
            <label>VALOR UNITARIO</label>
            <input type="number" name="valorUnitarioPedido" value="<?php echo $alm->valorUnitarioPedido; ?>" class="form-control" placeholder="Ingrese el valor unitario">
        </div>

        <div class="form-group">
            <label>ESTADO</label>
            <select name="estadoPedido" class="form-control">
                <option value="Enproceso" <?php echo $alm->estadoPedido == "Enproceso" ? 'selected' : ''; ?>>Enproceso</option>
                <option value="Entregado" <?php echo $alm->estadoPedido == "Entregado" ? 'selected' : ''; ?>>Entregado</option>
                <option value="Reenviado" <?php echo $alm->estadoPedido == "Reenviado" ? 'selected' : ''; ?>>Reenviado</option>
            </select>
        </div>

        <br><br>
        <div class="text-right">
            <button class="btn btn-success">Guardar</button>
        </div>
    </form>
</body>
</html>
