<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Contactos</title>
</head>

<body>
<?php
    $this->load->view("navbar");
    if ($this->session->flashdata("OP")) {
        switch ($this->session->flashdata("OP")) {
            case "BORRADO":
                ?>
                <div class="alert alert-danger" role="alert">
                    Contacto Eliminado.
                </div>
                <?php
                break;
            case "OK":
                ?>
                <div class="alert alert-success" role="alert">
                    Contacto Agregado.
                </div>
                <?php
                break;
        }
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Contactos</h1>
                <div class="card">
                    <?php echo validation_errors("<p>", "</p>")?>
                    <div class="card-body">
                        <form method="post" action="<?php echo site_url("contactos/nuevo"); ?>">
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="correo" name="correo">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-6 offset-md-3">
                <br>
                <?php if (count($contactos)) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Apellido</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contactos as $c) { ?>
                                <tr>
                                    <td><?php echo $c["apellido"] ?></td>
                                    <td><?php echo $c["nombre"] ?></td>
                                    <td><?php echo $c["telefono"] ?></td>
                                    <td><?php echo $c["correo"] ?></td>
                                    <td><a href="<?php echo site_url("contactos/borrar/").$c["contacto_id"]?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="alert alert-primary" role="alert">
                        No hay contactos.
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>