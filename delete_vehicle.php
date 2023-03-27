
<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php
include('model/database.php');
$model = $_POST["model"];

$query = "DELETE FROM vehicles WHERE model = '$model'";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Vehicle deleted successfully";
} else {
    echo "Error deleting vehicle: " . mysqli_error($conn);
}
echo "<br><button onclick=\"location.href='admin.php';\">Back to table</button>";
mysqli_close($conn);
?>





