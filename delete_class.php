
<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php
include('model/database.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["class_id"])) {
    $class_id = $_POST["class_id"];

    $query = "SELECT * FROM classes WHERE ID = $class_id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {

        // Delete class 
        $query = "DELETE FROM classes WHERE ID = $class_id";
        if (mysqli_query($conn, $query)) {
            header("Location: Edit_Class.php");
            exit();
        }
            else{
            echo "Error deleting record: " . mysqli_error($conn);} 
        }

    } else {
        echo "Class not found.";
    }
echo "<br><button onclick=\"location.href='admin.php';\">Back to table</button>";
mysqli_close($conn);
?>