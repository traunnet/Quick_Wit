<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        thead {
            background-color: #dc7633;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a.button {
            text-decoration: none;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            margin-right: 4px;
        }

        a.button.edit {
            background-color: #28a745;
        }

        a.button.delete {
            background-color: #dc3545;
        }

        a.button.delete:hover {
            background-color: #c82333;
        }

        a.button.edit:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<main>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Valor U</th> 
                <th>Cantidad</th>
                <th>Total</th>
                <th>Estado</th> 
                <th>Id Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($ventas as $venta): ?>
            <tr>
                <td><?php echo $venta->idVenta; ?></td> 
                <td><?php echo $venta->categoria; ?></td> 
                <td><?php echo $venta->nombreProducto; ?></td> 
                <td><?php echo $venta->valorUnitario; ?></td>
                <td><?php echo $venta->cantidad; ?></td>
                <td><?php echo $venta->valorTotal; ?></td>
                <td><?php echo $venta->estadoProducto; ?></td>
                <td><?php echo $venta->idProducto; ?></td>
                <td>
                    <a href="?a=Venta&b=Editar&idVenta=<?php echo $venta->idVenta; ?>" class="button edit">Editar</a>
                    <a href="?a=Venta&b=Eliminar&idVenta=<?php echo $venta->idVenta; ?>" class="button delete" onclick="return confirm('¿Está seguro de eliminar esta venta?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

