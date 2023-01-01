<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="includes/css/report_table.css" />
</head>

<body>
    <div class="table_properties">
        <!-- <div class="card"> -->
        <!-- <div class="table-title">
            <h2>Reports Data</h2>
        </div> -->
        <!-- <div class="button-container"><span>These buttons aren't working ></span>
            <button class="danger" title="Delete Selected">
                <svg viewBox="0 0 448 512" width="16" title="trash-alt">
                    <path
                        d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z">
                    </path>
                </svg>
            </button>
            <button class="primary" title="Add New Data">
                <svg viewBox="0 0 512 512" width="16" title="plus-circle">
                    <path
                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z">
                    </path>
                </svg>
            </button>
        </div> -->

        <?php include('includes/config/connect.php');

        $sql = "select * from reports;";
        $result = $conn->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $data = array_reverse($data);
        $num_rows = $result->num_rows; ?>

        <div class="table-concept">
            <input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked" />
            <div class="table-display">Showing 1 to <?php echo $num_rows; ?> items
            </div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>NAME</th>
                        <th>AGE</th>
                        <th>FILES</th>
                        <th>TEMPLATE</th>
                        <th>DOWNLOADS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $rp_dtl): ?>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>
                            <?php echo $rp_dtl['id']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['patient_name']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['patient_age']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['file_name']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['created_by']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['downloads']; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <!-- </div> -->
    </div>
</body>

</html>