<?php
require_once '../model/model_employee.php';
class EmployeeController {
   
    public function handleAddEmployeeForm() {
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $genero = $_POST['genero'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $num_departamento = $_POST['num_departamento'];
            $cargo = $_POST['cargo'];
            $salario = $_POST['salario'];

           
            $employee_model = new model_employee();
            $resultado = $employee_model->add_employees( $id, $nombre, $apellidos, $genero,
             $fecha_nacimiento, $num_departamento, $cargo, $salario);

            
            if ($resultado) {
                
                echo "¡Empleado agregado exitosamente!";
                header('Location: ../views/employees_view.php');
            } else {
            
                echo "Hubo un problema al agregar el empleado.";
            }
        } else {
            
            echo "Acceso no permitido.";
        }
    }
}


$employee_controller = new EmployeeController();
$employee_controller->handleAddEmployeeForm();
?>

