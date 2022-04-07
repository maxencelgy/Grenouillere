const options = {
  margin: 0.5,
  filename: "facture.pdf",
  image: {
    type: "jpeg",
    quality: 500,
  },
  html2canvas: {
    scale: 1,
  },
  jsPDF: {
    unit: "in",
    format: "letter",
    orientation: "portrait",
  },
};

$(".btn-download").click(function (e) {
  e.preventDefault();
  const element = document.getElementById("invoice");
  html2pdf().from(element).set(options).save();
});

function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}
