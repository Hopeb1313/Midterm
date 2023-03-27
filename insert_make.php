
<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php
include('model/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $make = trim($_POST["make"]);
    if (empty($make)) {
        echo "Make is required.";
        exit();
    }

    // Insert new type into database
    $query = "INSERT INTO makes (Model) VALUES (?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $make);
    if (mysqli_stmt_execute($stmt)) {
        echo "Type added successfully.";
    } else {
        echo "Error adding make: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

echo "<br><button onclick=\"location.href='admin.php';\">Back to table</button>";
mysqli_close($conn);
?>