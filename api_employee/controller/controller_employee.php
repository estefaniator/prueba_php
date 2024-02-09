<?php
require_once '../model/model_employee.php';


if (isset($_GET['id'])) {
    // Obtener los detalles de un empleado específico
    $id = $_GET['id'];
    $employees_model = new model_employee();
    $empleado = $employees_model->get_employees($id);
    
} else {
    // Mostrar la lista de empleados
    $employees_model = new model_employee();
    $empleados = $employees_model->listar();
    
    $detps_model = new model_employee();
    $detps =  $detps_model->get_dept();

    $titles_model = new model_employee();
    $titles =  $titles_model->get_title();
    
    // Incluir la vista para mostrar la lista de empleados
    require_once '../views/employees_view.php';
    //require_once '../views/add_employee.php';
}
?>

