<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php
include('model/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form
    $type = trim($_POST["type"]);
    if (empty($type)) {
        echo "Type is required.";
        exit();
    }

    $query = "INSERT INTO types (type) VALUES (?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $type);
    if (mysqli_stmt_execute($stmt)) {
        echo "Type added successfully.";
    } else {
        echo "Error adding type: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}
echo "<button onclick=\"location.href='admin.php';\">Back to table</button>";
mysqli_close($conn);
?>