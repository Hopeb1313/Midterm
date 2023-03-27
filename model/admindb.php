<link rel="stylesheet" type="text/css" href="view/styles.css">
<h1>Welcome Admin User!</h1>
<?php
include('model/database.php');
?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sort = $_POST["sort"];
    if ($sort == "year") { // sort by year if selected
        $order = "vehicles.year DESC";
    } else { // sort by price by default
        $order = "vehicles.price DESC";
    }
    $make = $_POST["make"]; // declare variables 
    $type = $_POST["type"];
    $class = $_POST["class"];
} else {
    $order = "vehicles.price DESC";
    $make = "";
    $type = "";
    $class = "";
}

$query = "SELECT vehicles.year, vehicles.model, vehicles.price, vehicles.type_id, vehicles.class_id, vehicles.make_id
          FROM vehicles
          INNER JOIN types ON vehicles.type_id = types.ID
          INNER JOIN makes ON vehicles.make_id = makes.ID
          INNER JOIN classes ON vehicles.class_id = classes.ID";

if ($make != "") {
    $query .= " WHERE vehicles.make_id = " . $make;
}
if ($type != "") {
    if ($make == "") {
        $query .= " WHERE";
    } else {
        $query .= " AND";
    }
    $query .= " vehicles.type_id = " . $type;
}
if ($class != "") {
    if ($make == "" && $type == "") {
        $query .= " WHERE";
    } else {
        $query .= " AND";
    }
    $query .= " vehicles.class_id = " . $class;
}

$query .= " ORDER BY " . $order;

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo "<table>"; // display table 
    echo "<tr><th>Year</th><th>Make</th><th>Model</th><th>Type</th><th>Class</th><th>Price</th></tr>"; // add headers for table 
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["year"] . "</td><td>" . $row["make_id"] . "</td><td>" . $row["model"] . "</td><td>" . $row["type_id"] . "</td><td>" . $row["class_id"] . "</td><td>" . $row["price"] . "</td><td><form method='POST' action='delete_vehicle.php'><input type='hidden' name='model' value='" . $row["model"] . "'><input type='submit' value='Delete'></form></td></tr>"; // create rows
    }
    echo "</table>";
} else {
    echo '<p class="Results">No results found. Click Filter to start a new search. </p>';
    echo "<button onclick=\"location.href='admin.php';\">Back to table</button>";
}
?>

<form method="POST">
    <label for="sort">Sort by:</label> 
    <select name="sort" id="sort">
        <option value="price">Price (highest first)</option>
        <option value="year">Year (newest first)</option>
    </select>
    <label for="make">Make:</label>
    <select name="make" id="make">
        <option value="">Any</option>
        <?php
        $query = "SELECT * FROM makes";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["ID"] . "'>" . $row["Model"] . "</option>";
        }
        ?>
    </select>
    <label for="type">Type:</label>
    <select name="type" id="type">
        <option value="">Any</option>
        <?php
        $query = "SELECT * FROM types";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["ID"] . "'>" . $row["type"] . "</option>";
        }
        ?>
    </select>
    <label for="class">Class:</label>
    <select name="class" id="class">
        <option value="">Any</option>
        <?php
        $query = "SELECT * FROM classes";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["ID"] . "'>" . $row["Class"] . "</option>";
        }
        ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Filter">
</form>

<a href="add_vehicle.php"><button>Add Vehicle</button></a> 
<a href="Edit_Make.php"><button>Add/View/Delete Make</button></a> 
<a href="Edit_Class.php"><button>Add/View/Delete Class</button></a> 
<a href="Edit_Type.php"><button>Add/View/Delete Type</button></a>