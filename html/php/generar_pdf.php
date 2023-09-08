<?php
// Incluye la biblioteca TCPDF
require_once('https://github.com/tecnickcom/tcpdf/tcpdf.php');

// Recupera los datos del formulario
$nombreCurso = $_POST['nombreCurso'];
$nombreInstructor = $_POST['nombreInstructor'];
$fechaCurso = $_POST['fechaCurso'];
$lugarCurso = $_POST['lugarCurso'];
$numParticipantes = $_POST['numParticipantes'];

// Crear una instancia de TCPDF
$pdf = new TCPDF();

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Formato de Curso');
$pdf->SetSubject('Formato de Curso');
$pdf->SetKeywords('Curso, Comunicación, Formato');

// Configuración de encabezado y pie de página
$pdf->SetHeaderData('', 0, 'Formato de Curso', '');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Configuración de la página
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Agregar una página al documento
$pdf->AddPage();

// Establecer el estilo de borde para las tablas
$style = array(
    'table border' => '1',
    'padding' => '2',
    'table border-style' => 'solid',
    'table border-width' => '1',
    'table border-color' => 'black',
);

// Establecer el estilo de borde para las celdas
$cellStyle = array(
    'table border' => '1',
    'table border-style' => 'solid',
    'table border-width' => '1',
    'table border-color' => 'black',
);

// Obtener los datos del formulario
$nombreCurso = $_POST['nombreCurso'];
$nombreInstructor = $_POST['nombreInstructor'];
$fechaCurso = $_POST['fechaCurso'];
$horaCurso = $_POST['horaCurso'];
$lugarCurso = $_POST['lugarCurso'];
$numParticipantes = $_POST['numParticipantes'];

// Crear el contenido del PDF con los datos del formulario
$contenido = "
    <h2>Datos Generales</h2>
    <table border='1'>
        <tr>
            <td>Nombre del curso:</td>
            <td>$nombreCurso</td>
        </tr>
        <tr>
            <td>Nombre del Instructor:</td>
            <td>$nombreInstructor</td>
        </tr>
        <tr>
            <td>Fecha del curso:</td>
            <td>$fechaCurso</td>
        </tr>
        <tr>
            <td>Hora:</td>
            <td>$horaCurso</td>
        </tr>
        <tr>
            <td>Lugar:</td>
            <td>$lugarCurso</td>
        </tr>
        <tr>
            <td>Número de participantes:</td>
            <td>$numParticipantes</td>
        </tr>
    </table>
";


// Función para obtener la marca "X" o espacio en blanco en función de "Sí" o "No"
function obtenerMarca($valor) {
    return ($valor === 'Sí') ? 'X' : '';
}

// Sección MOBILIARIO
$contenido .= "
    <h2>MOBILIARIO</h2>
    <table border='1'>
        <tr>
            <th>Elemento</th>
            <th>Cantidad</th>
            <th>Sí</th>
            <th>No</th>
            <th>Observaciones</th>
        </tr>
        <tr>
            <td>Mesas</td>
            <td>{$_POST['mobiliarioMesasCantidad']}</td>
            <td>" . obtenerMarca($_POST['mobiliarioMesas']) . "</td>
            <td>{$_POST['mobiliarioMesasObservaciones']}</td>
        </tr>
        <tr>
            <td>Sillas</td>
            <td>{$_POST['mobiliarioSillasCantidad']}</td>
            <td>" . obtenerMarca($_POST['mobiliarioSillas']) . "</td>
            <td>{$_POST['mobiliarioSillasObservaciones']}</td>
        </tr>
    </table>
";

