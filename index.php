<?php

require_once "db.php";
include("includes/header.php");

// include("editar.php");

include("delete.php");


?>

<div class="container-fluid mt-5 pt-5 bg-info">

    <article class="row">
        <section class="col-12 col-md-4 col-lg-4 ">
            <div class="card-columns ">
                <!-- alertas -->
                <?php if (isset($_SESSION['mensaje'])) { ?>

                    <div class="alert alert-<?= $_SESSION['color'] ?> alert-dismissible fade show  align-items-center" role="alert">
                        <?= $_SESSION['mensaje']; ?>

                        <i class="btn btn-close" data-bs-dismiss="alert" aria-hidden="true">&times;</i>
                    </div>

                <?php unset($_SESSION['mensaje']);
                } ?>
                <div class="card shadow-md">
                    <div class="card-header bg-dark text-center">
                        <h5 class="text-danger text-uppercase">Crear tarea</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <!-- formulario -->
                        <form action="save_task.php" method="POST">
                            <div class="form-group my-3 ">
                                <label class="mb-2" for="nombreTarea"><i class="fab fa-phoenix-framework"> <b> T&iacute;tulo </b></i></label>
                                <input type="text" autofocus name="ti2" id="nombreTarea" class="form-control">
                            </div>
                            <div class="form-group my-3">
                                <label class="mb-2" for="descripcionTarea"><i class="fas fa-book-reader"> Descripción</i></label>
                                <textarea name="descripcion" class="form-control" id="descripcionTarea" cols="3" rows="3"></textarea>
                            </div>

                            <button type="submit" role="" name="guardar_tarea" class="btn btn-outline-success  btn-sm btn-block "> Guardar </button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-12 col-md-8 col-lg-8 my-3">

            <table class="table table-light  bg-dark  table-hover table-reflow   table-responsive">
                <thead class="thead-light  ">
                    <tr class="bg-dark">
                        <th class="bg-dark text-danger">No°</th>
                        <th class="bg-dark text-danger">Titulo</th>
                        <th class="bg-dark text-danger">Descripción</th>
                        <th class="bg-dark text-danger">Fecha de Creación</th>
                        <th class="bg-dark text-danger">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $consulta = "SELECT * FROM task;";
                    $GoDB = mysqli_query($conn, $consulta);
                    $cont = 1;
                    while ($row = mysqli_fetch_array($GoDB)) { ?>

                        <tr>
                            <th><?php echo $cont++; ?></th>
                            <td><?php echo $row['titulo']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['fecha']; ?></td>
                            <td class="d-flex justify-content-around">
                                <a class="align-items-center" href="editar.php?id=<?php echo $row['id']; ?> ">
                                    <i class="btn btn-outline-primary fas fa-pen-alt"></i>
                                </a>
                                <a class="align-items-center" href="delete.php?id=<?php echo $row['id']; ?>">
                                    <i class="btn btn-outline-danger fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>

        </section>
    </article>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</body>

</html>