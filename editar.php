<?php


// coloca los datos en el formulario
if (isset($_GET['id'])) {

    include('db.php');

    $id = $_GET['id'];

    $declaracion = "SELECT * FROM task WHERE id = $id ;";

    $query = mysqli_query($conn, $declaracion);


    if (mysqli_num_rows($query) == 1) {

        $row = mysqli_fetch_array($query);

        $titulo = $row['titulo'];

        $descripcion = $row['descripcion'];
    }
}

// recibidor de datos actualizados
if (isset($_POST['actualizar_tarea'])) {


    $newTitulo = $_POST['newTitulo'];
    $newDescripcion = $_POST['newDescripcion'];


    $actualizar = "UPDATE task SET titulo = '$newTitulo', descripcion = '$newDescripcion' WHERE id = $id;";

    $query = mysqli_query($conn, $actualizar);


    $_SESSION['mensaje'] = 'Tarea actualizada';
    $_SESSION['color'] = 'secondary';

    header('Location: index.php');
}
?>




<?php include('includes/header.php'); ?>


<div class="container py-5 mt-5">

    <article class="row">
        <section class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 "></section>
        <section class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 ">
            <div class="card-columns">
                <div class="card card-dark">
                    <div class="card-header bg-info">
                        <h5 class="text-danger text-capitalize">Actualizar tarea</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <!-- formulario -->

                            <!-- pasar el id para la actulizacion -->
                        <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="form-group my-3 ">
                                <label class="mb-2" for="nombreTarea"><i class="fab fa-phoenix-framework"> <b>Nuevo título </b></i></label>
                                <input type="text" autofocus placeholder="Actulizar tarea" name="newTitulo" id="nombreTarea" class="form-control" value="<?php echo $titulo; ?>">
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2" for="descripcionTarea"><i class="fas fa-book-reader">Nueva descripción</i></label>
                                <textarea name="newDescripcion" class="form-control" id="descripcionTarea" cols="3" rows="3"><?php echo $descripcion; ?></textarea>
                            </div>

                            <button type="submit" role="" name="actualizar_tarea" class="btn btn-outline-warning  btn-sm btn-block "> Guardar </button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4  "></section>
    </article>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</body>

</html>