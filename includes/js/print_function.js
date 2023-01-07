const printBtn = document.getElementById("print-btn");
printBtn.addEventListener("click", () => {
  let sTable = document.querySelector("[table]").innerHTML;

  // CREATE A WINDOW OBJECT.
  let win = window.open("", "", "height=700,width=700");

  win.document.write("<html><head>");
  win.document.write("<title>Patient Reports</title>"); // <title> FOR PDF HEADER.
  win.document.write(
    "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css'>"
  );
  win.document.write(
    "<style>.hide-part {display: none;} #tbl-repo {width: 100%;}</style>"
  );
  win.document.write("</head>");
  win.document.write("<body>");
  win.document.write(sTable);
  win.document.write("</body></html>");
  win.document.close();

  win.print();
});
