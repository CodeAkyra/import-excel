<?php
include "conn.php";

if (isset($_POST["import"])) {
    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($fileName, "r");


        // fgetcsv($file); // purpose is to skip yung header kung sakaling may name bawat column like Customer Name, Customer ID, Product Name, etcetc...

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $customer_name = mysqli_real_escape_string($conn, $column[0]); // first column
            $customer_id = mysqli_real_escape_string($conn, $column[1]); // second column

            $query = "INSERT INTO customer_master_list (customer_name, customer_id) VALUES ('$customer_name', '$customer_id')";
            mysqli_query($conn, $query);
        }
        fclose($file);

        // redirect para ma clear yung form
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Please upload a valid file.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit" name="import">Import</button>
    </form>

    <table>
        <tr>
            <th>Number of Customer</th>
            <th>Customer Name</th>
            <th>Customer ID</th>
        </tr>
        <?php

        $i = 1;
        $sql = "SELECT * FROM customer_master_list";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>" . "No. " . $i++ . "</td>
                    <td>" . htmlspecialchars($row["customer_name"]) . "</td>
                    <td>" . htmlspecialchars($row["customer_id"]) . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No Customer Found.</td></tr>";
        }
        ?>
    </table>
</body>

</html>