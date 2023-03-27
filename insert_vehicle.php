
<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php
include('model/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make_id = $_POST["make"];
    $type_id = $_POST["type"];
    $class_id = $_POST["class"];

         
    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    if (!preg_match('/^\d{4}$/', $year)) {

        echo "Invalid year. Please enter a 4-digit year.";
        echo "<br><button onclick=\"location.href='add_vehicle.php';\">Back to insert fields</button>";

        
        exit;
    }


    $query = "INSERT INTO vehicles (year, make_id, model, type_id, class_id, price)
              VALUES ('$year', '$make_id', '$model', '$type_id', '$class_id', '$price')";

    if (mysqli_query($conn, $query)) {
        echo "New vehicle added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
echo "<br><button onclick=\"location.href='admin.php';\">Back to table</button>";
mysqli_close($conn);

?>