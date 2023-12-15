<?php
include 'data/DBGestLib.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $nombre = $_POST['nombre'];
    $comentario = $_POST['comentario'];

    $DBGestion = new DBGestLib();

    try {
        $nuevoContactoID = $DBGestion->insertContacto($fecha, $correo, $asunto, $nombre, $comentario);
        if ($nuevoContactoID) {
            // Hacer algo si se inserta correctamente
            // Por ejemplo, redireccionar a una página de éxito
            header('Location: formexitoso.php');
            exit;
        } else {
            echo '<div class="alert alert-danger justify-content-center">Error al guardar los datos.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger justify-content-center">Error al guardar los datos: ' . $e->getMessage() . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Biblioteca Virtual L&A</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Biblioteca Virtual L&A</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#contact">Ingresar Usuario</a></li>
                        <li class="nav-item"><a class="nav-link" href="#search">Buscar Autores</a></li>
                        <li class="nav-item"><a class="nav-link" href="obrasliterarias.php">Obras Literarias</a></li>
                        <li class="nav-item"><a class="nav-link" href="tiendas.php">Tiendas</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" id="listado">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Bienvenido</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">En nuestra página puede ingresar ususarios y buscar sus datos sin problema alguno!</p>
                    </div>
                </div>
            </div>
        </header>
        <!-- Contacto-->
        <section class="page-section bg-primary" id="contact">
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Ingrese un nuevo contacto</h2>
                <hr class="divider" />
                <p class="text-white-75 mb-5">A continuación puede registrar sus datos.</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                <form id="contactForm" method="post" enctype="multipart/form-data">
                    <!-- nomre input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="nombre" type="text" placeholder="Enter your name..." required />
                        <label for="nombre">Nombre Completo</label>
                    </div>
                    <!-- Email input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="correo" type="email" placeholder="name@example.com" required />
                        <label for="correo">Correo Electrónico</label>
                    </div>
                    <!-- Fecha input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="date" name="fecha" type="date" placeholder="año-mes-dia" required />
                        <label for="fecha">Fecha</label>
                    </div>
                    <!-- Asunto-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="asunto" name="asunto" type="text" maxlength="40" placeholder="Escribe el asunto" required />
                        <label for="asunto">Asunto</label>
                    </div>
                    <!-- Comentario-->
                    <div class="form-floating mb-3">
                     <label for="comentario">Comentario</label>
                      <textarea class="form-control"   id="comentario" name="comentario" rows="4" cols="50" maxlength="100" required></textarea>
                    </div>
                    <!-- Submit Button-->
                    <div class="d-grid">
                        <button class="btn btn-dark btn-xl" id="submitButton" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    
        </section>
        <!-- Search-->
        <section class="page-section" id="search">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Autores Literarios</h2>
                <hr class="divider" />
                <div class="d-flex justify-content-center">
                 <a class="btn btn-dark btn-xl" href="buscarusuario.php">Conocer mas acerca de los autores</a>
                </div>
            </div>
        </section>
       
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Gracias por usar nuestros servicios</h2>
                <h2>:)</h2>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - Luis Angel De La Cruz 2021-1031</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>