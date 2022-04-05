const section = document.querySelector('#facture');
const btnPdf = document.querySelector('.btnPdf');


btnPdf.addEventListener('click', () => {
    console.log('clicked');
    const section = document.querySelector('#facture');
    let pdf = new jsPDF('1','pt','a4');
    pdf.fromHTML(section);
    pdf.save('facture');

    

    html2canvas(section).then(canvas => {
        document.body.appendChild(canvas)
    });

    


})
// console.log(section);
console.log(btnPdf);