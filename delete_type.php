<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php
include('model/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type_id"])) {
    $type_id = $_POST["type_id"];

    // Check if the type exists in the database
    $query = "SELECT * FROM types WHERE ID = $type_id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {

        // Delete the type from the database
        $query = "DELETE FROM types WHERE ID = $type_id";
        if (mysqli_query($conn, $query)) {
            header("Location: Edit_Type.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

} else {
    echo "Type not found.";
}


echo "<button onclick=\"location.href='admin.php';\">Back to table</button>";
mysqli_close($conn);
?>