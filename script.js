document.getElementById('generarPDF').addEventListener('click', function () {
    const doc = new jsPDF();
    doc.text('Formulario de Requerimientos de Sesión/Curso', 10, 10);
    doc.text(document.querySelector('body').innerText, 10, 20);
    doc.save('mi_pdf.pdf');
});
