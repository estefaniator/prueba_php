<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empleado</title>
    <link href="../style/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container">

            <h1 class="mb-3 mt-3">Detalles del Empleado</h1>
            <?php 
            require_once '../controller/controller_employee.php';
            if ($empleado): ?>
                <p>ID: <?= $empleado['id'] ?></p>
                <p>Nombre: <?= $empleado['nombre'] ?></p>
                <p>Apellidos: <?= $empleado['apellidos'] ?></p>
                <p>Genero: <?= $empleado['genero'] ?></p>
                <p>Departamento: <?= $empleado['departamento'] ?></p>
                <p>Cargo: <?= $empleado['cargo'] ?></p>
                <p>Salario: <?= $empleado['salario'] ?></p>
                <p>Fecha contratacion: <?= $empleado['fecha_contratacion'] ?></p>
                <p>Fecha nacimiento: <?= $empleado['fecha_nacimiento'] ?></p>
            <?php else: ?>
                <p>No se encontró ningún empleado con el ID especificado.</p>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Salario</th>
                    <th scope="col">Fecha contratacion</th>
                    <th scope="col">Fecha nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php 
                        require_once '../controller/controller_employee.php';
                        if ($empleado): ?>
                            <th> <?= $empleado['id'] ?></th>
                            <th> <?= $empleado['nombre'] ?></th>
                            <th> <?= $empleado['apellidos'] ?></th>
                            <th> <?= $empleado['genero'] ?></p>
                            <th> <?= $empleado['departamento'] ?></th>
                            <th> <?= $empleado['cargo'] ?></th>
                            <th> <?= $empleado['salario'] ?></th>
                            <th> <?= $empleado['fecha_contratacion'] ?></th>
                            <th> <?= $empleado['fecha_nacimiento'] ?></th>
                        
                        <?php endif; ?>
                  
                    </tr>
                    
                </tbody>
                </table>

                <a href="employees_view.php" class="btn btn-primary mb-3 mt-3" role="button">Voler atrás</a>
        </div>
    <script src="../bootstrap.min.js" ></script>
</body>
</html>