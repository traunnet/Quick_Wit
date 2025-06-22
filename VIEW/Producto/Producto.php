<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
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
            margin: 10px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        th, td {
            padding: 10px 12px;
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
                <th>ID Producto</th>
                <th>Categoría</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Valor Unitario</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($productos as $producto): ?>
            <tr>
                <td><?php echo $producto->idProducto; ?></td> 
                <td><?php echo $producto->categoria; ?></td> 
                <td><?php echo $producto->nombreProducto; ?></td> 
                <td><?php echo $producto->descripcionProducto; ?></td>
                <td><?php echo $producto->valorUnitarioProducto; ?></td>
                <td><?php echo $producto->estadoProducto; ?></td> 
                <td>
                    <a href="?z=Producto&x=Editar&idProducto=<?php echo $producto->idProducto; ?>" class="button edit">Editar</a>
                    <a href="?z=Producto&x=Eliminar&idProducto=<?php echo $producto->idProducto; ?>" class="button delete" onclick="return confirm('¿Está seguro de eliminar este producto?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
</html>
