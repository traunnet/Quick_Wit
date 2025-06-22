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
        .btn-reporte {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;     
            color: white;     
            text-align: center;
            text-decoration: none;    
            border-radius: 5px;    
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease; 
        }       
        .btn-reporte:hover {
            background-color: #45a049;
        }

        .btn-reporte:active {
        background-color: #3e8e41; 
        }

        .btn-reporte:focus {
        outline: none; 
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
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Valor</th> 
                <th>Estado</th>
                <th>ID Usuario</th>
                <th>Id Domicilio</th>
                <th>Id Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($pedidos as $pedido): ?>
            <tr>
                <td><?php echo $pedido->idPedido; ?></td> 
                <td><?php echo $pedido->fechaPedido; ?></td> 
                <td><?php echo $pedido->cantidadPedido; ?></td> 
                <td><?php echo $pedido->valorUnitarioPedido; ?></td>
                <td><?php echo $pedido->estadoPedido; ?></td>
                <td><?php echo $pedido->idUsuario; ?></td>
                <td><?php echo $pedido->idDomicilio; ?></td>
                <td><?php echo $pedido->idProducto; ?></td> 
                <td>
                    <a href="?j=Pedido&k=Editar&idPedido=<?php echo $pedido->idPedido; ?>" class="button edit">Editar</a>
                    <a href="?j=Pedido&k=Eliminar&idPedido=<?php echo $pedido->idPedido; ?>" class="button delete" onclick="return confirm('¿Está seguro de eliminar este pedido?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

