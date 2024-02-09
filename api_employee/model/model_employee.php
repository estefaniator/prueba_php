<?php

require_once ('../db/db.php');

class model_employee{

  


    private $db;
    private $employees;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->employees=array();
    }
    public function listar(){
        $consulta=$this->db->query("SELECT emplo.emp_no as id, emplo.first_name as nombre, 
         emplo.last_name as apellidos,
        deprts.dept_name as departamento, ti.title as cargo,
         sala.salary as salario, emplo.hire_date as fecha_contratacion
        FROM employees as emplo
        JOIN dept_emp as d_emp on d_emp.emp_no = emplo.emp_no
        JOIN departments as deprts on deprts.dept_no = d_emp.dept_no
        JOIN titles as ti on ti.emp_no = emplo.emp_no
        JOIN salaries as sala on sala.emp_no = emplo.emp_no
        ORDER BY emplo.hire_date
        LIMIT 50;");
        while($filas=$consulta->fetch_assoc()){
            $this->employees[]=$filas;
        }

        
        return $this->employees;
    }


    public function get_employees($id){
       $sql="SELECT emplo.emp_no as id, 
        emplo.first_name as nombre, 
         emplo.last_name as apellidos,
         emplo.gender as genero,
         deprts.dept_name as departamento,
         ti.title as cargo,
         sala.salary as salario, 
         emplo.hire_date as fecha_contratacion,
         emplo.birth_date as fecha_nacimiento
        FROM employees as emplo
        JOIN dept_emp as d_emp on d_emp.emp_no = emplo.emp_no
        JOIN departments as deprts on deprts.dept_no = d_emp.dept_no
        JOIN titles as ti on ti.emp_no = emplo.emp_no
        JOIN salaries as sala on sala.emp_no = emplo.emp_no
        WHERE emplo.emp_no = ?";
        $consulta=$this->db->prepare($sql);
        
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $result = $consulta->get_result();
        return $result->fetch_assoc();
        

    }


    public function add_employees($id, $nombre ,$apellidos,  $genero, $fecha_nacimiento, 
    $num_departamento, $cargo, $salario) {
        // Insertar el nuevo empleado en la tabla employees
        $sql = "INSERT INTO employees (emp_no,first_name , last_name , 
        birth_date , gender ) 
                  VALUES (?, ?, ?, ?,?)";
        $consulta=$this->db->prepare($sql);
        $consulta->bind_param('sssss',$id, $nombre,$apellidos, $fecha_nacimiento,$genero);
        $consulta->execute();
    

        // Insertar el cargo del empleado en la tabla titles
         $query_titulo = "INSERT INTO titles ( emp_no, title) 
         VALUES ( ?,?)";
            $consulta_titulo = $this->db->prepare($query_titulo);
            $consulta_titulo->bind_param('ss', $id, $cargo);
            $consulta_titulo->execute();
    
        // Insertar el nuevo salario en la tabla salaries
        $query_salario = "INSERT INTO salaries (emp_no, salary) 
        VALUES ( ?,?);";
        $consulta_salario=$this->db->prepare($query_salario);
        $consulta_salario->bind_param('ss',$id, $salario);
        $consulta_salario->execute();
    
          // Insertar  numero departamento
          $query_salario = "INSERT INTO dept_emp (emp_no, dept_no) 
          VALUES (?, ?);";
          $consulta_salario=$this->db->prepare($query_salario);
          $consulta_salario->bind_param( 'ss', $id,$num_departamento);
          $consulta_salario->execute();

        // Insertar  departamento
        
        return true; // Indicar que la inserción fue exitosa
    }

    public function get_dept(){
        $detps=[];
        $consulta=$this->db->query("SELECT dept_no FROM dept_emp GROUP BY dept_no");
        while($filas=$consulta->fetch_assoc()){
            $detps[]=$filas;
        }

        
        return $detps;
    }


    public function get_title(){
        $titles=[];
        $consulta=$this->db->query("SELECT title FROM titles GROUP BY title");
        while($filas=$consulta->fetch_assoc()){
            $titles[]=$filas;
        }

        
        return $titles;
    }
   
}






/*
SELECT emplo.emp_no as id, emplo.first_name as nombre,  emplo.last_name as apellidos,
        deprts.dept_name as departamento, ti.title as cargo,
         sala.salary as salario, emplo.hire_date as fecha_contratacion
        FROM employees as emplo
        JOIN dept_emp as d_emp on d_emp.emp_no = emplo.emp_no
        JOIN departments as deprts on deprts.dept_no = d_emp.dept_no
        JOIN titles as ti on ti.emp_no = emplo.emp_no
        JOIN salaries as sala on sala.emp_no = emplo.emp_no
        ORDER BY emplo.hire_date
        LIMIT 50

*/