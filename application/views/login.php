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
    if ($this->session->flashdata("OP")) {
        switch ($this->session->flashdata("OP")) {
            case "SALIO":
                ?>
                <div class="alert alert-success" role="alert">
                    Sesión cerrada.
                </div>
                <?php
                break;
            case "INCORRECTO":
                ?>
                <div class="alert alert-danger" role="alert">
                    Datos incorrectos, vuelva a intentarlo.
                </div>
                <?php
                break;
        }
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Iniciar Sesion</h1>
                <br>
                <class class="card">
                    <class class="card-body">
                        <form method="post" action="<?php echo site_url("auth/login"); ?>">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </class>
                </class>

            </div>
        </div>
    </div>
</body>

</html>