// Sección EQUIPO
$contenido .= "
    <h2>EQUIPO</h2>
    <table border='1'>
        <tr>
            <th>Elemento</th>
            <th>Cantidad</th>
            <th>Sí</th>
            <th>No</th>
            <th>Observaciones</th>
        </tr>
        <tr>
            <td>Computadora</td>
            <td>{$_POST['equipoComputadoraCantidad']}</td>
            <td>" . obtenerMarca($_POST['equipoComputadora']) . "</td>
            <td>{$_POST['equipoComputadoraObservaciones']}</td>
        </tr>
        <tr>
            <td>Proyector</td>
            <td>{$_POST['equipoProyectorCantidad']}</td>
            <td>" . obtenerMarca($_POST['equipoProyector']) . "</td>
            <td>{$_POST['equipoProyectorObservaciones']}</td>
        </tr>
        <tr>
            <td>Pantalla</td>
            <td>{$_POST['equipoPantallaCantidad']}</td>
            <td>" . obtenerMarca($_POST['equipoPantalla']) . "</td>
            <td>{$_POST['equipoPantallaObservaciones']}</td>
        </tr>
        <tr>
            <td>Bocina</td>
            <td>{$_POST['equipoBocinaCantidad']}</td>
            <td>" . obtenerMarca($_POST['equipoBocina']) . "</td>
            <td>{$_POST['equipoBocinaObservaciones']}</td>
        </tr>
    </table>
";

// Sección INSTALACIONES
$contenido .= "
    <h2>INSTALACIONES</h2>
    <table border='1'>
        <tr>
            <th>Elemento</th>
            <th>Cantidad</th>
            <th>Sí</th>
            <th>No</th>
            <th>Observaciones</th>
        </tr>
        <tr>
            <td>Sala</td>
            <td>{$_POST['instalacionesSalaCantidad']}</td>
            <td>" . obtenerMarca($_POST['instalacionesSala']) . "</td>
            <td>{$_POST['instalacionesSalaObservaciones']}</td>
        </tr>
    </table>
";

// Sección MATERIALES
$contenido .= "
    <h2>MATERIALES</h2>
    <table border='1'>
        <tr>
            <th>Elemento</th>
            <th>Cantidad</th>
            <th>Sí</th>
            <th>No</th>
            <th>Observaciones</th>
        </tr>
        <tr>
            <td>Lista de asistencia</td>
            <td>{$_POST['materialesListaAsistenciaCantidad']}</td>
            <td>" . obtenerMarca($_POST['materialesListaAsistencia']) . "</td>
            <td>{$_POST['materialesListaAsistenciaObservaciones']}</td>
        </tr>
        <tr>
            <td>Tarjetas</td>
            <td>{$_POST['materialesTarjetasCantidad']}</td>
            <td>" . obtenerMarca($_POST['materialesTarjetas']) . "</td>
            <td>{$_POST['materialesTarjetasObservaciones']}</td>
        </tr>
        <tr>
            <td>Bolígrafos</td>
            <td>{$_POST['materialesBoligrafosCantidad']}</td>
            <td>" . obtenerMarca($_POST['materialesBoligrafos']) . "</td>
            <td>{$_POST['materialesBoligrafosObservaciones']}</td>
        </tr>
        <tr>
            <td>Plumones</td>
            <td>{$_POST['materialesPlumonesCantidad']}</td>
            <td>" . obtenerMarca($_POST['materialesPlumones']) . "</td>
            <td>{$_POST['materialesPlumonesObservaciones']}</td>
        </tr>
        <tr>
            <td>Personificadores</td>
            <td>{$_POST['materialesPersonificadoresCantidad']}</td>
            <td>" . obtenerMarca($_POST['materialesPersonificadores']) . "</td>
            <td>{$_POST['materialesPersonificadoresObservaciones']}</td>
        </tr>
        <tr>
            <td>Evaluación diagnóstica (cuestionario)</td>
            <td>{$_POST['materialesEvaluacionDiagnosticaCantidad']}</td>
            <td>" . obtenerMarca($_POST['materialesEvaluacionDiagnostica']) . "</td>
            <td>{$_POST['materialesEvaluacionDiagnosticaObservaciones']}</td>
        </tr>
        <tr>
            <td>Evaluación intermedia (guía de observación)</td>
            <td>{$_POST['materialesEvaluacionIntermediaCantidad']}</td>
            <td>" . obtenerMarca($_POST['materialesEvaluacionIntermedia']) . "</td>
            <td>{$_POST['materialesEvaluacionIntermediaObservaciones']}</td>
        </tr>
        <tr>
            <td>Evaluación final (cuestionario)</td>
            <td>{$_POST['materialesEvaluacionFinalCantidad']}</td>
            <td>" . obtenerMarca($_POST['materialesEvaluacionFinal']) . "</td>
            <td>{$_POST['materialesEvaluacionFinalObservaciones']}</td>
        </tr>
        <tr>
            <td>Evaluación de satisfacción</td>
            <td>{$_POST['materialesEvaluacionSatisfaccionCantidad']}</td>
            <td>" . obtenerMarca($_POST['materialesEvaluacionSatisfaccion']) . "</td>
            <td>{$_POST['materialesEvaluacionSatisfaccionObservaciones']}</td>
        </tr>
    </table>
