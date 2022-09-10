<?php

// terminado



if(isset($_POST['guardar_tarea']) ){
    include('db.php');


    
    $titulo =$_POST['ti2'];
    $descripcion =$_POST['descripcion'];

    if($titulo != '' and $descripcion != '' ){
        
        $query = "INSERT INTO task (titulo, descripcion) VALUES ('$titulo', '$descripcion');";
        
        
        $SaveDB = mysqli_query($conn, $query);
        
        if(!$SaveDB){
            
            $_SESSION['mensaje'] = 'Fallo al guardar datos.';
            $_SESSION['color'] = 'danger';
            
        }else{
            
            $_SESSION['mensaje'] = 'Tarea guardada.';
            $_SESSION['color'] = 'success';
        }
        
        
        
    }else{
        
        $_SESSION['mensaje'] = 'Las casillas estan vacias';
        $_SESSION['color'] = 'dark';
        
    }
    header("Location: index.php");
}else{
    
    echo "revisar el programa, no funciona";

}


?>