<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/PDHEG/admin/', $path);
$ruta = $components[1];
?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3"style="border : solid 2px #ffffff;
                    background : #ffffff;
                    color : #000000;
                    padding : 4px;
                    width : auto;
                    height : 90%;
                    overflow : auto;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="index.php") {echo "active"; } ?>" aria-current="page" href="index.php">
                    <i class="fab fa-dashcube"></i>
                    Tablero Contenidos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="recomendaciones.php") {echo "active"; } ?>" aria-current="page" href="recomendaciones.php">
                    <i class="fab fa-dashcube"></i>
                    Tablero Recomendaciones
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="armonizacioncontable.php") {echo "active"; } ?>" aria-current="page" href="armonizacioncontable.php">
                    <i class="fab fa-dashcube"></i>
                    Tablero Armonizacion Contable
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="alertas.php") {echo "active"; } ?>" aria-current="page" href="alertas.php">
                    <i class="fab fa-dashcube"></i>
                    Tablero Alertas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-evento.php") {echo "active"; } ?>" href="agregar-evento.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Evento
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-efemeride.php") {echo "active"; } ?>" href="agregar-efemeride.php">
                    <i class="fas fa-edit"></i>
                    Nueva Efemeride
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-derechoshumanos.php") {echo "active"; } ?>" href="agregar-derechoshumanos.php">
                    <i class="fas fa-edit"></i>
                    Derechos Contenido Humanos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-otro.php") {echo "active"; } ?>" href="agregar-otro.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Contenido Otro
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-ninosyninas.php") {echo "active"; } ?>" href="agregar-ninosyninas.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Niños y Niñas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-alba.php") {echo "active"; } ?>" href="agregar-alba.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Protocolo ALBA
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-amber.php") {echo "active"; } ?>" href="agregar-amber.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Alerta Amber
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-webinar.php") {echo "active"; } ?>" href="agregar-webinar.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Webinar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-comunicadoprensa.php") {echo "active"; } ?>" href="agregar-comunicadoprensa.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Comunicado Prensa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-pronunciamiento.php") {echo "active"; } ?>" href="agregar-pronunciamiento.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Pronunciamiento
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-campanatv.php") {echo "active"; } ?>" href="agregar-campanatv.php">
                    <i class="fas fa-edit"></i>
                     Nueva Campaña de TV
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-spottv.php") {echo "active"; } ?>" href="agregar-spottv.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Spot TV
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-campanaradio.php") {echo "active"; } ?>" href="agregar-campanaradio.php">
                    <i class="fas fa-edit"></i>
                    Nueva Campaña de Radio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-materialgrafico.php") {echo "active"; } ?>" href="agregar-materialgrafico.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Material Grafico
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-informeespecial.php") {echo "active"; } ?>" href="agregar-informeespecial.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Informe Especial
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-recomendacion.php") {echo "active"; } ?>" href="agregar-recomendacion.php">
                    <i class="fas fa-edit"></i>
                    Nueva Recomendacion
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-armonizacioncontable.php") {echo "active"; } ?>" href="agregar-armonizacioncontable.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Armonizacion Contable
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-revistadh.php") {echo "active"; } ?>" href="agregar-revistadh.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Revista DH
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-informeanual.php") {echo "active"; } ?>" href="agregar-informeanual.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Informe Anual
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-resultadogestion.php") {echo "active"; } ?>" href="agregar-resultadogestion.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Resultado de Gestion
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($ruta=="agregar-mecanismodiscapacidad.php") {echo "active"; } ?>" href="agregar-mecanismodiscapacidad.php">
                    <i class="fas fa-edit"></i>
                    Nuevo Mecanismo de Discapacidd
                </a>
            </li>
        </ul>
    </div>
</nav>