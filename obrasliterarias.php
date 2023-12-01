<?php
include 'data/DBGestLib.php'; 
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
            <a class="navbar-brand" href="index.php">Biblioteca Virtual L&A</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                  <!--  <li class="nav-item"><a class="nav-link" href="#page-top">Inicio</a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" id="listado">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Tabla de los autores de las obras literarias que poseemos: </h1>
                    <hr class="divider" />
                </div>
                
            </div>
            
        </div> 
    </header>
   
    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <br>
        <div class="container px-4 px-lg-2 text-center">
        <br>
       <?php
// Crear una instancia de la clase DBGestLib para manejar la conexión a la base de datos
$gestorDB = new DBGestLib();

try {
    // Obtener los datos de las obras usando la función getObras() de la clase DBGestLib
    $results = $gestorDB->getObras();

    // Mostrar los resultados
    echo "<table border='1'>";
    echo "<tr><th>Título</th><th>Precio</th><th>Notas</th><th>Fecha de Publicación</th></tr>";
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>".$row['titulo']."</td>";
        echo "<td>".$row['precio']."</td>";
        echo "<td>".$row['notas']."</td>";
        echo "<td>".$row['fecha_pub']."</td>";
        echo "</tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    // Manejo de errores en caso de problemas con la consulta
    echo '<div class="alert alert-danger justify-content-center">Error al consultar los datos: ' . $e->getMessage() . '</div>';
}
?>


            <br>
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