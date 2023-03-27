
<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php 
include('view/header.php'); 
include('model/database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make = $_POST["make"];
    $type = $_POST["type"];
    $class = $_POST["class"];

}
$query = "SELECT vehicles.year, vehicles.model, vehicles.price, vehicles.type_id, vehicles.class_id, vehicles.make_id
          FROM vehicles
          INNER JOIN types ON vehicles.type_id = types.ID
          INNER JOIN makes ON vehicles.make_id = makes.ID
          INNER JOIN classes ON vehicles.class_id = classes.ID";

?>

<form method="POST" action="insert_vehicle.php">
    <label for="year">Year:</label>
    <input type="text" name="year" id="year" required>
<br>
    <label for="make">Make:</label>
    <select name="make" id="make" required>
        <option value="">Choose option</option>
        <?php
        $query = "SELECT * FROM makes";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["ID"] . "'>" . $row["Model"] . "</option>";
        }
        ?>
    </select>
   <br>
    <label for="model">Model:</label>
    <input type="text" name="model" id="model" required>
<br> 
    <label for="type">Type:</label>
    <select name="type" id="type" required>
        <option value="">Choose option</option>
        <?php
        $query = "SELECT * FROM types";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["ID"] . "'>" . $row["type"] . "</option>";
        }
        ?>
    </select>
<br> 
    <label for="class">Class:</label>
    <select name="class" id="class" required>
        <option value="">Choose option</option>
        <?php
        $query = "SELECT * FROM classes";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["ID"] . "'>" . $row["Class"] . "</option>";
        }
        ?>
    </select>
<br>
    <label for="price">Price:</label>
    <input type="text" name="price" id="price" required>

    <br>
    <br>
    <input type="submit" value="Add Vehicle">
</form>
<?php include('view/footer.php'); ?>