";

// Sección SERVICIOS
$contenido .= "
    <h2>SERVICIOS</h2>
    <table border='1'>
        <tr>
            <th>Elemento</th>
            <th>Cantidad</th>
            <th>Sí</th>
            <th>No</th>
            <th>Observaciones</th>
        </tr>
        <tr>
            <td>Café (Bote)</td>
            <td>{$_POST['serviciosCafeCantidad']}</td>
            <td>" . obtenerMarca($_POST['serviciosCafe']) . "</td>
            <td>{$_POST['serviciosCafeObservaciones']}</td>
        </tr>
        <tr>
            <td>Galletas (Paquete)</td>
            <td>{$_POST['serviciosGalletasCantidad']}</td>
            <td>" . obtenerMarca($_POST['serviciosGalletas']) . "</td>
            <td>{$_POST['serviciosGalletasObservaciones']}</td>
        </tr>
    </table>
";

// Sección MEDIDAS DE SALUD/SEGURIDAD/HIGIENE/PROTECCIÓN CIVIL
$contenido .= "
    <h2>MEDIDAS DE SALUD/SEGURIDAD/HIGIENE/PROTECCIÓN CIVIL</h2>
    <table border='1'>
        <tr>
            <th>Elemento</th>
            <th>Cantidad</th>
            <th>Sí</th>
            <th>No</th>
            <th>Observaciones</th>
        </tr>
        <tr>
            <td>Ruta de evacuación señalizada</td>
            <td>{$_POST['medidasRutaEvacuacionCantidad']}</td>
            <td>" . obtenerMarca($_POST['medidasRutaEvacuacion']) . "</td>
            <td>{$_POST['medidasRutaEvacuacionObservaciones']}</td>
        </tr>
        <tr>
            <td>Cubrebocas disponibles</td>
            <td>{$_POST['medidasCubrebocasCantidad']}</td>
            <td>" . obtenerMarca($_POST['medidasCubrebocas']) . "</td>
            <td>{$_POST['medidasCubrebocasObservaciones']}</td>
        </tr>
        <tr>
            <td>Aplicación de gel antibacterial en manos</td>
            <td>{$_POST['medidasGelAntibacterialCantidad']}</td>
            <td>" . obtenerMarca($_POST['medidasGelAntibacterial']) . "</td>
            <td>{$_POST['medidasGelAntibacterialObservaciones']}</td>
        </tr>
    </table>
";

// Agregar el contenido al PDF con los bordes configurados
$pdf->writeHTML($contenido, true, false, true, false, '');
// Agregar el contenido al PDF
#$pdf->writeHTML($contenido, true, false, true, false, '');

// Salida del PDF (se abre en una nueva ventana/pestaña del navegador)
$pdf->Output('formato_curso.pdf', 'I');
?>
