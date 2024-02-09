<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link href="../style/css/bootstrap.min.css" rel="stylesheet" >
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container mt-3 mb-3">
        <h2 class="mb-3 mt-3">Listado de Usuarios</h2>

        <a href="add_employee.php" class="btn btn-primary mb-3 mt-3" role="button">Agregar empleado</a>

        <table>
            <thead>
                <tr>
                    <th>Operaciones</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Fecha contratación</th>

                    
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../controller/controller_employee.php';
                foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><a href="detalle_empleado.php?id=<?php echo $empleado["id"]; ?>" class="btn btn-primary">Consultar trabajador</a></td>
                        <td><?php echo $empleado["id"]; ?></td>
                        <td><?php  echo $empleado["nombre"]; ?></td>
                        <td><?php echo $empleado["apellidos"]; ?></td>
                        <td><?php echo $empleado["departamento"]; ?></td>
                        <td><?php  echo $empleado["cargo"]; ?></td>
                        <td><?php echo $empleado["salario"]; ?></td>
                        <td><?php echo $empleado["fecha_contratacion"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="../bootstrap.min.js" ></script>
</body>
</html>
