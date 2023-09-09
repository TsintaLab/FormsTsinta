document.getElementById('generarPDF').addEventListener('click', function () {
    const doc = new jsPDF();
    doc.text('Mi Página Web', 10, 10);
    doc.text(document.querySelector('body').innerText, 10, 20);
    doc.save('mi_pdf.pdf');
});
