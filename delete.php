<?php
// Terminado


if(isset($_GET['id'])){
    include('db.php');
    
    $id =$_GET['id'];
    $consulta = "DELETE FROM task WHERE id = $id;";

    
    $getdb = mysqli_query($conn, $consulta);

    if(!$getdb){
        
        $_SESSION['mensaje'] = 'Error, fallas al eliminar la tarea';

    }else{

        $_SESSION['color'] = 'danger';
        $_SESSION['mensaje'] = 'Tarea eliminada';
    }



 header('Location: index.php');    

}

?>



