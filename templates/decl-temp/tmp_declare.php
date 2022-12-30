<?php include '../../includes/config/connect.php';

$rows = 5; // number of rows
$cols = 3; // number of columns

// create a 2D array to hold the cell data
$cellData = array(
    array("A1", "A2", "A3"),
    array("B1", "B2", "B3"),
    array("C1", "C2", "C3"),
    array("D1", "D2", "D3"),
    array("E1", "E2", "E3")
);

// start the table HTML
$tableHTML = "<table>";

// loop through the rows
for ($i = 0; $i < $rows; $i++) {
    $tableHTML .= "<tr>"; // start a new row

    // loop through the columns
    for ($j = 0; $j < $cols; $j++) {
        $tableHTML .= "<td>" . $cellData[$i][$j] . "</td>"; // create a new cell
    }

    $tableHTML .= "</tr>"; // end the row
}

$tableHTML .= "</table>"; // end the table

$completeCode = "<html><head><title>Table Maker</title></head><body>" . $tableHTML . "</body></html>";

$filename = "../table.html";
file_put_contents($filename, $completeCode);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate report template | HealtkKind Lab</title>
</head>



<body>

    <div id="lets"></div>

    <!-- <script>
    function createTable(rows, cols, values) {
        const tableMain = document.getElementById("lets");
        // Create the table element
        var table = document.createElement("table");

        // Create the rows and cells
        for (var i = 0; i < rows; i++) {
            var row = document.createElement("tr");
            for (var j = 0; j < cols; j++) {
                var cell = document.createElement("td");
                cell.innerHTML = values[i][j];
                row.appendChild(cell);
            }
            table.appendChild(row);
            // tableMain.appendChild(table);
        }

        // Create a new document and write the table to it
        document.open();
        document.write("<html><body>" + table.outerHTML + "</body></html>");
        document.close();

        // Save the document as an HTML file with a custom name
        var blob = new Blob(["<html><body>" + table.outerHTML + "</body></html>"], {
            type: "text/plain;charset=utf-8"
        });
        saveAs(blob, "custom-name.html");
    }

    // Use the function to create a table with 2 rows and 3 columns
    createTable(2, 3, [
        ["First Column", "Second Column", "Third Column"],
        ["First Column", "Second Column", "Third Column"]
    ]);
    </script> -->
</body>

</html>