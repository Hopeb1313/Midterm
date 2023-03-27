
<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php include('view/header.php'); ?>
<?php
include('model/database.php');
?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class = $_POST["class"];

}
$query = "SELECT vehicles.year, vehicles.model, vehicles.price, vehicles.type_id, vehicles.class_id, vehicles.make_id
          FROM vehicles
          INNER JOIN types ON vehicles.type_id = types.ID; 
          INNER JOIN makes ON vehicles.make_id = makes.ID
          INNER JOIN classes ON vehicles.class_id = classes.ID";

?>

<table>
		<tr>
			<th>ID</th>
			<th>Class</th>
			<th>Action</th>
		</tr>
		<?php
			$query = "SELECT * FROM classes";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['ID'] . "</td>";
				echo "<td>" . $row['Class'] . "</td>";
				echo "<td><form method='POST' action='delete_class.php'><input type='hidden' name='class_id' value='" . $row['ID'] . "'><input type='submit' value='Delete'></form></td>";
				echo "</tr>";
			}
		?>
	</table>

	<form method="POST" action="insert_class.php">
		<label for="type">New Class:</label>
		<input type="text" name="class" id="class">
		<input type="submit" value="Add Class">
	</form>


    <br>
    <br>
</form>
<?php include('view/footer.php'); ?>