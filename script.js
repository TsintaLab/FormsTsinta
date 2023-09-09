
document.getElementById('generarPDF).addEventListener('click', function () {
    const doc = new jsPDF();

    // Obtener los valores del formulario
    const nombreCurso = document.getElementById('nombreCurso').value;
    const nombreInstructor = document.getElementById('nombreInstructor').value;
    const fechaCurso = document.getElementById('fechaCurso').value;
    const lugarCurso = document.getElementById('lugarCurso').value;
    const numParticipantes = document.getElementById('numParticipantes').value;

    // Crear el contenido del PDF
    const contenido = `
        Nombre del curso: ${nombreCurso}
        Nombre del Instructor: ${nombreInstructor}
        Fecha del curso: ${fechaCurso}
        Lugar: ${lugarCurso}
        Número de participantes: ${numParticipantes}
        
        // Agregar aquí los indicadores y sus valores

    `;

    // Agregar el contenido al PDF
    doc.text(contenido, 10, 10);

    // Guardar el PDF como "formato_curso.pdf"
    doc.save('formato_curso.pdf');
});
