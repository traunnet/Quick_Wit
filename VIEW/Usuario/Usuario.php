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

        footer {
            background-color: #dc7633;
            color: white;
            text-align: center;
            padding: 10px 0;
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
                <th>ID</th>
                <th>Tp DC</th>
                <th>NO. DC</th>
                <th>Nombre</th>
                <th>Apellido/s</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Clave</th>
                <th>Estado</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario->idUsuario; ?></td> 
                <td><?php echo $usuario->tipoDocUsuario; ?></td>
                <td><?php echo $usuario->numDocUsuario; ?></td> 
                <td><?php echo $usuario->nombreUsuario; ?></td> 
                <td><?php echo $usuario->apellidosUsuario; ?></td>
                <td><?php echo $usuario->direccionUsuario; ?></td>
                <td><?php echo $usuario->telefonoUsuario; ?></td> 
                <td><?php echo $usuario->correoUsuario; ?></td>
                <td><?php echo $usuario->claveUsuario; ?></td> 
                <td><?php echo $usuario->estadoUsuario; ?></td> 
                <td><?php echo $usuario->idRol; ?></td>
                <td>
                    <a href="?u=Usuario&f=Editar&idUsuario=<?php echo $usuario->idUsuario; ?>" class="button edit">Editar</a>
                    <a href="?u=Usuario&f=Eliminar&idUsuario=<?php echo $usuario->idUsuario; ?>" class="button delete" onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

