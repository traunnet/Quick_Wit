<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Domicilios</title>
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
                <th>Hora</th>
                <th>Estado</th>
                <th>ID Usuario</th>
                <th>Acciones</th> 
            </tr>
        </thead>

        <tbody>
        <?php foreach($domicilios as $domicilio): ?>
            <tr>
                <td><?php echo $domicilio->idDomicilio ?></td> 
                <td><?php echo $domicilio->horaDomicilio; ?></td> 
                <td><?php echo $domicilio->estadoDomicilio; ?></td> 
                <td><?php echo $domicilio->idUsuario; ?></td>
                <td>
                    <a href="?h=Domicilio&i=Editar&idDomicilio=<?php echo $domicilio->idDomicilio; ?>" class="button edit">Editar</a>
                    <a href="?h=Domicilio&i=Eliminar&idDomicilio=<?php echo $domicilio->idDomicilio; ?>" class="button delete" onclick="return confirm('¿Está seguro de eliminar este domicilio?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

