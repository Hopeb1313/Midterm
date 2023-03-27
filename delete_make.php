<?php
include('model/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["make_id"])) {
    $make_id = $_POST["make_id"];

    // Check if the type exists in the database
    $query = "SELECT * FROM makes WHERE ID = $make_id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {

        // Delete function
        $query = "DELETE FROM makes WHERE ID = $make_id";
        if (mysqli_query($conn, $query)) {
            header("Location: Edit_Make.php");
            exit();
        } 
            else{
            echo "Error deleting record: " . mysqli_error($conn);} 
        }

    } else {
        echo "Type not found.";
    }
echo "<br><button onclick=\"location.href='admin.php';\">Back to table</button>";
mysqli_close($conn);
?>