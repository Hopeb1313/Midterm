
<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php 
include('view/header.php'); 

include('model/database.php');
?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["make"];

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
			<th>Make</th>
			<th>Action</th>
		</tr>
		<?php
			$query = "SELECT * FROM makes";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['ID'] . "</td>";
				echo "<td>" . $row['Model'] . "</td>";
				echo "<td><form method='POST' action='delete_make.php'><input type='hidden' name='make_id' value='" . $row['ID'] . "'><input type='submit' value='Delete'></form></td>";
				echo "</tr>";
			}
		?>
	</table>


	<form method="POST" action="insert_make.php">
		<label for="type">New Make:</label>
		<input type="text" name="make" id="make">
		<input type="submit" value="Add make">
	</form>


    <br>
    <br>
</form>
<?php include('view/footer.php'); ?>