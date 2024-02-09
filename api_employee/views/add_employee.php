<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Agregar Empleado</title>
    <link href="../style/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class='container mt-3 mb-3'>
        <h1 class="mb-3 mt-3">Formulario de Agregar Empleado</h1>
        <form action="../controller/controller_add_employee.php" method="post">

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="id">Id empleado:</label>
                    <input type="text" class="form-control" id="id" name="id" required><br>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text"  class="form-control" id="nombre" name="nombre" required><br>
                </div>
            </div>
        </div>
            
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text"  class="form-control"  id="apellidos" name="apellidos" required><br>
                </div>
            </div>
            
            <div class="col-6">
                <div class="form-group">
                    <label for="genero">Género:</label>
                    <select class="form-select"  id="genero" name="genero">
                        <option value="M">M</option>
                        <option value="F">F</option>   
                    </select><br>
                </div>
            </div>
        </div>
            
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control"  id="fecha_nacimiento" name="fecha_nacimiento" required><br>
                </div>
            </div>
            
            <div class="col-6">
                <div class="form-group">
                    <label for="num_departamento">Número de Departamento:</label>
                    <select class="form-select"  id="num_departamento" name="num_departamento">
                    <option >Seleccionar valor</option>
                        <?php   require_once '../controller/controller_employee.php';
                        foreach ($detps as $dept): ?>
                        <option value="<?php echo $dept['dept_no']; ?>" required><?php echo $dept['dept_no']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                    <div class="form-group">
                        <label for="cargo">Cargo:</label>
                        <select class="form-select" id="cargo" name="cargo">
                        <option >Seleccionar valor</option>
                            <?php   require_once '../controller/controller_employee.php';
                            foreach ($titles as $title): ?>
                            <option value="<?php echo $title['title']; ?>"><?php echo $title['title']; ?></option>
                            <?php endforeach; ?>
                        </select><br>
                    </div>
            </div>   
                
            <div class="col-6">
                <div class="form-group">
                    <label for="salario">Salario:</label>
                    <input type="number" class="form-control"  id="salario" name="salario" required><br>
                </div>
            </div>
        </div>
            
            <button type="submit" value="Agregar Empleado" class="btn btn-primary">Agregar Empleado</button>
            <a href="employees_view.php" class="btn btn-primary" role="button">Volver lista de empleados</a>
        </form>
    
    </div>

    <script src="../bootstrap.min.js" ></script>
</body>
</html>